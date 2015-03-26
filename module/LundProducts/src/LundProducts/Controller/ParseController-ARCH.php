<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundProducts
 * @subpackage Controller
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace LundProducts\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Console\Request as ConsoleRequest;
use SPLFileInfo,
    SPLFileObject;
use RecursiveIteratorIterator,
    RecursiveDirectoryIterator;
use LundProducts\Service\ParseMasterService,
    LundProducts\Service\ParseSupplementService;
use RocketAdmin\Service\AuditService;
use RocketDam\Service\AssetService;
use RocketDam\Entity\AssetInterface;
use LundProducts\Service\PartAssetService;
use LundProducts\Service\PartService;
use LundProducts\Service\FileLogService;
use RocketAdmin\Service\TaskService;

/**
 * Parse master/supplement controller for LundProducts module
 *
 * @category   Zend
 * @package    LundProducts
 * @subpackage Controller
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 */
class ParseController extends AbstractActionController
{
    /**
     * @var ParseMasterService
     */
    protected $masterService = null;

    /**
     * @var ParseSupplementService
     */
    protected $supplementService = null;

    /**
     * @var AuditService
     */
    protected $auditService;

    /**
     * @var AssetService
     */
    protected $assetService;

    /**
     * @var PartAssetService
     */
    protected $partAssetService;

    /**
     * @var PartService
     */
    protected $partService;

    /**
     * @var FileLogService
     */
    protected $fileLogService;

    /**
     * @var TaskService
     */
    protected $taskService;

    /**
     * @param ParseMasterService     $masterService
     * @param ParseSupplementService $supplementService
     * @param AuditService           $auditService;
     * @param AssetService           $assetService
     * @param PartAssetService       $partAssetService
     * @param PartService            $partService
     * @param FileLogService         $fileLogService
     * @param TaskService            $taskService
     */
    public function __construct(
        ParseMasterService         $masterService,
        ParseSupplementService     $supplementService,
        AuditService               $auditService,
        AssetService               $assetService,
        PartAssetService $partAssetService,
        PartService $partService,
        FileLogService             $fileLogService,
        TaskService                $taskService
    )
    {
        $this->masterService     = $masterService;
        $this->supplementService = $supplementService;
        $this->auditService      = $auditService;
        $this->assetService      = $assetService;
        $this->partAssetService  = $partAssetService;
        $this->partService       = $partService;
        $this->fileLogService    = $fileLogService;
        $this->taskService       = $taskService;
    }

    /**
     * Parse the part staging directory and associate assets to parts
     */
    public function parseassetsAction()
    {
        $dirname = $this->getRequest()->getParam('dirname');

        $files = new RecursiveIteratorIterator(
            new RecursiveDirectoryiterator($dirname)
        );

        $allowed_exts = ['jpg', 'jpeg', 'png', 'gif', 'tiff', 'tif', 'mov', 'mp4', 'm4v'];
        $image_exts = ['jpg', 'jpeg', 'png', 'gif', 'tiff', 'tif'];
        $video_exts = ['mov', 'mp4', 'm4v'];

        $partIdArr = array();

        foreach ($files as $file) {
            if (!in_array(strtolower($file->getExtension()), $allowed_exts)) {
                continue;
            }

            $videoType = null;
            $picType   = null;
            $assetType = null;

            $path = $file->getPath();
            $fileName = $file->getFilename();
            $fullPath = $file->getPathname();
            $size = $file->getSize();
            $mtime = $file->getMTime();
            $ext = strtolower($file->getExtension());

            if (in_array(strtolower($file->getExtension()), $image_exts)) {
                $assetType = 'picture';
            } elseif (in_array(strtolower($file->getExtension()), $video_exts)) {
                $assetType = 'video';
            }

            $finfo = finfo_open(FILEINFO_MIME);
            $mimeArr = explode(';', finfo_file($finfo, $fullPath));
            $mime = $mimeArr[0];
            finfo_close($finfo);

            $partTmpArr = explode('.', $fileName);
            $partArr = explode(' ', $partTmpArr[0]);

            $usesUnderscores = false;

            if ($assetType == 'picture') {
                if (!is_array($partArr) || count($partArr) < 3) {
                    continue;
                }

                $partNumber = $partArr[0];
                $picType    = strtoupper($partArr[1]);

                if ($picType != 'P01' && $picType != 'P03' && $picType != 'P04' && $picType != 'P05' && $picType != 'P06' && $picType != 'P07') {
                    continue;
                }

                $resolution = strtoupper($partArr[2]);

                if (preg_match('/_/', $resolution)) {
                    $resArr = explode('_', $resolution);
                    $resolution = $resArr[0];
                    $sequence = $resArr[1];
                } else {
                    $sequence = 1;
                }

                $dimensions = getimagesize($fullPath);
            } elseif ($assetType == 'video') {

            }

            $part = $this->partService->getPartByPartNumber($partNumber);

            if (null != $part) {
                if (!in_array($part->getPartId(), $partIdArr)) {
                    $partIdArr[] = $part->getPartId();
                }

                $stat = array(
                    'size' => $size,
                    'mime' => $mime,
                    'ext'  => $ext,
                );

                if ($assetType == 'picture') {
                    $stat['filetype'] = 'partimage';
                    $stat['width'] = $dimensions[0];
                    $stat['height'] = $dimensions[1];
                } elseif ($assetType == 'video') {
                    $stat['filetype'] = 'partvideo';
                }

                // TODO Create low resolution version and associate low res version with part

                $hashPath = '/products/parts/'.$fileName;
                $hash = strtr(base64_encode($hashPath), '+/=', '-_.');
                $hash = rtrim($hash, '.');
                $hash = 'l1_'.$hash;

                $asset = $this->assetService->getAssetPrototype();;
                $asset = $this->assetService->saveFile('library/products/parts', $fileName, $stat, $hash);

                if ($asset instanceof AssetInterface) {
                    $ingest_asset_command = 'mv "' . $fullPath . '" "' . realpath(__DIR__ . '/../../../../../public/assets/library/products/parts') . '/' . $fileName . '"';
                    shell_exec($ingest_asset_command);
                } else {
                    // Error creating asset
                    continue;
                }

                $amazonName = null;

                if (!$this->partAssetService->duplicateCheck($part, $asset)) {
                    $partAsset = $this->partAssetService->create($part, $asset, $amazonName, $picType, $order, $assetType, $videoType);
                }
            }
        }

        $this->cleanUpAmazon($partIdArr);
    }

