<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/*
 * LundProducts
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundProducts
 * @subpackage Service
 * @author     Mark Cizek <mark@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 * @since      File available since Release 1.0.0
 */

namespace LundProducts\Service;

use Zend\EventManager\Eventmanager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\Log\Logger;
use PDO;
use RocketDam\Service\AssetService;

class ParseMasterService implements EventManagerAwareInterface
{
    /**
     * @var AssetService $assetService
     */
    protected $assetService;

    /**
     * @var EventManagerInterface
     */
    protected $eventManager;

    /*
     * @var PDO
     */
    protected $connection = null;

    /*
     * @var Logger
     */
    protected $logger = null;

    /*
     * @var array
     */
    protected $cache = array(
        'brands_cache'             => array(),
        'product_categories_cache' => array(),
        'product_lines_cache'      => array(),
        'parts_cache'              => array(),
        'veh_year_cache'           => array(),
        'veh_make_cache'           => array(),
        'veh_model_cache'          => array(),
        'veh_class_cache'          => array(),
        'veh_submodel_cache'       => array(),
    );

    /*
     * @param AssetService $assetService
     * @param PDO          $connection
     * @param Logger       $logger
     */
    public function __construct(
        AssetService $assetService,
        PDO    $connection,
        Logger $logger
    )
    {
        $this->assetService = $assetService;
        $this->connection = $connection;
        $this->logger     = $logger;
    }

    /*
     * Find brand by name.
     *
     * @param  string $brand
     * @return array
     */
    public function findBrand($brand = null)
    {
        if ($this->existsInCache($brand, 'brands_cache')) {
            return $this->getFromCache($brand, 'brands_cache');
        }

        $foundBrand = $this->prepare('SELECT * FROM brands WHERE name = ' . $this->quote($brand) . ' LIMIT 1');
        $foundBrand->execute();

        $return = $foundBrand->fetch(PDO::FETCH_ASSOC);
        $this->addToCache($brand, 'brands_cache', $return);

        return $return;
    }

