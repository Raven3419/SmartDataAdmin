<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundProducts
 * @subpackage Controller
 * @author     Jason Guthery <jason@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 * @since      File available since Release 1.0.0
 */

namespace LundProducts\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Zend\Mvc\Controller\AbstractActionController;
use LundProducts\Service\PartService;
use RocketAdmin\Service\AuditService;
use Aws\S3\S3Client;
use Zend\Filter\Compress;
use Imagine\Gd\Imagine;
use RocketDam\Service\AssetService;
use LundProducts\Service\FileLogService;
use LundProducts\Repository\BrandsRepository;
use LundProducts\Service\ChangesetsService;

/**
 * Generate zip file containing parts and all part_assets
 *
 * @category   Zend
 * @package    LundProducts
 * @subpackage Controller
 * @author     Mark Cizek <mark@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 */
class GenerateController extends AbstractActionController
{
    /**
     * @var PartService
     */
    protected $partService;

    /**
     * @var AuditService
     */
    protected $auditService;

    /**
     * @var S3Client
     */
    protected $s3Client;

    /**
     * @var AssetService
     */
    protected $assetService;

    /**
     * @var FileLogService
     */
    protected $fileLogService;

    /**
     * @var ChangesetsService
     */
    protected $changesetsService;

    /**
     * @var BrandsRepository
     */
    protected $brandsRepository;

    protected $lundonly = null;

    /**
     * @param PartService       $partService
     * @param AuditService      $auditservice
     * @param S3Client          $s3Client
     * @param AssetService      $assetService
     * @param FileLogService    $fileLogService
     * @param ChangesetsService $changesetsService
     * @param BrandsRepository  $brandsRepository
     */
    public function __construct(
        PartService  $partService,
        AuditService $auditService,
        S3Client     $s3Client,
        AssetService $assetService,
        FileLogService $fileLogService,
        ChangesetsService $changesetsService,
        BrandsRepository $brandsRepository
    )
    {
        $this->partService  = $partService;
        $this->auditService = $auditService;
        $this->s3Client     = $s3Client;
        $this->assetService = $assetService;
        $this->fileLogService = $fileLogService;
        $this->changesetsService = $changesetsService;
        $this->brandsRepository = $brandsRepository;
    }