    /**
     * Clean up part asset table based on amazon requirements
     *
     * @param array $partIds
     */
    public function cleanUpAmazon($partIds)
    {
        foreach ($partIds as $id) {
            $part       = $this->partService->getPart($id);
            $partAssets = $this->partAssetService->getPartAssetsByPart($part);

            $upc = $part->getUpcCode();

            $hash = array();
            $highpriority = null;
            $mediumpriority = null;

            foreach ($partAssets as $partAsset) {
                if ($partAsset->getPicType() == 'on vehicle') {
                    if ($partAsset->getResolution() == 'HR' && $partAsset->getAssetSeq() == 1) {
                       $hash = array($partAsset->getPartAssetId());
                       $highpriority = true;
                    }
                } elseif ($partAsset->getPicType() == 'lifestyle') {
                    if (count($hash) < 1 && $partAsset->getAssetSeq() == 1) {
                        $hash = array($partAsset->getPartAssetId());
                        $mediumpriority = true;
                    } elseif (!$highpriority && !$mediumpriority && $partAsset->getAssetSeq() == 1) {
                        array_unshift($hash, $partAsset->getPartAssetId());
                        $mediumpriority = true;
                    } elseif (!$highpriority && $partAsset->getResolution() == 'HR' && $partAsset->getAssetSeq() == 1) {
                        array_unshift($hash, $partAsset->getPartAssetId());
                        $mediumpriority = true;
                    }
                } elseif ($partAsset->getPicType() == 'off vehicle') {
                    if (count($hash) < 1 && $partAsset->getAssetSeq() == 1) {
                        $hash = array($partAsset->getPartAssetId());
                    } elseif (!$highpriority && !$mediumpriority && $partAsset->getResolution() == 'HR' && $partAsset->getAssetSeq() == 1) {
                        array_unshift($hash, $partAsset->getPartAssetId());
                    }
                }
            }

            $amazonName = null;

            foreach ($partAssets as $partAsset) {
                $ext = $partAsset->getAsset()->getExtension();

                if ($partAsset->getPartAssetId() == $hash[0]) {
                    $amazonName = $upc.'.'.$ext;
                } else {
                    if ($partAsset->getPicType() == 'on vehicle') {
                        $amazonName = $upc.'.ONVEH-'.$partAsset->getResolution().'-'.$partAsset->getAssetSeq().'.'.$ext;
                    } elseif ($partAsset->getPicType() == 'lifestyle') {
                        $amazonName = $upc.'.LIFESTYLE-'.$partAsset->getResolution().'-'.$partAsset->getAssetSeq().'.'.$ext;
                    } elseif ($partAsset->getPicType() == 'off vehicle') {
                        $amazonName = $upc.'.OFFVEH-'.$partAsset->getResolution().'-'.$partAsset->getAssetSeq().'.'.$ext;
                    }
                }

                $this->partAssetService->editPartAsset($partAsset, $amazonName);
            }
        }
    }

