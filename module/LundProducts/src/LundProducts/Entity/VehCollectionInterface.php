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
 * VehCollection interface
 */
interface VehCollectionInterface
{
    /**
     * @return integer
     */
    public function getVehCollectionId();

    /**
     * Add vehCollections
     *
     * @param  \LundProducts\Entity\PartVehCollection $vehCollections
     * @return VehCollection
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
     * @param  \LundProducts\Entity\VehMake $vehMake
     * @return VehCollection
     */
    public function setVehMake(\LundProducts\Entity\VehMake $vehMake = null);

    /**
     * @return \LundProducts\Entity\VehMake
     */
    public function getVehMake();

    /**
     * @param  \LundProducts\Entity\VehModel $vehModel
     * @return VehCollection
     */
    public function setVehModel(\LundProducts\Entity\VehModel $vehModel = null);

    /**
     * @return \LundProducts\Entity\VehModel
     */
    public function getVehModel();

    /**
     * @param  \LundProducts\Entity\VehSubmodel $vehSubmodel
     * @return VehCollection
     */
    public function setVehSubmodel(\LundProducts\Entity\VehSubmodel $vehSubmodel = null);

    /**
     * @return \LundProducts\Entity\VehSubmodel
     */
    public function getVehSubmodel();

    /**
     * @param  \LundProducts\Entity\VehYear $vehYear
     * @return VehCollection
     */
    public function setVehYear(\LundProducts\Entity\VehYear $vehYear = null);

    /**
     * @return \LundProducts\Entity\VehYear
     */
    public function getVehYear();

    /**
     * @param  \LundProducts\Entity\Parts $part
     * @return VehCollection
     */
    public function addPart(\LundProducts\Entity\Parts $part);

    /**
     * @param \LundProducts\Entity\Parts $part
     */
    public function removePart(\LundProducts\Entity\Parts $part);

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPart();

    /**
     * Set makeId
     *
     * @param  integer       $makeId
     * @return VehCollection
     */
    public function setMakeId($makeId);

    /**
     * Get makeId
     *
     * @return integer
     */
    public function getMakeId();

    /**
     * Set modelId
     *
     * @param  integer       $modelId
     * @return VehCollection
     */
    public function setModelId($modelId);

    /**
     * Get modelId
     *
     * @return integer
     */
    public function getModelId();

    /**
     * Set submodelId
     *
     * @param  integer       $submodelId
     * @return VehCollection
     */
    public function setSubmodelId($submodelId);

    /**
     * Get submodelId
     *
     * @return integer
     */
    public function getSubmodelId();

    /**
     * Set bodyTypeId
     *
     * @param  integer       $bodyTypeId
     * @return VehCollection
     */
    public function setBodyTypeId($bodyTypeId);

    /**
     * Get bodyTypeId
     *
     * @return integer
     */
    public function getBodyTypeId();

    /**
     * @param  string        $bodyType
     * @return VehCollection
     */
    public function setBodyType($bodyType);

    /**
     * @return string
     */
    public function getBodyType();

    /**
     * Set bodyNumDoorsId
     *
     * @param  integer       $bodyNumDoorsId
     * @return VehCollection
     */
    public function setBodyNumDoorsId($bodyNumDoorsId);

    /**
     * Get bodyNumDoorsId
     *
     * @return integer
     */
    public function getBodyNumDoorsId();

    /**
     * Set bedTypeId
     *
     * @param  integer       $bedTypeId
     * @return VehCollection
     */
    public function setBedTypeId($bedTypeId);

    /**
     * Get bedTypeId
     *
     * @return integer
     */
    public function getBedTypeId();

    /**
     * @param  string        $bedType;
     * @return VehCollection
     */
    public function setBedType($bedType);

    /**
     * @return string
     */
    public function getBedType();
}
