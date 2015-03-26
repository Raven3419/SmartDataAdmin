<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * LundProducts
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundProducts\Entity
 * @subpackage Interface
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace LundProducts\Entity;

/**
 * Parts interface
 */
interface PartsInterface
{
    /**
     * Set createdAt
     *
     * @param  \DateTime $createdAt
     * @return Parts
     */
    public function setCreatedAt($createdAt);

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * Set createdBy
     *
     * @param  string $createdBy
     * @return Parts
     */
    public function setCreatedBy($createdBy);

    /**
     * Get createdBy
     *
     * @return string
     */
    public function getCreatedBy();

    /**
     * Set modifiedAt
     *
     * @param  \DateTime $modifiedAt
     * @return Parts
     */
    public function setModifiedAt($modifiedAt);

    /**
     * Get modifiedAt
     *
     * @return \DateTime
     */
    public function getModifiedAt();

    /**
     * Set modifiedBy
     *
     * @param  string $modifiedBy
     * @return Parts
     */
    public function setModifiedBy($modifiedBy);

    /**
     * Get modifiedBy
     *
     * @return string
     */
    public function getModifiedBy();

    /**
     * Set deleted
     *
     * @param  boolean $deleted
     * @return Parts
     */
    public function setDeleted($deleted);

    /**
     * Get deleted
     *
     * @return boolean
     */
    public function getDeleted();

    /**
     * Set disabled
     *
     * @param  boolean $disabled
     * @return Parts
     */
    public function setDisabled($disabled);

    /**
     * Get disabled
     *
     * @return boolean
     */
    public function getDisabled();

    /**
     * Set partNumber
     *
     * @param  string $partNumber
     * @return Parts
     */
    public function setPartNumber($partNumber);

    /**
     * Get partNumber
     *
     * @return string
     */
    public function getPartNumber();

    /**
     * Set partVariant
     *
     * @param  string $partVariant
     * @return Parts
     */
    public function setPartVariant($partVariant);

    /**
     * Get partVariant
     *
     * @return string
     */
    public function getPartVariant();

    /**
     * Set productClass
     *
     * @param  string $productClass
     * @return Parts
     */
    public function setProductClass($productClass);

    /**
     * Get productClass
     *
     * @return string
     */
    public function getProductClass();

    /**
     * Set detail
     *
     * @param  string $detail
     * @return Parts
     */
    public function setDetail($detail);

    /**
     * Get detail
     *
     * @return string
     */
    public function getDetail();

    /**
     * Set jobberPrice
     *
     * @param  string $jobberPrice
     * @return Parts
     */
    public function setJobberPrice($jobberPrice);

    /**
     * Get jobberPrice
     *
     * @return string
     */
    public function getJobberPrice();

    /**
     * Set msrpPrice
     *
     * @param  string $msrpPrice
     * @return Parts
     */
    public function setMsrpPrice($msrpPrice);

    /**
     * Get msrpPrice
     *
     * @return string
     */
    public function getMsrpPrice();

    /**
     * Set salePrice
     *
     * @param  string $salePrice
     * @return Parts
     */
    public function setSalePrice($salePrice);

    /**
     * Get salePrice
     *
     * @return string
     */
    public function getSalePrice();

    /**
     * Set shippingPrice
     *
     * @param  string $shippingPrice
     * @return Parts
     */
    public function setShippingPrice($shippingPrice);

    /**
     * Get shippingPrice
     *
     * @return string
     */
    public function getShippingPrice();

    /**
     * Set color
     *
     * @param  string $color
     * @return Parts
     */
    public function setColor($color);

    /**
     * Get color
     *
     * @return string
     */
    public function getColor();

    /**
     * Set popCode
     *
     * @param  string $popCode
     * @return Parts
     */
    public function setPopCode($popCode);

    /**
     * Get popCode
     *
     * @return string
     */
    public function getPopCode();

    /**
     * Set upcCode
     *
     * @param  string $upcCode
     * @return Parts
     */
    public function setUpcCode($upcCode);

    /**
     * Get upcCode
     *
     * @return string
     */
    public function getUpcCode();

    /**
     * Set steatus
     * @param  string $status
     * @return Parts
     */
    public function setStatus($status);

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus();

    /**
     * Set weight
     *
     * @param  string $weight
     * @return Parts
     */
    public function setWeight($weight);

    /**
     * Get weight
     *
     * @return string
     */
    public function getWeight();

    /**
     * Set height
     *
     * @param  string $height
     * @return Parts
     */
    public function setHeight($height);