    /**
     * Parse the supplement file, create changeset taxonomy.
     *
     * @return string
     */
    public function parsesupplementAction()
    {
        $filename = $this->getRequest()->getParam('filename');
        $file     = new SPLFileObject($filename);

        if (($file->isFile()) && ($file->isReadable())) {
            switch (strtolower($file->getExtension())) {
                case 'csv':
                    $file->setFlags(SplFileObject::READ_CSV);
                    $file->setCsvControl(',', '"', '\\');
                    $iterator = 0;
                    $summary  = [];

                    $filepath = explode('/', $filename);

                    // generate audit log entry
                    $this->auditService->create([
                        'createdBy' => 'system',
                        'object'    => 'LundProducts',
                        'action'    => 'Supplement File Ingestion',
                        'summary'   => 'Starting supplement file ingestion on file \'' . $filepath[count($filepath) - 1] . '\'',
                        'result'    => 'success',
                    ]);

                    // create changeset, update summary later
                    $changeset    = $this->supplementService->createChangeset(date('Y-m-d H:i:s'), null, null, null, 0, 0, date('Y-m-d H:i:s'), null, $filename);
                    $changeset_id = $changeset['changeset_id'];

                    foreach ($file as $rowData) {
                        $iterator++;

                        // TODO: figure out why CSV file contains an array with no data in it.
                        if (($iterator == 1) || (count($rowData) <= 1)) {
                            continue;
                        }
/*
item                      0   "192503"
brand                     1   "AVS",
class                     2   "P1",
ClassDesc                 3   "IN-CHANNEL VENTVISOR 2PC",
PF                        4   24,
PF_Desc                   5   "WINDOW",
FromYear                  6   1999.0,
ToYear                    7   2013.0,
Make                      8   "FORD",
Model                     9   "F-250",
SubModel                 10   "",
SubDetail                11   "",
BodyTyp                  12   "",
BedTyp                   13   "",
Jobber                   14   51.800,
MSRP                     15   69.920,
MAP                      16   0.00,
POPcode                  17   "B",
UPC                      18   "725478069853",
Weight                   19   2.10,
Height                   20   1.88,
Width                    21   12.25,
Length                   22   47.25,
ShippingHrs              23   48,
Color                    24   "SMOKE",
NoDrill                  25   "",
ExtraDesc                26   "",
In App guide             27   "Y",
InJobber                 28   "Y",
I-Sheet                  29   "99VV21",
DateChgdSinceLastDwnLoad 30   0,
CountryOfOrgn            31   "USA",
RetailFlg                32   "Y",
OversizeCode             33   "0",
StatusCode               34   0,
OriginalBrand            35   "AVS",
FlareHeight              36   0.00,
FlareTireCoverage        37   0.00,
DIM_A                    38   0.000,
DIM_B                    39   0.000,
DIM_C                    40   0.000,
DIM_D                    41   0.000,
DIM_E                    42   0.000,
DIM_F                    43   0.000,
DIM_G                    44   0.000,
VehicleType              45   "T",
ModelType                46   "",
MakeID                   47   "54",
ModelID                  48   "667",
SubModelID               49   "",
NoDoorsID                50   "",
PartTypeID               51   "",
BodyTypeID               52   "",
BedTypeID                53   "",
MaintType                54   "CHANGE",
AppChgd                  55   "Y",
StatusChgd               56   "",
CountryChgd              57   "",
POPchgd                  58   "",
DimsChgd                 59   "",
ColorChgd                60   "",
ClassChgd                61   "",
ImageChgd                62   "",
SeqNo                    63   1
 */

                        $part_number                   = trim($rowData[0]);
                        $brand                         = trim($rowData[1]);
                        $product_lines_short_code      = trim($rowData[3]);
                        $product_categories_short_code = trim($rowData[5]);
                        $from_year                     = trim($rowData[6]);
                        $to_year                       = trim($rowData[7]);
                        $veh_make_name                 = trim($rowData[8]);
                        $veh_model_name                = trim($rowData[9]);
                        $veh_submodel_name             = trim($rowData[10]);
                        $veh_submodel_subdetail        = trim($rowData[11]);
                        $veh_class_name                = trim($rowData[45]);
                        $body_type                     = trim($rowData[12]);
                        $bed_type                      = trim($rowData[13]);
                        $jobber_price                  = trim($rowData[14]);
                        $msrp_price                    = trim($rowData[15]);
                        $sale_price                    = trim($rowData[16]);
                        $pop_code                      = trim($rowData[17]);
                        $upc_code                      = trim($rowData[18]);
                        $weight                        = trim($rowData[19]);
                        $height                        = trim($rowData[20]);
                        $width                         = trim($rowData[21]);
                        $length                        = trim($rowData[22]);
                        $color                         = trim($rowData[24]);
                        $isheet                        = trim($rowData[29]);
                        $country_of_origin             = trim($rowData[31]);
                        $orig_brand                    = trim($rowData[35]);
                        $dima                          = trim($rowData[38]);
                        $dimb                          = trim($rowData[39]);
                        $dimc                          = trim($rowData[40]);
                        $dimd                          = trim($rowData[41]);
                        $dime                          = trim($rowData[42]);
                        $dimf                          = trim($rowData[43]);
                        $dimg                          = trim($rowData[44]);
                        $makeID                        = trim($rowData[47]);
                        $modelID                       = trim($rowData[48]);
                        $subModelID                    = trim($rowData[49]);
                        $noDoorsID                     = trim($rowData[50]);
                        $partTypeID                    = trim($rowData[51]);
                        $bodyTypeID                    = trim($rowData[52]);
                        $bedTypeID                     = trim($rowData[53]);
                        $change_type                   = trim($rowData[54]); // CHANGE, DELETE, etc
                        $app_data_changed              = strtoupper(trim($rowData[55])) == 'Y'; // TODO  Which data fields in csv are to be used to be replaced/removed
                        $status_changed                = strtoupper(trim($rowData[56])) == 'Y'; // TODO: Status: 0, 50, 55 - what do these mean?
                        $country_changed               = strtoupper(trim($rowData[57])) == 'Y'; // TODO: where does this field get updated when changeset approved?
                        $pop_changed                   = strtoupper(trim($rowData[58])) == 'Y'; // parts table
                        $dims_changed                  = strtoupper(trim($rowData[59])) == 'Y'; // parts table
                        $color_changed                 = strtoupper(trim($rowData[60])) == 'Y'; // parts table
                        $class_changed                 = strtoupper(trim($rowData[61])) == 'Y';
                        $image_changed                 = strtoupper(trim($rowData[62])) == 'Y';
                        $seq_no                        = trim($rowData[63];

                        // universal parts:
                        // - Make = UNIVERSAL
                        // - missing Make, Model, Submodel and SubDetail
                        $universal = ((strtoupper(trim($veh_make_name)) == 'UNIVERSAL') ? true :
                                     (((trim($veh_make_name) == '') && (trim($veh_model_name) == '') && (trim($veh_submodel_name) == '') && (trim($veh_submodel_subdetail) == '')) ? true : false));

                        $change_file_row = '';

                        foreach ($rowData as $index => $rowColumnData) {
                            $change_file_row .= '"' . $rowColumnData . '",';
                        }

                        $changeset_detail_record = ['part_id'                => null,
                                                    'brand_id'               => null,
                                                    'product_category_id'    => null,
                                                    'product_line_id'        => null,
                                                    'changeset_id'           => $changeset_id,
                                                    'part_number'            => null,
                                                    'brand_label'            => null,
                                                    'product_category_label' => null,
                                                    'product_line_label'     => null,
                                                    'change'                 => trim(strtolower($change_type)),
                                                    'change_type'            => null,
                                                    'status_changed'         => null,
                                                    'country_changed'        => null,
                                                    'pop_changed'            => null,
                                                    'color_changed'          => null,
                                                    'dima_changed'           => null,
                                                    'dimb_changed'           => null,
                                                    'dimc_changed'           => null,
                                                    'dimd_changed'           => null,
                                                    'dime_changed'           => null,
                                                    'dimf_changed'           => null,
                                                    'dimg_changed'           => null,
                                                    'change_file_row'        => $change_file_row,
                                                   ];

                        // build summary
                        $insert_change_type = '';

                        if ($app_data_changed == true) {
                            $summary[$change_type][] = 'app_data_changed';
                            $insert_change_type      = 'app_data_changed';

                            // TODO: what to populate with changeset_detail_record?
                        }

                        if ($status_changed == true) {
                            $summary[$change_type][] = 'status_changed';
                            $insert_change_type      = 'status_changed';
                        }

                        if ($country_changed == true) {
                            $summary[$change_type][] = 'country_changed';
                            $insert_change_type      = 'country_changed';

                            $changeset_detail_record['country_changed'] = $country_of_origin;
                        }

                        if ($pop_changed == true) {
                            $summary[$change_type][]     = 'pop_changed';
                            $insert_change_type          = 'pop_changed';

                            $changeset_detail_record['pop_changed'] = $pop_code;
                        }

                        if ($dims_changed == true) {
                            $summary[$change_type][] = 'dims_changed';
                            $insert_change_type      = 'dims_changed';

                            $changeset_detail_record['dima_changed'] = $dima;
                            $changeset_detail_record['dimb_changed'] = $dimb;
                            $changeset_detail_record['dimc_changed'] = $dimc;
                            $changeset_detail_record['dimd_changed'] = $dimd;
                            $changeset_detail_record['dime_changed'] = $dime;
                            $changeset_detail_record['dimf_changed'] = $dimf;
                            $changeset_detail_record['dimg_changed'] = $dimg;
                        }

                        if ($color_changed == true) {
                            $summary[$change_type][] = 'color_changed';
                            $insert_change_type      = 'color_changed';

                            $changeset_detail_record['color_changed'] = $color;
                        }

                        if ($class_changed == true) {
                            $summary[$change_type][] = 'class_changed';
                            //$insert_change_type      = 'class_changed';
                        }

                        if ($image_changed == true) {
                            $summary[$change_type][] = 'image_changed';
                            //$insert_change_type      = 'image_changed';
                        }

                        $changeset_detail_record['change_type'] = $insert_change_type;

                        $foundBrand = $this->masterService->findBrand($brand);

                        // TODO: is there going to ever be a brand in the supplement file that doesn't already exist?
                        if (null != $foundBrand) {
                            $changeset_detail_record['brand_id'] = $foundBrand['brand_id'];
                        } else {
                            $changeset_detail_record['brand_label'] = $brand;
                        }

                        $foundProductLine = $this->supplementService->findProductLine($product_lines_short_code);

                        if (null != $foundProductLine) {
                            $changeset_detail_record['product_line_id'] = $foundProductLine['product_line_id'];
                        } else {
                            $changeset_detail_record['product_line_label'] = $product_lines_short_code;
                        }

                        $foundProductCategory = $this->supplementService->findProductCategory($product_categories_short_code);

                        if (null != $foundProductCategory) {
                            $changeset_detail_record['product_category_id'] = $foundProductCategory['product_category_id'];
                        } else {
                            $changeset_detail_record['product_category_label'] = $product_categories_short_code;
                        }

                        $foundPart = $this->supplementService->findPart($part_number);

                        if (null != $foundPart) {
                            $changeset_detail_record['part_id'] = $foundPart['part_id'];
                        } else {
                            $changeset_detail_record['part_number'] = $part_number;
                        }

                        $detail_record = $this->supplementService->createChangesetDetail($changeset_detail_record);

                        if (($universal != true) && ($from_year > 0 && $to_year > 0)) {
                            $from_year = round((FLOAT)$from_year, 0, PHP_ROUND_HALF_DOWN);
                            $to_year   = round((FLOAT)$to_year, 0, PHP_ROUND_HALF_DOWN);

                            // insert changeset_details_vehicles record
                            for ($k = $from_year; $k <= $to_year; $k++) {
                                $this_year = $k;

                                $vehicle_record = [
                                    'veh_collection_id'   => null,
                                    'veh_make_id'         => null,
                                    'veh_model_id'        => null,
                                    'veh_submodel_id'     => null,
                                    'veh_year_id'         => null,
                                    'veh_class_id'        => null,
                                    'changeset_detail_id' => $detail_record['changeset_detail_id'],
                                    'veh_make_label'      => null,
                                    'veh_model_label'     => null,
                                    'veh_submodel_label'  => null,
                                    'veh_year_label'      => null,
                                    'veh_class_label'     => null,
                                ];

                                // vehicle year
                                $foundVehYear = $this->masterService->findVehYear((STRING)$this_year);

                                if (null == $foundVehYear) {
                                    $vehicle_record['veh_year_label'] = (STRING)$this_year;
                                } else {
                                    $vehicle_record['veh_year_id'] = $foundVehYear['veh_year_id'];
                                }

                                // vehicle make
                                $foundVehMake = $this->masterService->findVehMake($veh_make_name);

                                if (null == $foundVehMake) {
                                    $vehicle_record['veh_make_label'] = $veh_make_name;
                                } else {
                                    $vehicle_record['veh_make_id'] = $foundVehMake['veh_make_id'];
                                }

                                $foundVehClass = $this->masterService->findVehClass($veh_class_name);

                                if (null == $foundVehClass) {
                                    $vehicle_record['veh_class_label'] = $veh_class_name;
                                } else {
                                    $vehicle_record['veh_class_id'] = $foundVehClass['veh_class_id'];
                                }

                                // vehicle model
                                $foundVehModel = $this->masterService->findVehModel($veh_model_name);

                                if (null == $foundVehModel) {
                                    $vehicle_record['veh_model_label'] = $veh_model_name;
                                } else {
                                    $vehicle_record['veh_model_id'] = $foundVehModel['veh_model_id'];
                                }

                                // veh_submodel
                                if (trim($veh_submodel_name) != '') {
                                    $foundVehSubmodel = $this->masterService->findVehSubmodel($veh_submodel_name);

                                    if (null == $foundVehSubmodel) {
                                        $vehicle_record['veh_submodel_label'] = $veh_submodel_name;
                                    } else {
                                        $vehicle_record['veh_submodel_id'] = $foundVehSubmodel['veh_submodel_id'];
                                    }
                                }

                                // if veh_make_id, veh_model_id, veh_submodel_id, and veh_year_id exists, lookup veh_collection record
                                // update $vehicle_record['veh_collection_id'] with found record id.
                                if ((null != $vehicle_record['veh_make_id']) && (null != $vehicle_record['veh_model_id']) &&
                                    (null != $vehicle_record['veh_submodel_id']) && (null != $vehicle_record['veh_year_id'])) {
                                    // lookup veh_collection record
                                    $foundVehCollection = $this->supplementService->findVehCollection(
                                        $vehicle_record['veh_make_id'],
                                        $vehicle_record['veh_model_id'],
                                        $vehicle_record['veh_submodel_id'],
                                        $vehicle_record['veh_year_id']
                                    );

                                    if (null != $foundVehCollection) {
                                        $vehicle_record['veh_collection_id'] = $foundVehCollection['veh_collection_id'];
                                    }
                                }

                                // insert changeset_details_vehicles record
                                $this->supplementService->createChangesetDetailsVehicle($vehicle_record);
                            }
                        }
                    }

                    // build summary
                    // app_data_changed, status_changed, country_changed, pop_changed, dims_changed, color_changed
                    $changeset_summary = [];

                    if (is_array($summary)) {
                        foreach ($summary as $changeType => $whatChanged) {
                            $changeset_summary[$changeType] = '';

                            $app_changed_count     = 0;
                            $status_changed_count  = 0;
                            $country_changed_count = 0;
                            $pop_changed_count     = 0;
                            $dims_changed_count    = 0;
                            $color_changed_count   = 0;
                            $class_changed_count   = 0;
                            $image_changed_count   = 0;

                            // find out how many things changed based on keys above
                            foreach ($whatChanged as $key) {
                                if ($key == 'app_data_changed') {
                                    $app_changed_count++;
                                }

                                if ($key == 'status_changed') {
                                    $status_changed_count++;
                                }

                                if ($key == 'country_changed') {
                                    $country_changed_count++;
                                }

                                if ($key == 'pop_changed') {
                                    $pop_changed_count++;
                                }

                                if ($key == 'dims_changed') {
                                    $dims_changed_count++;
                                }

                                if ($key == 'color_changed') {
                                    $color_changed_count++;
                                }
                                if ($key == 'class_changed') {
                                    $class_changed_count++;
                                }
                                if ($key == 'image_changed') {
                                    $image_changed_count++;
                                }
                            }

                            // now build summary based off of above calculations
                            $changeset_summary[$changeType]  = 'Changeset Type: <b>' . $changeType . '</b><br />';
                            $changeset_summary[$changeType] .= 'Application Data Changed: ' . $app_changed_count . '<br />';
                            $changeset_summary[$changeType] .= 'Status Changed: ' . $status_changed_count . '<br />';
                            $changeset_summary[$changeType] .= 'Country Changed: ' . $country_changed_count . '<br />';
                            $changeset_summary[$changeType] .= 'POP Changed: ' . $pop_changed_count . '<br />';
                            $changeset_summary[$changeType] .= 'Dimensions Changed: ' . $dims_changed_count . '<br />';
                            $changeset_summary[$changeType] .= 'Color Changed: ' . $color_changed_count . '<br />';
                            $changeset_summary[$changeType] .= 'Class Changed: ' . $class_changed_count . '<br />';
                            $changeset_summary[$changeType] .= 'Image Changed: ' . $image_changed_count;
                            $changeset_summary[$changeType] .= '<br /><br />';
                        }
                    }

                    $change_text = '';

                    if (empty($summary)) {
                        $change_text = 'There was no data provided to modify in this supplement file.';
                    } else {
                        // update summary!
                        foreach ($changeset_summary as $sum) {
                            $change_text .= $sum;
                        }

                        $this->supplementService->updateChangesetSummary($changeset_id, $change_text);
                    }

                    $filepath = explode('/', $filename);

                    // copy supplement file to public/assets/library/products/change_files/
                    $curDate = date('YmdHis');
                    shell_exec('mv ' . $filename . ' ' . realpath(__DIR__ . '/../../../../../public/assets/library/products/change_files') . '/' . $curDate.$filepath[count($filepath) - 1]);

                    // generate asset entry
                    $hashPath = '/products/change_files/'.$curDate.$filepath[count($filepath) - 1];
                    $hash = strtr(base64_encode($hashPath), '+/=', '-_.');
                    $hash = rtrim($hash, '.');
                    $hash = 'l1_'.$hash;

                    $asset = $this->assetService->saveFile('library/products/change_files', $curDate.$filepath[count($filepath) - 1], ['mime'     => 'text/csv',
                        'ext' => 'csv',
                                                                                                                              'size'     => filesize($filename),
                                                                                                                              'filetype' => 'changefile',
                                                                                                                              'width'    => null,
                                                                                                                              'height'   => null], $hash);

                    // update changeset asset_id
                    $this->supplementService->updateChangesetAsset($changeset_id, $asset->getAssetId());
                break;
            }

            $filepath = explode('/', $filename);

            // generate audit log entry
            $this->auditService->create([
                'createdBy' => 'system',
                'object'    => 'LundProducts',
                'action'    => 'Supplement File Ingestion',
                'summary'   => 'Successfully ingested supplement file \'' . $curDate.$filepath[count($filepath) - 1] . '\'',
                'result'    => 'success',
            ]);

            // generate task to approve new changeset
            $dueDate = new DateTime('now');
            $dueDate->add(new DateInterval('P10D'));

            $this->taskService->createCustomTask([
                'classification' => 'Approval',
                'priority' => 'high',
                'title' => 'A new Changeset is awaiting approval',
                'message' => 'There is a new Changeset added to the system and needs approval.',
                'start_date' => new DateTime('now'),
                'due_date' => $dueDate,
            ]);

            $fileLog = $this->fileLogService->create(['type' => 'supplement',
                'brand' => null,
                'changesets' => $changeset,
                'asset' => $asset]);

            // create message for all administrator users
            $this->supplementService->createMessageForRole('administrator', 'Changeset Found', 'The changeset \'' . $curDate.$filepath[count($filepath) - 1] . '\' was found and needs approval.');

            $mfPath = implode('/', array_pop(array_pop($filepath))).'/master';

            $files = new RecursiveIteratorIterator(
                new RecursiveDirectoryIterator($mfPath)
            );

            foreach ($files as $file) {
                $mf = $file->getRealPath();
            }

            $filepath = explode('/', $mf);

            shell_exec('mv ' . $mf . ' ' . realpath(__DIR__ . '/../../../../../public/assets/library/products/master_files') . '/' . $curDate.$filepath[count($filepath) - 1]);

            $hashPath = '/products/master_files/'.$curDate.$filepath[count($filepath) - 1];
            $hash = strtr(base64_encode($hashPath), '+/=', '-_.');
            $hash = rtrim($hash, '.');
            $hash = 'l1_'.$hash;

            $asset = $this->assetService->saveFile('library/products/master_files', $curDate.$filepath[count($filepath) - 1], ['mime' => 'text/csv',
                'ext' => 'csv',
                'size' => filesize($mf),
                'filetype' => 'masterfile',
                'width' => null,
                'height' => null], $hash);

            $fileLog = $this->fileLogService->create(['type' => 'master',
                'brand' => null,
                'changesets' => $changeset,
                'asset' => $asset]);
        }
    }

    /**
     * Parse the master file, create product taxonomy.
     *
     * @return string
     */
    public function parsemasterAction()
    {
        $filename       = $this->getRequest()->getParam('filename');
        $from_iteration = (INT)$this->getRequest()->getParam('from_iteration');
        $to_iteration   = (INT)$this->getRequest()->getParam('to_iteration');

        $file = new SPLFileObject($filename);

        if (($file->isFile()) && ($file->isReadable())) {
            switch (strtolower($file->getExtension())) {
                // parse csv file
                case 'csv':
                    $file->setFlags(SplFileObject::READ_CSV);
                    $file->setCsvControl(',', '"', '\\');
                    $dataArray = array();

                    foreach ($file as $row) {
                        $dataArray[] = $row;
                    }

                    $filepath = explode('/', $filename);

                   // generate audit log entry
                    $this->auditService->create([
                        'createdBy' => 'system',
                        'object'    => 'LundProducts',
                        'action'    => 'Master File Ingestion',
                        'summary'   => 'Started master file ingestion on file \'' . $filepath[count($filepath) - 1] . '\'',
                        'result'    => 'success',
                    ]);

                    $highestRow   = (count($dataArray) - 1);
                    $iterator     = 1;
                    $iterator_cap = $highestRow;

                    if (($from_iteration > 0) && ($to_iteration > 0)) {
                        $iterator     = $from_iteration;
                        $iterator_cap = $to_iteration;
                    }

                    for ($i = $iterator; $i <= $iterator_cap; $i++) {
                        $this->masterService->getLogger()->info('===============[ON ITERATION ' . $i . ']===============');

                        if ($i == $iterator) {
                            continue;
                        }

                        $rowData = $dataArray[$i - 1];

/*

0: item,
1: brand,
2: class
3: class desc
4: PF
5: PF Desc
6: From Year
7: To Year
8: Make
9: Model
10: SubModel
11: SubDetail
12: BodyTyp
13: BedTyp
14: Jobber
15: MSRP
16: MAP
17: POP code
18: UPC
19: Weight
20: Height
21: Width
22: Length
23: Shipping Hrs
24: Color
25: No drill
26: extra desc
27: In App guide
28: In Jobber
29: I-Sheet
30: Date Chgd since last DwnLoad
31: country of orgn
32: Retail Flg
33: Oversize code
34: Status Code
35: Original brand
36: Flare Height
37: Flare Tire Coverage
38: DIM A
39: DIM B
40: DIM C
41: DIM D
42: DIM E
43: DIM F
44: DIM G
45: Vehicle Type
46: Model Type
47: MakeID
48: ModelID
49: SubModelID
50: NoOfDoorsID
51: PartTypeId
52: BodyTypID
53: BedTypeID
54: SeqNo
 */

                        if (count($rowData) == 1) {
                            continue;
                        }

                        $part_number                   = trim($rowData[0]);
                        $brand                         = trim($rowData[1]);
                        $product_lines_short_code      = trim($rowData[3]);
                        $product_categories_short_code = trim($rowData[5]);
                        $from_year                     = trim($rowData[6]);
                        $to_year                       = trim($rowData[7]);
                        $veh_make_name                 = trim($rowData[8]);
                        $veh_model_name                = trim($rowData[9]);
                        $veh_submodel_name             = trim($rowData[10]);
                        $veh_submodel_subdetail        = trim($rowData[11]);
                        $lookup_body_type              = trim($rowData[12]);
                        $lookup_bed_type               = trim($rowData[13]);
                        $veh_class_name                = trim($rowData[45]);
                        $jobber_price                  = trim($rowData[14]);
                        $msrp_price                    = trim($rowData[15]);
                        $sale_price                    = trim($rowData[16]);
                        $pop_code                      = trim($rowData[17]);
                        $upc_code                      = trim($rowData[18]);
                        $weight                        = trim($rowData[19]);
                        $height                        = trim($rowData[20]);
                        $width                         = trim($rowData[21]);
                        $length                        = trim($rowData[22]);
                        $color                         = trim($rowData[24]);
                        $isheet                        = trim($rowData[29]);
                        $country_of_origin             = trim($rowData[31]);
                        $orig_brand                    = trim($rowData[35]);
                        $dima                          = trim($rowData[38]);
                        $dimb                          = trim($rowData[39]);
                        $dimc                          = trim($rowData[40]);
                        $dimd                          = trim($rowData[41]);
                        $dime                          = trim($rowData[42]);
                        $dimf                          = trim($rowData[43]);
                        $dimg                          = trim($rowData[44]);
                        $lookup_make_id                = trim($rowData[47]);
                        $lookup_model_id               = trim($rowData[48]);
                        $lookup_submodel_id            = trim($rowData[49]);
                        $lookup_body_num_doors_id      = trim($rowData[50]);
                        $lookup_part_type_id           = trim($rowData[51]);
                        $lookup_body_type_id           = trim($rowData[52]);
                        $lookup_bed_type_id            = trim($rowData[53]);
                        $seq_no                        = trim($rowData[54]);

                        if ((trim($brand) == '') || (trim($part_number) == '')) {
                            continue;
                        }

                        // universal parts:
                        // - Make = UNIVERSAL
                        // - missing Make, Model, Submodel and SubDetail
                        $universal = ((strtoupper(trim($veh_make_name)) == 'UNIVERSAL') ? true :
                                     (((trim($veh_make_name) == '') && (trim($veh_model_name) == '') && (trim($veh_submodel_name) == '') && (trim($veh_submodel_subdetail) == '')) ? true : false));

                        $brand_id            = null;
                        $orig_brand_id       = null;
                        $product_category_id = null;
                        $product_line_id     = null;
                        $part_id             = null;

                        // first, insert/find brand, if orig_brand exists, create it, assign association in brands, cache
                        //  -- same with orig_brand, find/create/assign orig_brand to brands.parent_orig_id to brands
                        $foundBrand = $this->masterService->findBrand($brand);

                        if (null != $foundBrand) {
                            // found, cache it
                            $brand_id = $foundBrand['brand_id'];
                        } else {
                            // not found, we create it, cache brand_id
                            $foundBrand = $this->masterService->insertBrand(date('Y-m-d H:i:s'), 0, 0, $brand, $brand, $brand);
                            $brand_id   = $foundBrand['brand_id'];
                        }

                        // find brand, assign $orig_brand_id in create query if needs it
                        $foundOrigBrand = $this->masterService->findBrand($orig_brand);

                        if (null != $foundOrigBrand) {
                            // original brand exists, store in $orig_brand_id;
                            $orig_brand_id = $foundOrigBrand['brand_id'];
                        } else {
                            // create brand, assign it to $orig_brand_id
                            $foundOrigBrand = $this->masterService->insertBrand(date('Y-m-d H:i:s'), 0, 0, $orig_brand, $orig_brand, $orig_brand, $brand_id);
                            $orig_brand_id  = $foundOrigBrand['brand_id'];
                        }

                        // find out if product_category exists by short_code, create it if not, cache
                        $foundProductCategory = $this->masterService->findProductCategory($product_categories_short_code);

                        if (null != $foundProductCategory) {
                            // cache it
                            $product_category_id = $foundProductCategory['product_category_id'];
                        } else {
                            // not found, create it, cache it
                            $foundProductCategory = $this->masterService->insertProductCategory(
                                date('Y-m-d H:i:s'), 0, 1,
                                $product_categories_short_code,
                                $product_categories_short_code);

                            $product_category_id  = $foundProductCategory['product_category_id'];
                        }

                        //  -- find if brand_id & category_id exist in brand_product_category, if not, create brand_product_category relationship
                        // find brand_product_category relationship by $product_category_id and $brand_id
                        // if not exist, create it
                        $pcBrandFound = $this->masterService->findBrandProductCategory($product_category_id, $brand_id);

                        if (null == $pcBrandFound) {
                            // create it!
                            $pcBrandFound = $this->masterService->insertBrandProductCategory($product_category_id, $brand_id);
                        }

                        // find out if product_line exists by product_lines.short_code && product_lines.product_category_id
                        // -- if not exist, create it with brand_id and product_category_id
                        $foundProductLine = $this->masterService->findProductLine($product_lines_short_code, $brand_id);

                        if (null != $foundProductLine) {
                            $product_line_id = $foundProductLine['product_line_id'];
                        } else {
                            // create it, cache it
                            $foundProductLine = $this->masterService->insertProductLine(
                                date('Y-m-d H:i:s'), 0, 1,
                                $product_lines_short_code,
                                $product_lines_short_code,
                                $product_category_id,
                                $brand_id,
                                $orig_brand_id);
                            $product_line_id = $foundProductLine['product_line_id'];
                        }

                        // find if part exists by $part_number and $product_line_id
                        // -- find out if product exists by product_line_id from above
                        // -- if not, create it
                        // TODO: ** parent_part_id
                        $foundPart = $this->masterService->findPart($part_number, $product_line_id);

                        if (null != $foundPart) {
                            $part_id = $foundPart['part_id'];
                        } else {
                            // create it, cache part_id
                            $foundPart = $this->masterService->insertPart(date('Y-m-d H:i:s'), 0, 0, $part_number, $jobber_price, $msrp_price, $sale_price,
                                                                          $color, $isheet, $pop_code, $upc_code, $weight, $height, $width, $length, $product_line_id, $country_of_origin,
                                                                          $dima, $dimb, $dimc, $dimd, $dime, $dimf, $dimg, $universal, $lookup_part_type_id);
                            $part_id = $foundPart['part_id'];
                        }

                        // loop through FROM YEAR - TO YEAR and generate:
                        // find out if vehicle exists by look ups into these tables:
                        // -- veh_collection.veh_make_id
                        // -- veh_collection.veh_model_id
                        // -- veh_collection.veh_submodel_id
                        // -- veh_collection.veh_year_id
                        // if make/model/submodel/year do  not exist in any form, create/cache
                        // after finished, create veh_collection entry, save primary key
                        // create new part_veh_collection row with part_id and veh_collection_id from above
                        if (($from_year == '9999') || ($to_year == '9999')) {
                            // invalid data...
                        } elseif (($from_year == '0') || ($to_year == '0')) {
                            // universal data?
                        } else {
                            // regular dates, account for .5's, round down
                            $from_year = round((FLOAT)$from_year, 0, PHP_ROUND_HALF_DOWN);
                            $to_year   = round((FLOAT)$to_year, 0, PHP_ROUND_HALF_DOWN);

                            for ($k = $from_year; $k <= $to_year; $k++) {
                                $this_year = $k;

                                // vehicle year
                                $foundVehYear = $this->masterService->findVehYear((STRING)$this_year);

                                if (null == $foundVehYear) {
                                    $foundVehYear = $this->masterService->insertVehYear((STRING)$this_year);
                                }

                                // vehicle make
                                $foundVehMake = $this->masterService->findVehMake($veh_make_name);

                                if (null == $foundVehMake) {
                                    $foundVehMake = $this->masterService->insertVehMake($veh_make_name, $veh_make_name);
                                }

                                $foundVehClass = $this->masterService->findVehClass($veh_class_name);

                                if (null == $foundVehClass) {
                                    $foundVehClass = $this->masterService->insertVehClass($veh_class_name);
                                }

                                // vehicle model
                                $foundVehModel = $this->masterService->findVehModel($veh_model_name);

                                if (null == $foundVehModel) {
                                    $foundVehModel = $this->masterService->insertVehModel(
                                        $veh_model_name,
                                        $veh_model_name,
                                        $foundVehMake['veh_make_id'], $foundVehClass['veh_class_id']);
                                }

                                if (trim($veh_submodel_name) != '') {
                                    // vehicle submodel
                                    $foundVehSubmodel = $this->masterService->findVehSubmodel($veh_submodel_name);

                                    if (null == $foundVehSubmodel) {
                                        $foundVehSubmodel = $this->masterService->insertVehSubmodel(
                                            $veh_submodel_name,
                                            $veh_submodel_name,
                                            $foundVehModel['veh_model_id']);
                                    }
                                }

                                $foundVehCollection = $this->masterService->findVehCollection(
                                    $foundVehYear['veh_year_id'],
                                    $foundVehMake['veh_make_id'],
                                    $foundVehModel['veh_model_id'],
                                    ((trim($veh_submodel_name) != '') ? $veh_submodel_name : null),
                                    ((trim($veh_submodel_name) != '') ? $foundVehSubmodel['veh_submodel_id'] : null));

                                if (null == $foundVehCollection) {
                                    // doesn't exist, create it
                                    $foundVehCollection = $this->masterService->insertVehCollection(
                                        $foundVehYear['veh_year_id'],
                                        $foundVehMake['veh_make_id'],
                                        $foundVehModel['veh_model_id'],
                                        ((trim($veh_submodel_name) != '') ? $veh_submodel_name : null ),
                                        ((trim($veh_submodel_name) != '') ? $foundVehSubmodel['veh_submodel_id'] : null),
                                        $lookup_make_id,
                                        $lookup_model_id,
                                        $lookup_submodel_id,
                                        $lookup_body_type_id,
                                        $lookup_body_type,
                                        $lookup_body_num_doors_id,
                                        $lookup_bed_type_id,
                                        $lookup_bed_type
                                    );
                                }

                                // check part_veh_collection assignment
                                $foundPartVehCollection = $this->masterService->findPartVehCollection(
                                    $foundPart['part_id'],
                                    $foundVehCollection['veh_collection_id']);

                                if (null == $foundPartVehCollection) {
                                    // create the association
                                    $insertPartVehCollection = $this->masterService->insertPartVehCollection(
                                       $foundPart['part_id'],
                                       $foundVehCollection['veh_collection_id'],
                                       $seq_no,
                                       null,
                                       $veh_submodel_subdetail);
                                }
                            }
                        }
                    }
                break;
            }

            $filepath = explode('/', $filename);

            // copy master file to public/assets/library/products/master_files/
            $curDate = date('YmdHis');
            shell_exec('mv ' . $filename . ' ' . realpath(__DIR__ . '/../../../../../public/assets/library/products/master_files') . '/' . $curDate.$filepath[count($filepath) - 1]);

            // generate asset entry
            $hashPath = '/products/master_files/'.$curDate.$filepath[count($filepath) - 1];
            $hash = strtr(base64_encode($hashPath), '+/=', '-_.');
            $hash = rtrim($hash, '.');
            $hash = 'l1_'.$hash;

            $asset = $this->assetService->saveFile('library/products/master_files', $curDate.$filepath[count($filepath) - 1], ['mime'     => 'text/csv',
                'ext' => 'csv',
                                                                                                             'size'     => filesize($filename),
                                                                                                             'filetype' => 'masterfile',
                                                                                                             'height'   => null,
                                                                                                             'width'    => null], $hash);

            // generate audit log entry
            $this->auditService->create([
                'createdBy' => 'system',
                'object'    => 'LundProducts',
                'action'    => 'Master File Ingestion',
                'summary'   => 'Finished master file ingestion on file \'' . $curDate.$filepath[count($filepath) - 1] . '\'',
                'result'    => 'success',
            ]);

            $fileLog = $this->fileLogService->create(['type' => 'master',
                'brand' => null,
                'changesets' => null,
                'asset' => $asset]);

            // create message for all administrator users
            $this->supplementService->createMessageForRole('administrator', 'Master File Found', 'A master file was found named \'' . $curDate.$filepath[count($filepath) - 1] . '\' and was ingested.');
        }
    }
}
