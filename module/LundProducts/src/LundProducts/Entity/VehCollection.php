<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * LundProducts
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundProducts
 * @subpackage Entity
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace LundProducts\Entity;

/**
 * VehCollection
 *
 * @see VehCollectionInterface
 */
class VehCollection implements VehCollectionInterface
{
    /**
     * @var integer
     */
    protected $vehCollectionId;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $vehCollections;

    /**
     * @var \LundProducts\Entity\VehMake
     */
    protected $vehMake;

    /**
     * @var \LundProducts\Entity\VehModel
     */
    protected $vehModel;

    /**
     * @var \LundProducts\Entity\VehSubmodel
     */
    protected $vehSubmodel;

    /**
     * @var \LundProducts\Entity\VehYear
     */
    protected $vehYear;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $part;

    /**
     * @var integer
     */
    protected $makeId;

    /**
     * @var integer
     */
    protected $modelId;

    /**
     * @var integer
     */
    protected $submodelId;

    /**
     * @var integer
     */
    protected $bodyTypeId;

    /**
     * @var string
     */
    protected $bodyType;

    /**
     * @var integer
     */
    protected $bodyNumDoorsId;

    /**
     * @var integer
     */
    protected $bedTypeId;

    /**
     * @var string
     */
    protected $bedType;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->vehCollections = new \Doctrine\Common\Collections\ArrayCollection();
        $this->part = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get vehCollectionId
     *
     * @return integer
     */
    public function getVehCollectionId()
    {
        return $this->vehCollectionId;
    }

    /**
     * Add vehCollections
     *
     * @param  \LundProducts\Entity\PartVehCollection $vehCollections
     * @return VehCollection
     */
    public function addVehCollection(\LundProducts\Entity\PartVehCollection $vehCollections)
    {
        $this->vehCollections[] = $vehCollections;

        return $this;
    }

    /**
     * Remove vehCollections
     *
     * @param \LundProducts\Entity\PartVehCollection $vehCollections
     */
    public function removeVehCollection(\LundProducts\Entity\PartVehCollection $vehCollections)
    {
        $this->vehCollections->removeElement($vehCollections);
    }

    /**
     * Get vehCollections
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVehCollections()
    {
        return $this->vehCollections;
    }

    /**
     * Set vehMake
     *
     * @param  \LundProducts\Entity\VehMake $vehMake
     * @return VehCollection
     */
    public function setVehMake(\LundProducts\Entity\VehMake $vehMake = null)
    {
        $this->vehMake = $vehMake;

        return $this;
    }

    /**
     * Get vehMake
     *
     * @return \LundProducts\Entity\VehMake
     */
    public function getVehMake()
    {
        return $this->vehMake;
    }

    /**
     * Set vehModel
     *
     * @param  \LundProducts\Entity\VehModel $vehModel
     * @return VehCollection
     */
    public function setVehModel(\LundProducts\Entity\VehModel $vehModel = null)
    {
        $this->vehModel = $vehModel;

        return $this;
    }

    /**
     * Get vehModel
     *
     * @return \LundProducts\Entity\VehModel
     */
    public function getVehModel()
    {
        return $this->vehModel;
    }

    /**
     * Set vehSubmodel
     *
     * @param  \LundProducts\Entity\VehSubmodel $vehSubmodel
     * @return VehCollection
     */
    public function setVehSubmodel(\LundProducts\Entity\VehSubmodel $vehSubmodel = null)
    {
        $this->vehSubmodel = $vehSubmodel;

        return $this;
    }

    /**
     * Get vehSubmodel
     *
     * @return \LundProducts\Entity\VehSubmodel
     */
    public function getVehSubmodel()
    {
        return $this->vehSubmodel;
    }

    /**
     * Set vehYear
     *
     * @param  \LundProducts\Entity\VehYear $vehYear
     * @return VehCollection
     */
    public function setVehYear(\LundProducts\Entity\VehYear $vehYear = null)
    {
        $this->vehYear = $vehYear;

        return $this;
    }

    /**
     * Get vehYear
     *
     * @return \LundProducts\Entity\VehYear
     */
    public function getVehYear()
    {
        return $this->vehYear;
    }

    /**
     * Add part
     *
     * @param  \LundProducts\Entity\Parts $part
     * @return VehCollection
     */
    public function addPart(\LundProducts\Entity\Parts $part)
    {
        $this->part[] = $part;

        return $this;
    }

    /**
     * Remove part
     *
     * @param \LundProducts\Entity\Parts $part
     */
    public function removePart(\LundProducts\Entity\Parts $part)
    {
        $this->part->removeElement($part);
    }

    /**
     * Get part
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * Set makeId
     *
     * @param  integer       $makeId
     * @return VehCollection
     */
    public function setMakeId($makeId)
    {
        $this->makeId = $makeId;

        return $this;
    }

    /**
     * Get makeId
     *
     * @return integer
     */
    public function getMakeId()
    {
        return $this->makeId;
    }

    /**
     * Set modelId
     *
     * @param  integer       $modelId
     * @return VehCollection
     */
    public function setModelId($modelId)
    {
        $this->modelId = $modelId;

        return $this;
    }

    /**
     * Get modelId
     *
     * @return integer
     */
    public function getModelId()
    {
        return $this->modelId;
    }

    /**
     * Set submodelId
     *
     * @param  integer       $submodelId
     * @return VehCollection
     */
    public function setSubmodelId($submodelId)
    {
        $this->submodelId = $submodelId;

        return $this;
    }

    /**
     * Get submodelId
     *
     * @return integer
     */
    public function getSubmodelId()
    {
        return $this->submodelId;
    }

    /**
     * Set bodyTypeId
     *
     * @param  integer       $bodyTypeId
     * @return VehCollection
     */
    public function setBodyTypeId($bodyTypeId)
    {
        $this->bodyTypeId = $bodyTypeId;

        return $this;
    }

    /**
     * Get bodyTypeId
     *
     * @return integer
     */
    public function getBodyTypeId()
    {
        return $this->bodyTypeId;
    }

    /**
     * Set bodyType
     *
     * @param  string        $bodyType
     * @return VehCollection
     */
    public function setBodyType($bodyType)
    {
        $this->bodyType = $bodyType;

        return $this;
    }

    /**
     * Get bodyType
     *
     * @return string
     */
    public function getBodyType()
    {
        return $this->bodyType;
    }

    /**
     * Set bodyNumDoorsId
     *
     * @param  integer       $bodyNumDoorsId
     * @return VehCollection
     */
    public function setBodyNumDoorsId($bodyNumDoorsId)
    {
        $this->bodyNumDoorsId = $bodyNumDoorsId;

        return $this;
    }

    /**
     * Get bodyNumDoorsId
     *
     * @return integer
     */
    public function getBodyNumDoorsId()
    {
        return $this->bodyNumDoorsId;
    }

    /**
     * Set bedTypeId
     *
     * @param  integer       $bedTypeId
     * @return VehCollection
     */
    public function setBedTypeId($bedTypeId)
    {
        $this->bedTypeId = $bedTypeId;

        return $this;
    }

    /**
     * Get bedTypeId
     *
     * @return integer
     */
    public function getBedTypeId()
    {
        return $this->bedTypeId;
    }

    /**
     * Set bedType
     *
     * @param  string        $bedType
     * @return VehCollection
     */
    public function setBedType($bedType)
    {
        $this->bedType = $bedType;

        return $this;
    }

    /**
     * Get bedType
     *
     * @return string
     */
    public function getBedType()
    {
        return $this->bedType;
    }

}