    /**
     * Generate images for Amazon
     */
    public function generateamazonAction()
    {
        $brand_name     = $this->getRequest()->getParam('brand', null);
        $generate     = $this->getRequest()->getParam('generate', null);
        $changeset_id = $this->getRequest()->getParam('changeset_id', null);

        if (null != $brand_name) {
            $brand = $this->brandsRepository->findOneBy(array('name' => $brand_name));
        } else {
            $brand = null;
        }

        //$result = $this->s3Client->listBuckets();

        // SAMPLE upload to dropbox
        /*$result2 = $this->s3Client->putObject(array(
            'Bucket' => 'vendorfeeds-us/Lund_Industries/dropbox',
            'Key' => 'data.txt',
            'Body' => 'Hello!'
        ));*/

        // generate audit log entry BEFORE
        $this->auditService->create([
            'createdBy' => 'system',
            'object'    => 'LundProducts',
            'action'    => 'Amazon Images Generation',
            'summary'   => 'Started Amazon images file generation.',
            'result'    => 'success',
        ]);

        $brand_pretty = preg_replace('/ /', '_', $brand_name);

        // get all active parts
        $parts = $this->partService->getPartsForImages($brand, $generate, $changeset_id);

        // create temporary directory to house all the images generated
        if (!is_dir('/tmp/amazon-images-' . $brand_pretty . '/')) {
            mkdir('/tmp/amazon-images-' . $brand_pretty . '/');
        }

        foreach ($parts as $part) {
            foreach ($part->getPartAsset() as $part_asset) {
                $asset = $part_asset->getAsset();

                $source = __DIR__ . '/../../../../../public/assets/' . $asset->getFilePath();
                $destination = '/tmp/amazon-images-' . $brand_pretty . '/' . $part_asset->getAmazonName();

                if (!is_file($destination)) {

                $imagine = new Imagine();
                $image = $imagine->open($source);

                if ($asset->getWidth() > $asset->getHeight()) {
                    if ($asset->getWidth() >= 1000) {
                        $image->resize($image->getSize()->widen(1000));
                    } else {
                        $image->resize($image->getSize()->widen(500));
                    }
                } else {
                    if ($asset->getHeight() >= 1000) {
                        $image->resize($image->getSize()->heighten(1000));
                    } else {
                        $image->resize($image->getSize()->heighten(500));
                    }
                }

                $image->save($destination);
                }
            }

            //$sourceIsheet = __DIR__ . '/../../../../../public/assets/library/products/isheets/' . $part->getIsheet() . '.pdf';
            //$destIsheet = '/tmp/amazon-images-' . $brand_pretty . '/' . $part->getIsheet() . '.pdf';

            //if (!is_file($destIsheet) && null != $part->getIsheet()) {
                //shell_exec('cp ' . $sourceIsheet . ' ' . $destIsheet);
            //}
        }

        $zipFile = 'amazon-image-pkg-' . $generate . ($brand->getName() ? '-' . $brand->getName() : '') . '-' . date('YmdHis') . '.zip';

        $filter = new Compress(array(
            'adapter' => 'Zip',
            'options' => array(
                'archive' => 'data/amazon/' . $zipFile
            ),
        ));

        $zip = $filter->filter('/tmp/amazon-images-' . $brand_pretty . '/');

        // generate audit log entry AFTER
        $this->auditService->create([
            'createdBy' => 'system',
            'object'    => 'LundProducts',
            'action'    => 'Amazon Images Generation',
            'summary'   => 'Finished Amazon images file generation.',
            'result'    => 'success',
        ]);

        // generate audit log entry AFTER
        $this->auditService->create([
            'createdBy' => 'system',
            'object'    => 'LundProducts',
            'action'    => 'Amazon S3 Integration',
            'summary'   => 'Started Amazon S3 image package transmission.',
            'result'    => 'success',
        ]);

        if (is_file('data/amazon/' . $zipFile)) {
            $zipFilePath = realpath(__DIR__ . '/../../../../../data/amazon/' . $zipFile);
            /*$result = $this->s3Client->putObject(array(
                'Bucket'     => 'vendorfeeds-us/Lund_Industries/dropbox',
                'Key'        => $zipFile,
                'SourceFile' => $zipFilePath
            ));*/
            /*$result = $this->s3Client->putObject(array(
                'Bucket' => 'vendorfeeds-us/Lund_Industries/dropbox',
                'Key' => 'data.txt',
                'Body' => 'Hello!'
            ));*/

            // Move zip file to dam system
            shell_exec('cp ' . $zipFilePath . ' ' . realpath(__DIR__ . '/../../../../../public/assets/library/products/parts/amazon_packages') . '/' . $zipFile);

            $hashPath = 'library/products/parts/amazon_packages/' . $zipFile;
            $hash = strtr(base64_encode($hashPath), '+/=', '-_.');
            $hash = rtrim($hash, '.');
            $hash = 'l1_'.$hash;
            $asset = $this->assetService->saveFile('library/products/parts/amazon_packages', $zipFile, ['mime'      => 'application/zip',
                                                                                                        'size'      => filesize($zipFilePath),
                                                                                                        'ext'       => 'zip',
                                                                                                        'filetype'  => 'assetpackage'], $hash);
        }

        // remove tmp directory
        foreach (scandir('/tmp/amazon-images-' . $brand_pretty . '/') as $file) {
            if ('.' === $file || '..' === $file) continue;
            unlink('/tmp/amazon-images-' . $brand_pretty . '/' . $file);
        }

        rmdir('/tmp/amazon-images-' . $brand_pretty . '/');

        // generate audit log entry AFTER
        $this->auditService->create([
            'createdBy' => 'system',
            'object'    => 'LundProducts',
            'action'    => 'Amazon S3 Integration',
            'summary'   => 'Finished Amazon S3 image package transmission',
            'result'    => 'success',
        ]);
    }