    /**
     * Get height
     *
     * @return string
     */
    public function getHeight();

    /**
     * Set width
     *
     * @param  string $width
     * @return Parts
     */
    public function setWidth($width);

    /**
     * Get width
     *
     * @return string
     */
    public function getWidth();

    /**
     * Set length
     *
     * @param  string $length
     * @return Parts
     */
    public function setLength($length);

    /**
     * Get length
     *
     * @return string
     */
    public function getLength();

    /**
     * Set universal
     *
     * @param  boolean $universal
     * @return Parts
     */
    public function setUniversal($universal);

    /**
     * Get universal
     *
     * @return boolean
     */
    public function getUniversal();

    /**
     * Set countryOfOrigin
     *
     * @param  string $countryOfOrigin
     * @return Parts
     */
    public function setCountryOfOrigin($countryOfOrigin);

    /**
     * Get countryOfOrigin
     *
     * @return string
     */
    public function getCountryOfOrigin();

    /**
     * Set dima
     *
     * @param  string $dima
     * @return Parts
     */
    public function setDima($dima);

    /**
     * Get dima
     *
     * @return string
     */
    public function getDima();

    /**
     * Set dimb
     *
     * @param  string $dimb
     * @return Parts
     */
    public function setDimb($dimb);

    /**
     * Get dimb
     *
     * @return string
     */
    public function getDimb();

    /**
     * Set dimc
     *
     * @param  string $dimc
     * @return Parts
     */
    public function setDimc($dimc);

    /**
     * Get dimc
     *
     * @return string
     */
    public function getDimc();

    /**
     * Set dimd
     *
     * @param  string $dimd
     * @return Parts
     */
    public function setDimd($dimd);

    /**
     * Get dimd
     *
     * @return string
     */
    public function getDimd();

    /**
     * Set dime
     *
     * @param  string $dime
     * @return Parts
     */
    public function setDime($dime);

    /**
     * Get dime
     *
     * @return string
     */
    public function getDime();

    /**
     * Set dimf
     *
     * @param  string $dimf
     * @return Parts
     */
    public function setDimf($dimf);

    /**
     * Get dimf
     *
     * @return string
     */
    public function getDimf();

    /**
     * Set dimg
     *
     * @param  string $dimg
     * @return Parts
     */
    public function setDimg($dimg);

    /**
     * Get dimg
     *
     * @return string
     */
    public function getDimg();

    /**
     * Set partTypeId
     *
     * @param  integer $partTypeId
     * @return Parts
     */
    public function setPartTypeId($partTypeId);

    /**
     * Get partTypeId
     *
     * @return integer
     */
    public function getPartTypeId();

    /**
     * Get partId
     *
     * @return integer
     */
    public function getPartId();

    /**
     * Add vehCollections
     *
     * @param  \LundProducts\Entity\PartVehCollection $vehCollections
     * @return Parts
     */
    public function addVehCollection(\LundProducts\Entity\PartVehCollection $vehCollections);

    /**
     * Remove vehCollections
     *
     * @param \LundProducts\Entity\PartVehCollection $vehCollections
     */
    public function removeVehCollection(\LundProducts\Entity\PartVehCollection $vehCollections);

    /**
     * Get vehCollections
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVehCollections();

    /**
     * Add partAsset
     *
     * @param  \LundProducts\Entity\PartAsset $partAsset
     * @return Parts
     */
    public function addPartAsset(\LundProducts\Entity\PartAsset $partAsset);

    /**
     * Remove partAsset
     *
     * @param \LundProducts\Entity\PartAsset $partAsset
     */
    public function removePartAsset(\LundProducts\Entity\PartAsset $partAsset);

    /**
     * Get partAsset
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPartAsset();

    /**
     * Set productLine
     *
     * @param  \LundProducts\Entity\ProductLines $productLine
     * @return Parts
     */
    public function setProductLine(\LundProducts\Entity\ProductLines $productLine = null);

    /**
     * Get productLine
     *
     * @return \LundProducts\Entity\ProductLines
     */
    public function getProductLine();

    /**
     * Set parentPart
     *
     * @param  \LundProducts\Entity\Parts $parentPart
     * @return Parts
     */
    public function setParentPart(\LundProducts\Entity\Parts $parentPart = null);

    /**
     * Get parentPart
     *
     * @return \LundProducts\Entity\Parts
     */
    public function getParentPart();

    /**
     * @param  string $isheet
     * @return Parts
     */
    public function setIsheet($isheet = null);

    /**
     * @return string
     */
    public function getIsheet();
}
