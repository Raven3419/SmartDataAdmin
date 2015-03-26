<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/*
 * LundFeeds
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundFeeds
 * @subpackage PIES
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace LundFeeds\PIES;

use LundProducts\Service\PartService;
use LundProducts\Repository\BrandsRepository;
use LundFeeds\Service\PiesService;
use SimpleXMLElement;
use DOMDocument;
use Exception;

class PIES65 implements PiesInterface
{
    /**
     * @var SimpleXMLElement
     */
    protected $xml = null;

    /**
     * @var PartService
     */
    protected $partService = null;

    /**
     * @var Pieservice
     */
    protected $piesService = null;

    /**
     * @var int
     */
    protected $recordCount = null;

    /**
     * @var float
     */
    private $_piesVersion = 6.5;

    /**
     * @var BrandsRepository
     */
    protected $brandsRepository = null;

    /**
     * @var string
     */
    protected $brand = null;

    /**
     * @var string
     */
    protected $lundonly = null;

    /**
     * @var string
     */
    protected $generate = null;

    /**
     * @var int
     */
    protected $changeset_id = null;

    /**
     * @var array
     * TODO: manually update with current price sheet data
     */
    protected $_priceSheet = ['number'     => '99209',
                              'name'       => '99209-MAR14',
                              'effective'  => '2014-03-01', // Y-m-d
                              'expiration' => '2015-03-01']; // Y-m-d

    /**
     * @var []
     */
    protected $config = [];

    /**
     * @param PartService $partService
     * @param PiesService $piesService
     *
     * @return void
     */
    public function __construct(PartService      $partService = null,
                                PiesService      $piesService = null,
                                BrandsRepository $brandsRepository = null,
                                $brand        = null,
                                $generate     = null,
                                $changeset_id = null,
                                $config       = null)
    {
        if (null == $this->xml) {
            $this->xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><PIES xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema" xmlns="http://www.aftermarket.org/eCommerce/Pies"></PIES>');

            // test file?
            $this->xml->addChild('TestFile', 'false'); // TODO: Toggle on for development mode
        }

        if (null != $partService) {
            if (null == $this->partService) {
                $this->partService = $partService;
            }
        }

        if (null != $piesService) {
            $this->piesService = $piesService;
        }

        if (null != $brandsRepository) {
            $this->brandsRepository = $brandsRepository;
        }

        if (null != $brand) {
            if ($brand == 'LUNDONLY') {
                $this->brand = $this->brandsRepository->findOneBy(['name' => 'LUND']);
                $this->lundonly = true;
            } else {
                $this->brand = $this->brandsRepository->findOneBy(['name' => trim(strtoupper($brand))]);
            }

            if (!$this->brand) {
                throw new Exception('Couldn\'t find brand \'' . $brand . '\'');
            }
        } else {
            $this->brand = null;
        }

        if (null != $generate) {
            $this->generate = $generate;
        }

        if (null != $changeset_id) {
            $this->changeset_id = $changeset_id;
        }

        if (null != $config) {
            $this->config = $config;
        }
    }

    private function _getPriceSheet()
    {
        return $this->_priceSheet;
    }

    /**
     * @return void
     */
    public function getHeader()
    {
        $header = $this->xml->addChild('Header');
        $header->addChild('PIESVersion', (STRING)$this->_getPiesVersion());
        $header->addChild('SubmissionType', ($this->generate == 'full' ? 'FULL' : 'NET')); // TODO: Toggle to incremental
        $header->addChild('ChangesSinceDate', date('Y-m-d'));

        $header->addChild('ParentAAIAID', ((null != $this->brand) ? $this->brand->getAaiaid() : 'BLHW')); // if brand is not null, use that brand, else, use BLHW for parent code/brand
        //$header->addChild('BrandOwnerDUNS', ''); //TODO: www.dnb.com, locate DUNS code?
        $header->addChild('TechnicalContact', 'Jamie Drobik');
        $header->addChild('ContactEmail', 'jdrobik@lundinter.com');
        $header->addChild('LanguageCode', 'EN');
        $header->addChild('CurrencyCode', 'USD');
    }

    /**
     * @return void
     */
    public function getPriceSheetSegment()
    {
        $latest_pricesheet = $this->_getPriceSheet();

        $pricesheets = $this->xml->addChild('PriceSheets');

        $pricesheet = $pricesheets->addChild('PriceSheet');
        $pricesheet->addAttribute('MaintenanceType', 'A'); // TODO: Change to valid change value

        $pricesheet->addChild('PriceSheetNumber', $latest_pricesheet['number']);
        $pricesheet->addChild('PriceSheetName', $latest_pricesheet['name']);
        $pricesheet->addChild('CurrencyCode', 'USD');
        $pricesheet->addChild('EffectiveDate', $latest_pricesheet['effective']);
        $pricesheet->addChild('ExpirationDate', $latest_pricesheet['expiration']);
    }

    /**
     * @return void
     */
    public function getBody($fp = null)
    {
        $records = $this->partService->getAcesParts($this->brand, $this->generate, $this->changeset_id, $this->lundonly);

        $latest_pricesheet = $this->_getPriceSheet();
        $items             = $this->xml->addChild('Items');
        $iterator          = 1;

        // iterate through parts
        foreach ($records as $record) {
            $item = $items->addChild('Item');

            // - A: Additive
            // - C: Change
            $item->addAttribute('MaintenanceType', 'A'); // TODO: Change to valid change value

            $item->addChild('PartNumber', $record->getPartNumber());
            if ($this->brand->getShortCode() == 'LUND') {
                $item->addChild('BrandAAIAID', $record->getProductLine()->getBrand()->getAaiaid());
                $item->addChild('BrandLabel', $record->getProductLine()->getBrand()->getLabel());
            } else {
                $item->addChild('BrandAAIAID', $record->getProductLine()->getOrigBrand()->getAaiaid());
                $item->addChild('BrandLabel', $record->getProductLine()->getOrigBrand()->getLabel());
            }

            /*
            if (null != $this->lundonly) {
                $item->addChild('BrandAAIAID', $record->getProductLine()->getBrand()->getAaiaid());
            } else {
                $item->addChild('BrandAAIAID', $record->getProductLine()->getOrigBrand()->getAaiaid());
            }
            //$item->addChild('BrandLabel', $record->getProductLine()->getBrand()->getLabel());
            $item->addChild('BrandLabel', $record->getProductLine()->getOrigBrand()->getLabel());
            */

            $item->addChild('PartTerminologyID', $record->getPartTypeId());

            $descriptions = $item->addChild('Descriptions');

            // generate Product Description, DescriptionCode="DES" (Product Description), ?
            // generates description of part based on Product Line/Product category?
            // ex: <Description LanguageCode="END"
            //                  MaintenanceType="A"
            //                  DescriptionCode="ABR">
            //     PHP return text here?
            //     </description>
            $prod_name = $descriptions->addChild('Description'); //, $record->getProductLine()->getName()); // Grab Product Line name
            $prod_name->Description = $record->getProductLine()->getName();
            $prod_name->addAttribute('LanguageCode', 'EN');
            $prod_name->addAttribute('MaintenanceType', 'A'); // TODO: Change to valid change value
            $prod_name->addAttribute('DescriptionCode', 'DES');

            $mkcopy = strip_tags($record->getProductLine()->getOverview());
            $mkcopy = str_replace("\n", '', $mkcopy);
            $mkcopy = str_replace("\r", '', $mkcopy);
            $mkcopy = str_replace("&trade;", chr(153), $mkcopy);
            $mkcopy = str_replace("&reg;", chr(174), $mkcopy);
	    $mkcopy = str_replace("&#39;", chr(39), $mkcopy);
	    $mkcopy = str_replace("&ndash;", chr(150), $mkcopy);
	    $mkcopy = str_replace("&rsquo;", chr(39), $mkcopy);
            $marketing_copy = $descriptions->addChild('Description');
            //$marketing_copy->Description = strip_tags($record->getProductLine()->getOverview());
            $marketing_copy->Description = $mkcopy;
            $marketing_copy->addAttribute('LanguageCode', 'EN');
            $marketing_copy->addAttribute('MaintenanceType', 'A');
            $marketing_copy->AddAttribute('DescriptionCode', 'MKT');

            $prices = $item->addChild('Prices');
            /*// -- generates Jobber Price, MSRP Price, Sale Price and Shipping Price
            // ex: <Pricing MaintenanceType="A"
            //              PriceType="AC1"> // TODO: figure out each Pricetype foreach different type of price
            //         <PriceSheetNumber>2007WD</PriceSheetNumber> TODO: figure out the Price Sheet Number from Jamie email? don't think this changes.
            //         <CurrencyCode>USD</CurrencyCode>
            //         <EffectiveDate>2007-08-13</EffectiveDate>
            //         <ExpirationDate>2008-08-13</ExpirationDate>
            //         <Price UOM="EA"> $part->getJobberPrice; etc... </Price>
            //         <PriceBreak UOM="EA">String</PriceBreak>
                //     </Pricing>*/

            // generate Jobber Price, PriceType="JBR"
            $jobber = $prices->addChild('Pricing');
            $jobber->addAttribute('MaintenanceType', 'A'); // TODO: Change to valid change value
            $jobber->addAttribute('PriceType', 'JBR');

            $jobber->addChild('PriceSheetNumber', $latest_pricesheet['number']);
            $jobber->addChild('CurrencyCode', 'USD');
            $jobber->addChild('EffectiveDate', $latest_pricesheet['effective']);
            $jobber->addChild('ExpirationDate', $latest_pricesheet['expiration']);
            $jobber_uom = $jobber->addChild('Price', $record->getJobberPrice());
            $jobber_uom->addAttribute('UOM', 'PE'); // EA....I think that's what we need

            // generate MSRP Price, PriceType="RET", Retail
            $msrp = $prices->addChild('Pricing');
            $msrp->addAttribute('MaintenanceType', 'A'); // TODO: Change to valid change value
            $msrp->addAttribute('PriceType', 'RET');

            $msrp->addChild('PriceSheetNumber', $latest_pricesheet['number']);
            $msrp->addChild('CurrencyCode', 'USD');
            $msrp->addChild('EffectiveDate', $latest_pricesheet['effective']);
            $msrp->addChild('ExpirationDate', $latest_pricesheet['expiration']);
            $msrp_uom = $msrp->addChild('Price', $record->getMsrpPrice());
            $msrp_uom->addAttribute('UOM', 'PE'); // EA....I think that's what we need

            $expi = $item->addChild('ExtendedInformation');
            // -- EXAMPLE DCI we have uses: CTO, NPC, HSB, NAF (Country of Origin, National Popularity Code?, Harmonized Tariff Code?, NAFTA Preference Criterion Code?)
            // ex: <ExtendedProductInformation MaintenanceType="A"
            //                                 LanguageCode="US"
            //                                 EXPICode="CTO"> // CTO = Country of origin
            //      $part->getCountryOfOrigin();
            //     </ExtendedProductInformation>
	    if ($record->getCountryOfOrigin() == 'USA') {
		$country = 'US';
	    } else if ($record->getCountryOfOrigin() == 'CANADA') {
		$country = 'CA';
	    } else if ($record->getCountryOfOrigin() == 'CHINA') {
		$country = 'CN';
	    } else if ($record->getCountryOfOrigin() == 'TAIWAN') {
		$country = 'TW';
	    }
            $coo = $expi->addChild('ExtendedProductInformation', $record->getCountryOfOrigin());
            $coo->addAttribute('MaintenanceType', 'A'); // TODO: Change to valid change value
            $coo->addAttribute('LanguageCode', 'EN');
            $coo->addAttribute('EXPICode', 'CTO');

            //$attributes = $item->addChild('ProductAttributes');
            // -- generates Length, Width, Height, Weight?
            // ex: <ProductAttribute MaintenanceType="A"
            //                       AttributeID="Length"
            //                       PADBAttribute="N"
            //                       AttributeUOM="IN"
            //                       RecordNumber="1"> // iterator FOREACH different ProductAttribute element inside ProductAttributes
            //            $part->getLength();
            //    </ProductAttribute>
            /*$part_length = $attributes->addChild('ProductAttribute', $record->getLength());
            $part_length->addAttribute('MaintenanceType', 'A'); // TODO: Change to valid change value
            $part_length->addAttribute('AttributeID', 'Length');
            $part_length->addAttribute('PADBAttribute', 'N');
            $part_length->addAttribute('AttributeUOM', 'IN');
            $part_length->addAttribute('RecordNumber', '1');

            $part_width = $attributes->addChild('ProductAttribute', $record->getWidth());
            $part_width->addAttribute('MaintenanceType', 'A'); // TODO: Change to valid change value
            $part_width->addAttribute('AttributeID', 'Width');
            $part_width->addAttribute('PADBAttribute', 'N');
            $part_width->addAttribute('AttributeUOM', 'IN');
            $part_width->addAttribute('RecordNumber', '2');

            $part_height = $attributes->addChild('ProductAttribute', $record->getHeight());
            $part_height->addAttribute('MaintenanceType', 'A'); // TODO: Change to valid change value
            $part_height->addAttribute('AttributeID', 'Height');
            $part_height->addAttribute('PADBAttribute', 'N');
            $part_height->addAttribute('AttributeUOM', 'IN');
            $part_height->addAttribute('RecordNumber', '3');

            $part_weight = $attributes->addChild('ProductAttribute', $record->getWeight());
            $part_weight->addAttribute('MaintenanceType', 'A'); // TODO: Change to valid change value
            $part_weight->addAttribute('AttributeID', 'Weight');
            $part_weight->addAttribute('PADBAttribute', 'N');
            $part_weight->addAttribute('AttributeUOM', 'LB');
            $part_weight->addAttribute('RecordNumber', '4');*/

            // Packaging
            $packaging = $item->addChild('Packages');
            $package = $packaging->addChild('Package');
            $package->addAttribute('MaintenanceType', 'A');
            $package->addChild('PackageUOM', 'EA');
            $package->addChild('QuantityofEaches', '1');
            
            $dimensions = $package->addChild('Dimensions');
            $dimensions->addAttribute('UOM', 'IN');
            $dimensions->addChild('Height', $record->getHeight());
            $dimensions->addChild('Width', $record->getWidth());
            $dimensions->addChild('Length', $record->getLength());

            $weights = $package->addChild('Weights');
            $weights->addAttribute('UOM', 'PG');
            $weights->addChild('Weight', $record->getWeight());

            if ($record->getHeight() != '0.00') {
                $dimWeight = $record->getHeight()*$record->getWidth()*$record->getLength()/194;
                $weights->addChild('DimensionalWeight', round($dimWeight, 2));
            }

            $assets = $item->addChild('DigitalAssets');
            // -- generate from part_asset
            // TODO: real data, this is dummy data
            //$part_assets = [
            //                ['filename' => '37651-off-vehicle-HR.jpg',
            //                 'filesize' => 48981, // bytes
            //                 'height'   => '533',
            //                 'width'    => '800',
            //                 'url'      => 'http://www.lundinternational.com/images/products/37651-off-vehicle-HR.jpg',
            //                 'modified' => date('m-d-Y'),
            //                ],
            //               ];

            //for ($i = 0; $i < count($part_assets); ++$i) {
            foreach ($record->getPartAsset() as $part_asset) {
                $asset = $part_asset->getAsset();

                $digital = $assets->addChild('DigitalFileInformation');
                $digital->addAttribute('MaintenanceType', 'A'); // TODO: Change to valid change value
                $digital->addAttribute('LanguageCode', 'EN');

                $digital->addChild('FileName', $asset->getFileName());
                $digital->addChild('AssetType', $part_asset->getPicType());

                $filename = explode('.', $asset->getFileName());
                $digital->addChild('FileType', strtoupper($filename[count($filename) - 1])); // TODO: TIF, JPG, EPS, GIF, BMP, PNG, PDF, DOC, XLS - split out file name

                // Always 'A'
                $digital->addChild('Representation', 'A');

                // asset.size
                $fileSize = round($asset->getSize()/1024);
                $digital->addChild('FileSize', $fileSize);

                // TODO: which one? DPI: 72, 96, 300, 600, 800, 1200
                $digital->addChild('Resolution', '72');

                // always 'RGB'
                $digital->addChild('ColorMode', 'RGB');

                // asset dimensions parent, shows ex. in doc
                $dimensions = $digital->addChild('AssetDimensions');
                $dimensions->addAttribute('UOM', 'PX');

                // asset.height
                $dimensions->addChild('AssetHeight', $asset->getHeight());

                // asset.width
                $dimensions->addChild('AssetWidth', $asset->getWidth());

                // RR IS hosting images, going to track impressions... via JG.
                $digital->addChild('URI', 'http://' . $this->config['part_asset_path'] . $asset->getFilePath());
                $digital->addChild('FileDateModified', (null != $asset->getModifiedAt() ? $asset->getModifiedAt()->format('Y-m-d') : $asset->getCreatedAt()->format('Y-m-d'))); // TODO: grab last modified date, populate with today's date?
            }

            if (null != $record->getIsheet()) {
                $digital = $assets->addChild('DigitalFileInformation');
                $digital->addAttribute('MaintenanceType', 'A');
                $digital->addAttribute('LanguageCode', 'EN');
                $digital->addChild('FileName', $record->getIsheet() . '.pdf');
                $digital->addChild('AssetType', 'ISG');
                $digital->addChild('FileType', 'PDF');
                $digital->addChild('Represenation', 'A');
                $digital->addChild('URI', 'http://' . $this->config['part_asset_path'] . 'library/products/isheets/' . $record->getIsheet() . '.pdf');
            }

            ++$iterator;
        }

        // assign record count for getFooter to utilize via getXML(), saveXML()
        $this->recordCount = count($records);
    }

    /**
     * @return void
     */
    public function getFooter()
    {
        $footer = $this->xml->addChild('Trailer');
        $footer->addChild('ItemCount', $this->recordCount);
        $footer->addChild('TransactionDate', date('Y-m-d'));
    }

    /**
     * @return string
     */
    public function getXML()
    {
        $this->getHeader();
        $this->getPriceSheetSegment();
        $this->getBody();
        $this->getFooter();

        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput       = true;
        $dom->loadXML($this->xml->asXML());

        return $dom->saveXML();
    }

    /**
     * @param  string $location
     * @return void
     */
    public function saveXML($location = null)
    {
        $this->getHeader();
        $this->getPriceSheetSegment();
        $this->getBody();
        $this->getFooter();

        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput       = true;
        $dom->loadXML(utf8_encode($this->xml->asXML()));

        return $dom->save($location);
    }

    /**
     * @return float
     */
    private function _getPiesVersion()
    {
        return $this->_piesVersion;
    }
}