    /**
     * Generate images for Amazon
     */
    public function generatecustomerAction()
    {
        $brand_name     = $this->getRequest()->getParam('brand', null);
        $generate     = $this->getRequest()->getParam('generate', null);
        $changeset_id = $this->getRequest()->getParam('changeset_id', null);

        if (null != $brand_name) {
            if ($brand_name == 'LUNDONLY') {
                $brand = $this->brandsRepository->findOneBy(['name' => 'LUND']);
                $this->lundonly = true;
            } else {
                $brand = $this->brandsRepository->findOneBy(['name' => trim(strtoupper($brand_name))]);
            }
        } else {
            $brand = null;
        }

        $brand_pretty = preg_replace('/ /', '_', $brand_name);

        // generate audit log entry BEFORE
        $this->auditService->create([
            'createdBy' => 'system',
            'object'    => 'LundProducts',
            'action'    => 'Customer Images Generation',
            'summary'   => 'Started Customer images file generation for ' . $brand_pretty . '.',
            'result'    => 'success',
        ]);

        // get all active parts
        $parts = $this->partService->getPartsForImages($brand, $generate, $changeset_id, $this->lundonly);

        // create temporary directory to house all the images generated
        if (!is_dir('/tmp/customer-images-' . $brand_pretty . '/')) {
            mkdir('/tmp/customer-images-' . $brand_pretty . '/');
        }

        foreach ($parts as $part) {
            foreach ($part->getPartAsset() as $part_asset) {
                $asset = $part_asset->getAsset();

                $source = __DIR__ . '/../../../../../public/assets/' . $asset->getFilePath();
                $destination = '/tmp/customer-images-' . $brand_pretty . '/' . $asset->getFileName();

                if (!is_file($destination)) {

                $imagine = new Imagine();
                $image = $imagine->open($source);

                if ($asset->getWidth() > $asset->getHeight()) {
                    if ($asset->getWidth() >= 1000) {
                        $image->resize($image->getSize()->widen(1000));
                    } else {
                        $image->resize($image->getSize()->widen(500));
                    }
                } else {
                    if ($asset->getHeight() >= 1000) {
                        $image->resize($image->getSize()->heighten(1000));
                    } else {
                        $image->resize($image->getSize()->heighten(500));
                    }
                }

                $image->save($destination);
                }
            }

            $sourceIsheet = __DIR__ . '/../../../../../public/assets/library/products/isheets/' . $part->getIsheet() . '.pdf';
            $destIsheet = '/tmp/customer-images-' . $brand_pretty . '/' . $part->getIsheet() . '.pdf';

            if (!is_file($destIsheet) && null != $part->getIsheet()) {
                shell_exec('cp ' . $sourceIsheet . ' ' . $destIsheet);
            }
        }

        $zipFile = 'customer-image-pkg-' . $generate . ($brand->getName() ? '-' . $brand_pretty : '') . '-' . date('YmdHis') . '.zip';

        $filter = new Compress(array(
            'adapter' => 'Zip',
            'options' => array(
                'archive' => 'data/customer/' . $zipFile
            ),
        ));

        $zip = $filter->filter('/tmp/customer-images-' . $brand_pretty . '/');

        if (is_file('data/customer/' . $zipFile)) {
            $zipFilePath = realpath(__DIR__ . '/../../../../../data/customer/' . $zipFile);
            // Move zip file to dam system
            shell_exec('cp ' . $zipFilePath . ' ' . realpath(__DIR__ . '/../../../../../public/assets/library/products/parts/customer_packages') . '/' . $zipFile);

            $hashPath = 'library/products/parts/customer_packages/' . $zipFile;
            $hash = strtr(base64_encode($hashPath), '+/=', '-_.');
            $hash = rtrim($hash, '.');
            $hash = 'l1_'.$hash;
            $asset = $this->assetService->saveFile('library/products/parts/customer_packages', $zipFile, ['mime'      => 'application/zip',
                                                                                                          'size'      => filesize($zipFilePath),
                                                                                                          'ext'       => 'zip',
                                                                                                          'filetype'  => 'assetpackage'], $hash);

            if ($changeset_id > 0) {
                $changesets = $this->changesetsService->getChangeset($changeset_id);
            } else {
                $changesets = null;
            }

            $fileLog = $this->fileLogService->create(['brand' => $brand_name,
                                                      'type'  => 'assetpackage',
                                                      'changesets' => $changesets,
                                                      'asset' => $asset, ]);
        }

        // remove tmp directory
        foreach (scandir('/tmp/customer-images-' . $brand_pretty . '/') as $file) {
            if ('.' === $file || '..' === $file) continue;
            unlink('/tmp/customer-images-' . $brand_pretty . '/' . $file);
        }

        rmdir('/tmp/customer-images-' . $brand_pretty . '/');

        // generate audit log entry AFTER
        $this->auditService->create([
            'createdBy' => 'system',
            'object'    => 'LundProducts',
            'action'    => 'Customer Images Generation',
            'summary'   => 'Finished Customer images file generation for ' . $brand_pretty . '.',
            'result'    => 'success',
        ]);
    }
}