    /*
     * Insert brand.
     *
     * @param string $created_at
     * @param int    $deleted
     * @param int    $disabled
     * @param string $short_code
     * @param string $label
     * @param string $name
     * @param int    $parent_brand_id
     *
     * @return array
     */
    public function insertBrand($created_at = null, $deleted = 0, $disabled = 0, $short_code = null, $label = null, $name = null, $parent_brand_id = null)
    {
        if (null == $created_at) {
            $created_at = date('Y-m-d H:i:s');
        }

        if (null == $deleted) {
            $deleted = 0;
        }

        if (null == $disabled) {
            $disabled = 0;
        }

        $name = preg_replace('/\//', '-');

        $return = array(
            'brand_id'        => null,
            'created_at'      => $created_at,
            'deleted'         => $deleted,
            'disabled'        => $disabled,
            'short_code'      => $short_code,
            'label'           => $label,
            'name'            => $name,
            'parent_brand_id' => $parent_brand_id
        );

        $brand = $this->prepare('INSERT INTO brands (created_at, deleted, disabled, short_code, label, name, parent_brand_id)
                                 VALUES (:created_at, :deleted, :disabled, :short_code, :label, :name, :parent_brand_id)');

        $brand->bindParam(':created_at', $return['created_at']);
        $brand->bindParam(':deleted', $return['deleted']);
        $brand->bindParam(':disabled', $return['disabled']);
        $brand->bindParam(':short_code', $return['short_code']);
        $brand->bindParam(':label', $return['label']);
        $brand->bindParam(':name', $return['name']);
        $brand->bindParam(':parent_brand_id', $return['parent_brand_id']);
        $brand->execute();

        $return['brand_id'] = $this->lastInsertId();

        return $return;
    }

    /*
     * Find product category by short code.
     *
     * @param string $product_category
     *
     * @return array
     */
    public function findProductCategory($product_category = null)
    {
        if ($this->existsInCache($product_category, 'product_categories_cache')) {
            return $this->getFromCache($product_category, 'product_categories_cache');
        }

        $foundProductCategory = $this->prepare('SELECT * FROM product_categories
                                                WHERE short_code = ' . $this->quote($product_category) . ' LIMIT 1');

        $foundProductCategory->execute();

        $return = $foundProductCategory->fetch(PDO::FETCH_ASSOC);

        $this->addToCache($product_category, 'product_categories_cache', $return);

        return $return;
    }

    /*
     * Insert product category.
     *
     * @param string $created_at
     * @param int    $deleted
     * @param int    $disabled
     * @param string $short_code
     * @param string $name
     *
     * @return array
     */
    public function insertProductCategory($created_at = null, $deleted = null, $disabled = null, $bpcs_code = null, $short_code = null, $name = null)
    {
        if (null == $created_at) {
            $created_at = date('Y-m-d H:i:s');
        }

        if (null == $deleted) {
            $deleted = 0;
        }

        if ($disabled == null) {
            $disabled = 0;
        }

        $pretty_name = preg_replace('/\//', '-', $name);

        $return = array('product_category_id' => null,
                        'created_at'          => $created_at,
                        'deleted'             => $deleted,
                        'disabled'            => $disabled,
                        'short_code'          => $short_code,
                        'bpcs_code'           => $bpcs_code,
                        'name'                => $pretty_name,
                        'display_name'        => $name);

        $pcInsert = $this->prepare('INSERT INTO product_categories (created_at, deleted, disabled, bpcs_code, short_code, name, display_name)
                                    VALUES (:created_at, :deleted, :disabled, :bpcs_code, :short_code, :name, :display_name)');
        $pcInsert->bindParam(':created_at', $return['created_at']);
        $pcInsert->bindParam(':deleted', $return['deleted']);
        $pcInsert->bindParam(':disabled', $return['disabled']);
        $pcInsert->bindParam(':short_code', $return['short_code']);
        $pcInsert->bindParam(':bpcs_code', $return['bpcs_code']);
        $pcInsert->bindParam(':name', $return['name']);
        $pcInsert->bindParam(':display_name', $return['display_name']);
        $pcInsert->execute();

        $return['product_category_id'] = $this->lastInsertId();

        return $return;
    }

    /*
     * Find brand_product_category relationship.
     *
     * @param int $product_category_id
     * @param int $brand_id
     *
     * @return array
     */
    public function findBrandProductCategory($product_category_id = null, $brand_id = null)
    {
        $pcBrandFound = $this->prepare('SELECT * FROM brand_product_category
                                        WHERE product_category_id = ' . $product_category_id . '
                                        AND brand_id = ' . $brand_id . ' LIMIT 1');
        $pcBrandFound->execute();

        return $pcBrandFound->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * Update part type
     *
     * @param int $part_id
     * @param int $part_type_id
     *
     * @return array
     */
    public function updatePartType($part_id = null, $part_type_id = null)
    {
	if ($part_type_id > 0) {
            $part = $this->prepare('UPDATE parts SET part_type_id = ' . $part_type_id . ' WHERE part_id = ' . $part_id . '');
            return $part->execute();
	} else {
	    return false;
        }
    }

    /*
     * Insert brand_product_category relationship.
     *
     * @param int $product_category_id
     * @param int $brand_id
     *
     * @return array
     */
    public function insertBrandProductCategory($product_category_id = null, $brand_id = null)
    {
        $pcBrandFound = $this->prepare('INSERT INTO brand_product_category (product_category_id, brand_id, deleted, disabled)
                                        VALUES (' . $product_category_id . ', ' . $brand_id . '. 0, 0)');

        return $pcBrandFound->execute();
    }

    /*
     * Find product line.
     *
     * @param string $short_code
     * @param int    $brand_id
     *
     * @return array
     */
    public function findProductLine($short_code = null, $brand_id = null)
    {
        if ($this->existsInCache($short_code, 'product_lines_cache')) {
            return $this->getFromCache($short_code, 'product_lines_cache');
        }

        $foundProductLine = $this->prepare('SELECT * FROM product_lines
                                            WHERE short_code = ' . $this->quote($short_code) . '
                                            AND brand_id = ' . $brand_id . ' LIMIT 1');

        $foundProductLine->execute();
        $return = $foundProductLine->fetch(PDO::FETCH_ASSOC);

        $this->addToCache($short_code, 'product_lines_cache', $return);

        return $return;
    }

    /*
     * Insert product line.
     *
     * @param string $created_at
     * @param int    $deleted
     * @param int    $disabled
     * @param string $short_code
     * @param string $name
     * @param int    $product_category_id
     * @param int    $brand_id
     * @param int    $orig_brand_id
     *
     * @return array
     */
    public function insertProductLine($created_at = null, $deleted = null, $disabled = null,
                                      $bpcs_code = null, $short_code = null, $name = null, $product_category_id = null,
                                      $brand_id = null, $orig_brand_id = null)
    {
        if (null == $created_at) {
            $created_at = date('Y-m-d H:i:s');
        }

        if (null == $deleted) {
            $deleted = 0;
        }

        if (null == $disabled) {
            $disabled = 0;
        }

        $pretty_name = preg_replace('/\//', '-', $name);

        $return = array(
            'product_line_id'     => null,
            'created_at'          => $created_at,
            'deleted'             => $deleted,
            'disabled'            => $disabled,
            'short_code'          => $short_code,
            'bpcs_code'           => $bpcs_code,
            'name'                => $pretty_name,
            'display_name'        => $name,
            'product_category_id' => $product_category_id,
            'brand_id'            => $brand_id,
            'orig_brand_id'       => $orig_brand_id
        );

        $productLine = $this->prepare('INSERT INTO product_lines (created_at, deleted, disabled, bpcs_code, short_code, name, display_name, product_category_id, brand_id, orig_brand_id)
                                       VALUES (:created_at, :deleted, :disabled, :bpcs_code, :short_code, :name, :display_name, :product_category_id, :brand_id, :orig_brand_id)');

        $productLine->bindParam(':created_at', $return['created_at']);
        $productLine->bindParam(':deleted', $return['deleted']);
        $productLine->bindParam(':disabled', $return['disabled']);
        $productLine->bindParam(':short_code', $return['short_code']);
        $productLine->bindParam(':bpcs_code', $return['bpcs_code']);
        $productLine->bindParam(':name', $return['name']);
        $productLine->bindParam(':display_name', $return['display_name']);
        $productLine->bindParam(':product_category_id', $return['product_category_id']);
        $productLine->bindParam(':brand_id', $return['brand_id']);
        $productLine->bindParam(':orig_brand_id', $return['orig_brand_id']);
        $productLine->execute();

        $return['product_line_id'] = $this->lastInsertId();

        return $return;
    }

    /*
     * Find part.
     *
     * @param string $part_number
     * @param int    $product_line_id
     *
     * @return array
     */
    public function findPart($part_number = null, $product_line_id = null)
    {
        if ($this->existsInCache($part_number, 'parts_cache')) {
            return $this->getFromCache($part_number, 'parts_cache');
        }

        $foundPart = $this->prepare('SELECT * FROM parts
                                     WHERE part_number = ' . $this->quote($part_number) . '
                                     AND product_line_id = ' . $product_line_id . ' LIMIT 1');
        $foundPart->execute();
        $return = $foundPart->fetch(PDO::FETCH_ASSOC);

        $this->addToCache($part_number, 'parts_cache', $return);

        return $return;
    }

    /*
     * Insert part.
     *
     * @param string $created_at
     * @param int    $deleted
     * @param int    $disabled
     * @param string $part_number
     * @param string $jobber_price
     * @param string $msrp_price
     * @param string $sale_price
     * @param string $color
     * @param string $isheet
     * @param string $pop_code
     * @param string $upc_code
     * @param string $weight
     * @param string $height
     * @param string $width
     * @param string $length
     * @param int    $product_line_id
     * @param string $country_of_origin
     * @param int    $dima
     * @param int    $dimb
     * @param int    $dimc
     * @param int    $dimd
     * @param int    $dime
     * @param int    $dimf
     * @param int    $dimg
     * @param bool   $universal
     * @param int    $lookup_bedtype_id
     *
     * @return array
     */
    public function insertPart($created_at = null, $deleted = null, $disabled = null, $part_number = null, $jobber_price = null,
                               $msrp_price = null, $sale_price = null, $color = null, $isheet = null,  $pop_code = null, $upc_code = null, $weight = null,
                               $height = null, $width = null, $length = null, $product_line_id = null, $country_of_origin = null, $status_code = null, $dima = null, $dimb = null, $dimc = null,
                               $dimd = null, $dime = null, $dimf = null, $dimg = null, $universal = false, $lookup_parttype_id = null)
    {
        if (null == $created_at) {
            $created_at = date('Y-m-d H:i:s');
        }

        if (null == $deleted) {
            $deleted = 0;
        }

        if (null == $disabled) {
            $disabled = 0;
        }

        $return = array('part_id'           => null,
                        'created_at'        => $created_at,
                        'deleted'           => $deleted,
                        'disabled'          => $disabled,
                        'part_number'       => $part_number,
                        'jobber_price'      => $jobber_price,
                        'msrp_price'        => $msrp_price,
                        'sale_price'        => $sale_price,
                        'color'             => $color,
                        'isheet'            => $isheet,
                        'pop_code'          => $pop_code,
                        'upc_code'          => $upc_code,
                        'status'            => $status_code,
                        'weight'            => $weight,
                        'height'            => $height,
                        'width'             => $width,
                        'length'            => $length,
                        'product_line_id'   => $product_line_id,
                        'dima'              => $dima,
                        'dimb'              => $dimb,
                        'dimc'              => $dimc,
                        'dimd'              => $dimd,
                        'dime'              => $dime,
                        'dimf'              => $dimf,
                        'dimg'              => $dimg,
                        'universal'         => (($universal == true) ? 1 : 0),
                        'country_of_origin' => $country_of_origin,
                        'part_type_id'      => ((trim($lookup_parttype_id) == '') ? null : $lookup_parttype_id),
        );

        $part = $this->prepare('INSERT INTO parts (created_at, deleted, disabled, part_number, jobber_price, msrp_price, sale_price, color, isheet, pop_code,
                                                   upc_code, status, weight, height, width, length, dima, dimb, dimc, dimd, dime, dimf, dimg, universal, product_line_id, country_of_origin,
                                                   part_type_id)
                                VALUES (:created_at, :deleted, :disabled, :part_number, :jobber_price, :msrp_price, :sale_price, :color, :isheet, :pop_code,
                                        :upc_code, :status, :weight, :height, :width, :length, :dima, :dimb, :dimc, :dimd, :dime, :dimf, :dimg, :universal, :product_line_id, :country_of_origin,
                                        :part_type_id)');

        $part->bindParam(':created_at', $return['created_at']);
        $part->bindParam(':deleted', $return['deleted']);
        $part->bindParam(':disabled', $return['disabled']);
        $part->bindParam(':part_number', $return['part_number']);
        $part->bindParam(':jobber_price', $return['jobber_price']);
        $part->bindParam(':msrp_price', $return['msrp_price']);
        $part->bindParam(':sale_price', $return['sale_price']);
        $part->bindParam(':color', $return['color']);
        $part->bindParam(':isheet', $return['isheet']);
        $part->bindParam(':pop_code', $return['pop_code']);
        $part->bindParam(':upc_code', $return['upc_code']);
        $part->bindParam(':status', $return['status']);
        $part->bindParam(':weight', $return['weight']);
        $part->bindParam(':height', $return['height']);
        $part->bindParam(':width', $return['width']);
        $part->bindParam(':length', $return['length']);
        $part->bindParam(':product_line_id', $return['product_line_id']);
        $part->bindParam(':country_of_origin', $return['country_of_origin']);
        $part->bindParam(':dima', $return['dima']);
        $part->bindParam(':dimb', $return['dimb']);
        $part->bindParam(':dimc', $return['dimc']);
        $part->bindParam(':dimd', $return['dimd']);
        $part->bindParam(':dime', $return['dime']);
        $part->bindParam(':dimf', $return['dimf']);
        $part->bindParam(':dimg', $return['dimg']);
        $part->bindParam(':universal', $return['universal']);
        $part->bindParam(':part_type_id', $return['part_type_id']);
        $part->execute();

        $return['part_id'] = $this->lastInsertId();

        return $return;
    }

    /*
     * Find veh_year.
     *
     * @param string $year
     *
     * @return array
     */
    public function findVehYear($year = null)
    {
        if ($this->existsInCache($year, 'veh_year_cache')) {
            return $this->getFromCache($year, 'veh_year_cache');
        }

        $foundVehYear = $this->prepare('SELECT * FROM veh_year
                                        WHERE name = ' . $this->quote((STRING)$year) . ' LIMIT 1');
        $foundVehYear->execute();
        $return = $foundVehYear->fetch(PDO::FETCH_ASSOC);

        $this->addToCache($year, 'veh_year_cache', $return);

        return $return;
    }

    /*
     * Insert veh_year.
     *
     * @param string $year
     *
     * @return array
     */
    public function insertVehYear($year = null)
    {
        $vehYearInsert = $this->prepare('INSERT INTO veh_year (name) VALUES (:name)');
        $vehYearInsert->bindParam(':name', $year);
        $vehYearInsert->execute();

        return array('veh_year_id' => $this->lastInsertId(),
                     'name'        => $year);
    }

    /*
     * Find veh_make.
     *
     * @param string $name
     *
     * @return array
     */
    public function findVehMake($name = null)
    {
        if ($this->existsInCache($name, 'veh_make_cache')) {
            return $this->getFromCache($name, 'veh_make_cache');
        }

        $foundVehMake = $this->prepare('SELECT * FROM veh_make
                                        WHERE name = ' . $this->quote($name) . ' LIMIT 1');
        $foundVehMake->execute();
        $return = $foundVehMake->fetch(PDO::FETCH_ASSOC);

        $this->addToCache($name, 'veh_make_cache', $return);

        return $return;
    }

    /*
     * Insert veh_make.
     *
     * @param string $name
     * @param string $short_code
     *
     * @return array
     */
    public function insertVehMake($name = null, $short_code = null)
    {
        $vehMakeInsert = $this->prepare('INSERT INTO veh_make (name, short_code) VALUES (:name, :short_code)');
        $vehMakeInsert->bindParam(':name', $name);
        $vehMakeInsert->bindParam(':short_code', $short_code);
        $vehMakeInsert->execute();

        return array('veh_make_id' => $this->lastInsertId(),
                     'name'        => $name,
                     'short_code'  => $short_code);
    }

    /*
     * Find veh_class.
     *
     * @param string $class
     *
     * @return array
     */
    public function findVehClass($class = null)
    {
        if ($this->existsInCache($class, 'veh_class_cache')) {
            return $this->getFromCache($class, 'veh_class_cache');
        }

        $foundVehClass = $this->prepare('SELECT * FROM veh_class
                                         WHERE short_code = ' . $this->quote($class) . ' LIMIT 1');
        $foundVehClass->execute();
        $return = $foundVehClass->fetch(PDO::FETCH_ASSOC);

        $this->addToCache($class, 'veh_class_cache', $return);

        return $return;
    }

    /*
     * Insert veh_class.
     *
     * @param string $name
     *
     * @return array
     */
    public function insertVehClass($name = null)
    {
        $vehClassInsert = $this->prepare('INSERT INTO veh_class (short_code) VALUES (:short_code)');
        $vehClassInsert->bindParam(':short_code', $name);
        $vehClassInsert->execute();

        return array('veh_class_id' => $this->lastInsertId(),
                     'name'         => $name);
    }

    /*
     * Find veh_model.
     *
     * @param string $name
     * @param string $makeId
     *
     * @return array
     */
    public function findVehModel($name = null, $makeId = null)
    {
        if ($this->existsInCache($name, 'veh_model_cache')) {
            return $this->getFromCache($name, 'veh_model_cache');
        }

        $foundVehModel = $this->prepare('SELECT * FROM veh_model
            WHERE name = ' . $this->quote($name) . ' 
            AND veh_make_id = ' . $this->quote($makeId) . '
            LIMIT 1');

        $foundVehModel->execute();
        $return = $foundVehModel->fetch(PDO::FETCH_ASSOC);

        $this->addToCache($name, 'veh_model_cache', $return);

        return $return;
    }

    /*
     * Insert veh_model.
     *
     * @param string $name
     * @param string $short_code
     * @param int    $veh_make_id
     * @param int    $veh_class_id
     *
     * @return array
     */
    public function insertVehModel($name = null, $short_code = null, $veh_make_id = null, $veh_class_id = null)
    {
        $vehModelInsert = $this->prepare('INSERT INTO veh_model (name, short_code, veh_make_id, veh_class_id)
                                          VALUES (:name, :short_code, :veh_make_id, :veh_class_id)');
        $vehModelInsert->bindParam(':name', $name);
        $vehModelInsert->bindParam(':short_code', $short_code);
        $vehModelInsert->bindParam(':veh_make_id', $veh_make_id);
        $vehModelInsert->bindParam(':veh_class_id', $veh_class_id);
        $vehModelInsert->execute();

        return array('veh_model_id' => $this->lastInsertId(),
                     'name'         => $name,
                     'short_code'   => $short_code,
                     'veh_make_id'  => $veh_make_id,
                     'veh_class_id' => $veh_class_id);
    }

    /*
     * Find veh_submodel.
     *
     * @param string $name
     * @param string $modelId
     *
     * @return array
     */
    public function findVehSubmodel($name = null, $modelId = null)
    {
        if ($this->existsInCache($name, 'veh_submodel_cache')) {
            return $this->getFromCache($name, 'veh_submodel_cache');
        }

        $foundVehSubmodel = $this->prepare('SELECT * FROM veh_submodel
            WHERE name = ' . $this->quote($name) . ' 
            AND veh_model_id = ' . $this->quote($modelId) . '
            LIMIT 1');

        $foundVehSubmodel->execute();
        $return = $foundVehSubmodel->fetch(PDO::FETCH_ASSOC);

        $this->addToCache($name, 'veh_submodel_cache', $return);

        return $return;
    }

    /*
     * Insert veh_submodel.
     *
     * @param string $name
     * @param string $short_code
     * @param int    $veh_model_id
     *
     * @return array
     */
    public function insertVehSubmodel($name = null, $short_code = null, $veh_model_id = null)
    {
        $vehSubmodelInsert = $this->prepare('INSERT INTO veh_submodel (name, short_code, veh_model_id)
                                             VALUES (:name, :short_code, :veh_model_id)');
        $vehSubmodelInsert->bindParam(':name', $name);
        $vehSubmodelInsert->bindParam(':short_code', $short_code);
        $vehSubmodelInsert->bindParam(':veh_model_id', $veh_model_id);
        $vehSubmodelInsert->execute();

        return array('veh_submodel_id' => $this->lastInsertId(),
                     'name'            => $name,
                     'short_code'      => $short_code,
                     'veh_model_id'    => $veh_model_id);
    }

    /*
     * Find veh_collection.
     *
     * @param int    $veh_year_id
     * @param int    $veh_make_id
     * @param int    $veh_model_id
     * @param string $submodel_name
     * @param int    $submodel_id
     * @param string $body_type
     *
     * @return array
     */
    public function findVehCollection($veh_year_id = null, $veh_make_id = null, $veh_model_id = null, $submodel_name = null, $submodel_id = null, $body_type = null)
    {
        $foundVehCollection = $this->prepare('SELECT * FROM veh_collection
                                              WHERE veh_year_id = ' . $veh_year_id . '
                                              AND veh_make_id = ' . $veh_make_id . '
                                              AND veh_model_id = ' . $veh_model_id . '
                                              ' . ((null != $submodel_name) ? 'AND veh_submodel_id = ' . $submodel_id : '') . '
                                              ' . ((null != $body_type) ? ' AND body_type = "' . $body_type . '"' : '') . '
                                              LIMIT 1');
        $foundVehCollection->execute();

        return $foundVehCollection->fetch(PDO::FETCH_ASSOC);
    }

    /*
     * Insert veh_collection.
     *
     * @param int    $veh_year_id
     * @param int    $veh_make_id
     * @param int    $veh_model_id
     * @param string $submodel_name
     * @param int    $veh_submodel_id
     * @param int    $aaia_make_id
     * @param int    $aaia_model_id
     * @param int    $aaia_submodel_id
     * @param int    $aaia_body_type_id
     * @param string $aaia_body_type
     * @param int    $aaia_body_num_doors_id
     * @param int    $aaia_bed_type_id
     * @param string $aaia_bed_type
     *
     * @return array
     */
    public function insertVehCollection($veh_year_id = null, $veh_make_id = null, $veh_model_id = null, $submodel_name = null, $veh_submodel_id = null, $aaia_make_id = null, $aaia_model_id = null, $aaia_submodel_id = null, $aaia_body_type_id = null, $aaia_body_type = null, $aaia_body_num_doors_id = null, $aaia_bed_type_id = null, $aaia_bed_type = null)
    {
        if ($aaia_make_id == '') { $aaia_make_id = null; }
        if ($aaia_model_id == '') { $aaia_model_id = null; }
        if ($aaia_submodel_id == '') { $aaia_submodel_id = null; }
        if ($aaia_body_type_id == '') { $aaia_body_type_id = null; }
        if ($aaia_body_num_doors_id == '') { $aaia_body_num_doors_id = null; }
        if ($aaia_bed_type_id == '') { $aaia_bed_type_id = null; }

        $return = array(
            'veh_collection_id' => null,
            'veh_year_id'       => $veh_year_id,
            'veh_make_id'       => $veh_make_id,
            'veh_model_id'      => $veh_model_id,
            'veh_submodel_id'   => $veh_submodel_id,
            'make_id'           => $aaia_make_id,
            'model_id'          => $aaia_model_id,
            'submodel_id'       => $aaia_submodel_id,
            'body_type_id'      => $aaia_body_type_id,
            'body_type'         => $aaia_body_type,
            'body_num_doors_id' => $aaia_body_num_doors_id,
            'bed_type_id'       => $aaia_bed_type_id,
            'bed_type'          => $aaia_bed_type
        );

        $vehCollectionInsert = $this->prepare('INSERT INTO veh_collection (veh_make_id, veh_model_id, veh_year_id, veh_submodel_id, make_id, model_id, submodel_id, body_type_id, body_type, body_num_doors_id, bed_type_id, bed_type)
                                               VALUES (:veh_make_id, :veh_model_id, :veh_year_id, :veh_submodel_id, :make_id, :model_id, :submodel_id, :body_type_id, :body_type, :body_num_doors_id, :bed_type_id, :bed_type)');
        $vehCollectionInsert->bindParam(':veh_make_id', $return['veh_make_id']);
        $vehCollectionInsert->bindParam(':veh_model_id', $return['veh_model_id']);
        $vehCollectionInsert->bindParam(':veh_year_id', $return['veh_year_id']);
        $vehCollectionInsert->bindParam(':veh_submodel_id', $return['veh_submodel_id']);
        $vehCollectionInsert->bindParam(':make_id', $return['make_id']);
        $vehCollectionInsert->bindParam(':model_id', $return['model_id']);
        $vehCollectionInsert->bindParam(':submodel_id', $return['submodel_id']);
        $vehCollectionInsert->bindParam(':body_type_id', $return['body_type_id']);
        $vehCollectionInsert->bindParam(':body_type', $return['body_type']);
        $vehCollectionInsert->bindParam(':body_num_doors_id', $return['body_num_doors_id']);
        $vehCollectionInsert->bindParam(':bed_type_id', $return['bed_type_id']);
        $vehCollectionInsert->bindParam(':bed_type', $return['bed_type']);
        $vehCollectionInsert->execute();

        $return['veh_collection_id'] = $this->lastInsertId();

        return $return;
    }

    /*
     * Find part_veh_collection.
     *
     * @param int $part_id
     * @param int $veh_collection_id
     *
     * @return array
     */
    public function findPartVehCollection($part_id = null, $veh_collection_id = null)
    {
        $foundPartVehCollection = $this->prepare('SELECT * FROM part_veh_collection
                                                  WHERE part_id = ' . $part_id . '
                                                  AND veh_collection_id = ' . $veh_collection_id . '
                                                  LIMIT 1');
        $foundPartVehCollection->execute();

        return $foundPartVehCollection->fetch(PDO::FETCH_ASSOC);
    }

    /*
     * Insert part_veh_collection.
     *
     * @param int    $part_id
     * @param int    $veh_collection_id
     * @param int    $seq_no
     * @param int    $changeset_detail_id
     * @param string $subdetail
     *
     * @return array
     */

    public function insertPartVehCollection($part_id = null, $veh_collection_id = null, $seq_no = null, $changeset_detail_id = null, $subdetail = null)
    {
        if ($seq_no == '') { $seq_no = null; }
        $insertPartVehCollection = $this->prepare('INSERT INTO part_veh_collection (part_id, veh_collection_id, sequence' . ((null == $changeset_detail_id) ? '' : ', changeset_detail_id') . ', subdetail)
                                                   VALUES (:part_id, :veh_collection_id, :seq_no' . ((null == $changeset_detail_id) ? '' : ', :changeset_detail_id') . ', :subdetail)');
        $insertPartVehCollection->bindParam(':part_id', $part_id);
        $insertPartVehCollection->bindParam(':veh_collection_id', $veh_collection_id);
        $insertPartVehCollection->bindParam(':seq_no', $seq_no);

        if (null != $changeset_detail_id) {
            $insertPartVehCollection->bindParam(':changeset_detail_id', $changeset_detail_id);
        }

        $insertPartVehCollection->bindParam(':subdetail', $subdetail);

        $insertPartVehCollection->execute();

        return array(
            'part_veh_collection_id' => $this->lastInsertId(),
            'part_id'                => $part_id,
            'veh_collection_id'      => $veh_collection_id,
            'seq_no'                 => $seq_no,
            'subdetail'              => $subdetail,
        );
    }

    /*
     * Proxy method to PDO->beginTransaction()
     */
    public function beginTransaction()
    {
        $this->connection->beginTransaction();
    }

    /*
     * Proxy method to PDO->rollBack()
     */
    public function rollBack()
    {
        $this->connection->rollBack();
    }

    /*
     * Proxy method to PDO->commit()
     */
    public function commit()
    {
        $this->connection->commit();
    }

    /*
     * @return \Zend\Log\Logger
     */
    public function getLogger()
    {
        return $this->logger;
    }

    /*
     * @param  string $sql
     * @return PDO
     */
    private function prepare($sql = null)
    {
        return $this->connection->prepare($sql);
    }

    /*
     * @param  string $quote
     * @return PDO
     */
    private function quote($quote = null)
    {
        return $this->connection->quote($quote);
    }

    /*
     * @return int
     */
    private function lastInsertId()
    {
        return $this->connection->lastInsertId();
    }

    /*
     * @return PDO
     */
    private function getPDOConnection()
    {
        return $this->connection;
    }

    /*
     * @param string $key
     * @param string $cache_id
     *
     * @return boolean
     */
    private function existsInCache($key = null, $cache_id = null)
    {
        if (array_key_exists($cache_id, $this->cache)) {
            return false;
        }

        return array_key_exists($key, $this->cache[$cache_id]);
    }

    /*
     * @param string $key
     * @param string $cache_id
     *
     * @return array
     */
    private function getFromCache($key = null, $cache_id = null)
    {
        return $this->cache[$cache_id][$key];
    }

    /*
     * @param string $key
     * @param string $cache_id
     * @param array  $data
     *
     * @return void
     */
    private function addToCache($key = null, $cache_id = null, $data = array())
    {
        $this->cache[$cache_id][$key] = $data;
    }

    /**
     * setEventManager(): defined by EventManagerAwareInterface.
     *
     * @see    EventManagerAwareInterface::setEventManager()
     * @param  EventManagerInterface $eventManager
     * @return void
     */
    public function setEventManager(EventManagerInterface $eventManager)
    {
        $eventManager->setIdentifiers(array(__CLASS__, get_class($this)));

        $this->eventManager = $eventManager;
    }

    /**
     * getEventManager(): defined by EventManagerAwareInterface.
     *
     * @see    EventManagerAwareInterface::getEventManager()
     * @return EventManagerInterface
     */
    public function getEventManager()
    {
        if (null === $this->eventManager) {
            $this->setEventManager(new EventManager());
        }

        return $this->eventManager;
    }
}
