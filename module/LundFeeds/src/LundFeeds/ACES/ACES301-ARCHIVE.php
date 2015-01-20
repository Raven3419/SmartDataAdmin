<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/*
 * LundFeeds
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundFeeds
 * @subpackage ACES
 * @author     Mark Cizek <mark@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 * @since      File available since Release 1.0.0
 */

namespace LundFeeds\ACES;

use LundProducts\Service\PartService;
use LundProducts\Repository\BrandsRepository;
use LundFeeds\Service\AcesService;
use SimpleXMLElement;
use DOMDocument;
use Exception;

class ACES301 implements AcesInterface
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
     * @var AcesService
     */
    protected $acesService = null;

    /**
     * @var int
     */
    protected $recordCount = 0;

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
    protected $generate = null;

    /**
     * @var int
     */
    protected $changeset_id = null;

    /**
     * @param PartService      $partService
     * @param AcesService      $acesService
     * @param BrandsRepository $brandsRepository
     * @param string           $brand
     * @param string           $generate
     * @param int              $changeset_id
     */
    public function __construct(PartService      $partService = null,
                                AcesService      $acesService = null,
                                BrandsRepository $brandsRepository = null,
                                $brand        = null,
                                $generate     = null,
                                $changeset_id = null)
    {
        if (null == $this->xml) {
            $this->xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><ACES></ACES>');
            $this->xml->addAttribute('version', '3.0.1');
        }

        if (null != $partService) {
            if (null == $this->partService) {
                $this->partService = $partService;
            }
        }

        if (null != $acesService) {
            $this->acesService = $acesService;
        }

        if (null != $brandsRepository) {
            $this->brandsRepository = $brandsRepository;
        }

        if (null != $brand) {
            $this->brand = $this->brandsRepository->findOneBy(['name' => trim(strtoupper($brand))]);

            if (!$this->brand) {
                throw new Exception('Couldn\'t find brand \'' . $brand . '\'');
            }
        }

        if (null != $generate) {
            $this->generate = $generate;
        }

        if (null != $changeset_id) {
            $this->changeset_id = $changeset_id;
        }
    }

    /**
     * @return void
     */
    public function getHeader()
    {
        $header = $this->xml->addChild('Header');
        $header->addChild('Company', 'Lund International');
        $header->addChild('SenderName', 'Jamie Drobik');
        $header->addChild('SenderPhone', '6788043786');
        //$header->addChild('SenderPhoneExt', '110');
        $header->addChild('TransferDate', date('Y-m-d'));
        $header->addChild('BrandAAIAID', ((null != $this->brand) ? $this->brand->getAaiaid() : 'BLHW')); // if brand is not null, use that brand, else, use BLHW for parent code/brand
        $header->addChild('DocumentTitle', 'Lund ACES ' . ((null != $this->brand) ? $this->brand->getName() : '') . ' ' . date('Y-m-d'));
        $header->addChild('EffectiveDate', date('Y-m-d'));
        $header->addChild('SubmissionType', ($this->generate == 'full' ? 'FULL' : 'NET'));
        $header->addChild('VcdbVersionDate', '2008-01-31');
        $header->addChild('QdbVersionDate', '2006-11-15');
        $header->addChild('PcdbVersionDate', '2007-12-18');
    }

    /**
     * @return void
     */
    public function getBody()
    {
        if (null != $this->generate || null != $this->changeset_id) {
            if (null == $this->brand) {
                $records = $this->partService->getAcesParts(null, $this->generate, $this->changeset_id);
            } else {
                $records = $this->partService->getAcesParts($this->brand, $this->generate, $this->changeset_id);
            }
        } else {
            if (null == $this->brand) {
                $records = $this->partService->getAcesParts();
            } else {
                $records = $this->partService->getAcesParts($this->brand);
            }
        }

        // iterate through parts
        $vehCollectionIterator = 1;

        foreach ($records as $record) {
            // iterate through veh_collection
            $last_hash = null;
            $vehicles  = [];

            foreach ($record->getVehCollections() as $vehCollection) {
                // generate listings by each make/model/submodel combination, generate the from/to years
                $vehColl   = $vehCollection->getVehCollection();
                $this_hash = (STRING)(($vehColl->getVehMake()) ? $vehColl->getVehMake()->getVehMakeId() : '') .
                                     (($vehColl->getVehModel()) ? $vehColl->getVehModel()->getVehModelId() : '') .
                                     (($vehColl->getVehSubmodel()) ? $vehColl->getVehSubmodel()->getVehSubmodelId() : '');

                // generate array with unique make/model/submodel
                $vehicles[$this_hash]['years'][]           = $vehColl->getVehYear()->getName();
                $vehicles[$this_hash]['make_id']           = $vehColl->getMakeId();
                $vehicles[$this_hash]['model_id']          = $vehColl->getModelId();
                $vehicles[$this_hash]['submodel_id']       = $vehColl->getSubmodelId();
                $vehicles[$this_hash]['body_type_id']      = $vehColl->getBodyTypeId();
                $vehicles[$this_hash]['body_num_doors_id'] = $vehColl->getBodyNumDoorsId();
                $vehicles[$this_hash]['bed_type_id']       = $vehColl->getBedTypeId();
            }

            foreach ($vehicles as $vehicle) {
                $years = [];

                // generate to/from years
                foreach ($vehicle['years'] as $year) {
                    $years[] = $year;
                }

                $from_year = min($years);
                $to_year   = max($years);

                $app = $this->xml->addChild('App');
                if ($this->generate == 'full') {
                    $app->addAttribute('action', 'A');
                } else {
                    $app->addAttribute('action', 'A'); // TODO: Needs to change based on changeset detail change field
                }
                $app->addAttribute('id', $vehCollectionIterator);

                $years = $app->addChild('Years');
                $years->addAttribute('from', (STRING)$from_year);
                $years->addAttribute('to', (STRING)$to_year);

                if (!in_array(trim($vehicle['make_id']), array('', '0'))) {
                    $make = $app->addChild('Make');
                    $make->addAttribute('id', $vehicle['make_id']);
                }

                if (!in_array(trim($vehicle['model_id']), array('', '0'))) {
                    $model = $app->addChild('Model');
                    $model->addAttribute('id', $vehicle['model_id']);
                }

                if (!in_array(trim($vehicle['submodel_id']), array('', '0'))) {
                    $submodel = $app->addChild('SubModel');
                    $submodel->addAttribute('id', $vehicle['submodel_id']);
                }

                if (!in_array(trim($vehicle['body_type_id']), array('', '0'))) {
                    $bodytype = $app->addChild('BodyType');
                    $bodytype->addAttribute('id', $vehicle['body_type_id']);
                }
                $note = $record->getProductLine()->getName();
                $note .= '; ' . $record->getProductLine()->getProductCategory()->getName();
                $note .= ((null != $record->getColor()) ? '; ' . $record->getColor() : '');
                $note .= ((null != $vehCollection->getSubdetail()) ? '; ' . $vehCollection->getSubdetail() : '');

                $note = preg_replace('/&/', 'and', $note);

                $app->addChild('Note', $note);

                // in the correct spot, supposed to be between BodyType and PartType
                $app->addChild('Qty', '1');

                if (!in_array(trim($record->getPartTypeId()), array('', '0'))) {
                    $parttype = $app->addChild('PartType');
                    $parttype->addAttribute('id', $record->getPartTypeId());
                }

                if (!in_array(trim($vehicle['body_num_doors_id']), array('', '0'))) {
                    $bodynumdoors = $app->addChild('BodyNumDoors');
                    $bodynumdoors->addAttribute('id', $vehicle['body_num_doors_id']);
                }

                if (!in_array(trim($vehicle['bed_type_id']), array('', '0'))) {
                    $bedtype = $app->addChild('BedType');
                    $bedtype->addAttribute('id', $vehicle['bed_type_id']);
                }

                $app->addChild('Part', $record->getPartNumber());

                ++$vehCollectionIterator;

                $this->recordCount++;
            }
        }
    }

    /**
     * @return void
     */
    public function getFooter()
    {
        $footer = $this->xml->addChild('Footer');
        $footer->addChild('RecordCount', $this->recordCount);
    }

    /**
     * @return string
     */
    public function getXML()
    {
        $this->getHeader();
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
        $this->getBody();
        $this->getFooter();

        $dom = new DOMDocument('1.0');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput       = true;
        $dom->loadXML($this->xml->asXML());

        return $dom->save($location);
    }
}
