<?php

namespace DoctrineORMModule\Proxy\__CG__\LundProducts\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class ChangesetDetails extends \LundProducts\Entity\ChangesetDetails implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Persistence\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Common\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array properties to be lazy loaded, with keys being the property
     *            names and values being their default values
     *
     * @see \Doctrine\Common\Persistence\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array();



    /**
     * @param \Closure $initializer
     * @param \Closure $cloner
     */
    public function __construct($initializer = null, $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return array('__isInitialized__', 'partNumber', 'brandLabel', 'productCategoryLabel', 'productLineLabel', 'partId', 'appChanged', 'statusChanged', 'countryChanged', 'popChanged', 'colorChanged', 'dimsChanged', 'classChanged', 'imageChanged', 'change', 'changeType', 'changeFileRow', 'changesetDetailId', 'parts', 'brand', 'productCategories', 'productLines', 'changesets', 'part');
        }

        return array('__isInitialized__', 'partNumber', 'brandLabel', 'productCategoryLabel', 'productLineLabel', 'partId', 'appChanged', 'statusChanged', 'countryChanged', 'popChanged', 'colorChanged', 'dimsChanged', 'classChanged', 'imageChanged', 'change', 'changeType', 'changeFileRow', 'changesetDetailId', 'parts', 'brand', 'productCategories', 'productLines', 'changesets', 'part');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (ChangesetDetails $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy->__getLazyProperties() as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', array());
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', array());
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function setPartNumber($partNumber)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPartNumber', array($partNumber));

        return parent::setPartNumber($partNumber);
    }

    /**
     * {@inheritDoc}
     */
    public function getPartNumber()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPartNumber', array());

        return parent::getPartNumber();
    }

    /**
     * {@inheritDoc}
     */
    public function setBrandLabel($brandLabel)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBrandLabel', array($brandLabel));

        return parent::setBrandLabel($brandLabel);
    }

    /**
     * {@inheritDoc}
     */
    public function getBrandLabel()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBrandLabel', array());

        return parent::getBrandLabel();
    }

    /**
     * {@inheritDoc}
     */
    public function setProductCategoryLabel($productCategoryLabel)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductCategoryLabel', array($productCategoryLabel));

        return parent::setProductCategoryLabel($productCategoryLabel);
    }

    /**
     * {@inheritDoc}
     */
    public function getProductCategoryLabel()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductCategoryLabel', array());

        return parent::getProductCategoryLabel();
    }

    /**
     * {@inheritDoc}
     */
    public function setProductLineLabel($productLineLabel)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductLineLabel', array($productLineLabel));

        return parent::setProductLineLabel($productLineLabel);
    }

    /**
     * {@inheritDoc}
     */
    public function getProductLineLabel()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductLineLabel', array());

        return parent::getProductLineLabel();
    }

    /**
     * {@inheritDoc}
     */
    public function setPartId($partId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPartId', array($partId));

        return parent::setPartId($partId);
    }

    /**
     * {@inheritDoc}
     */
    public function getPartId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPartId', array());

        return parent::getPartId();
    }

    /**
     * {@inheritDoc}
     */
    public function setAppChanged($appChanged)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAppChanged', array($appChanged));

        return parent::setAppChanged($appChanged);
    }

    /**
     * {@inheritDoc}
     */
    public function getAppChanged()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAppChanged', array());

        return parent::getAppChanged();
    }

    /**
     * {@inheritDoc}
     */
    public function setStatusChanged($statusChanged)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatusChanged', array($statusChanged));

        return parent::setStatusChanged($statusChanged);
    }

    /**
     * {@inheritDoc}
     */
    public function getStatusChanged()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatusChanged', array());

        return parent::getStatusChanged();
    }

    /**
     * {@inheritDoc}
     */
    public function setCountryChanged($countryChanged)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCountryChanged', array($countryChanged));

        return parent::setCountryChanged($countryChanged);
    }

    /**
     * {@inheritDoc}
     */
    public function getCountryChanged()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCountryChanged', array());

        return parent::getCountryChanged();
    }

    /**
     * {@inheritDoc}
     */
    public function setPopChanged($popChanged)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPopChanged', array($popChanged));

        return parent::setPopChanged($popChanged);
    }

    /**
     * {@inheritDoc}
     */
    public function getPopChanged()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPopChanged', array());

        return parent::getPopChanged();
    }

    /**
     * {@inheritDoc}
     */
    public function setColorChanged($colorChanged)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setColorChanged', array($colorChanged));

        return parent::setColorChanged($colorChanged);
    }

    /**
     * {@inheritDoc}
     */
    public function getColorChanged()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getColorChanged', array());

        return parent::getColorChanged();
    }

    /**
     * {@inheritDoc}
     */
    public function setDimsChanged($dimsChanged)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDimsChanged', array($dimsChanged));

        return parent::setDimsChanged($dimsChanged);
    }

    /**
     * {@inheritDoc}
     */
    public function getDimsChanged()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDimsChanged', array());

        return parent::getDimsChanged();
    }

    /**
     * {@inheritDoc}
     */
    public function setClassChanged($classChanged)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setClassChanged', array($classChanged));

        return parent::setClassChanged($classChanged);
    }

    /**
     * {@inheritDoc}
     */
    public function getClassChanged()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getClassChanged', array());

        return parent::getClassChanged();
    }

    /**
     * {@inheritDoc}
     */
    public function setImageChanged($imageChanged)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImageChanged', array($imageChanged));

        return parent::setImageChanged($imageChanged);
    }

    /**
     * {@inheritDoc}
     */
    public function getImageChanged()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImageChanged', array());

        return parent::getImageChanged();
    }

    /**
     * {@inheritDoc}
     */
    public function setChange($change)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setChange', array($change));

        return parent::setChange($change);
    }

    /**
     * {@inheritDoc}
     */
    public function getChange()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getChange', array());

        return parent::getChange();
    }

    /**
     * {@inheritDoc}
     */
    public function setChangeType($changeType)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setChangeType', array($changeType));

        return parent::setChangeType($changeType);
    }

    /**
     * {@inheritDoc}
     */
    public function getChangeType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getChangeType', array());

        return parent::getChangeType();
    }

    /**
     * {@inheritDoc}
     */
    public function setChangeFileRow($changeFileRow)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setChangeFileRow', array($changeFileRow));

        return parent::setChangeFileRow($changeFileRow);
    }

    /**
     * {@inheritDoc}
     */
    public function getChangeFileRow()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getChangeFileRow', array());

        return parent::getChangeFileRow();
    }

    /**
     * {@inheritDoc}
     */
    public function getChangesetDetailId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getChangesetDetailId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getChangesetDetailId', array());

        return parent::getChangesetDetailId();
    }

    /**
     * {@inheritDoc}
     */
    public function setParts(\LundProducts\Entity\Parts $parts = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setParts', array($parts));

        return parent::setParts($parts);
    }

    /**
     * {@inheritDoc}
     */
    public function getParts()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getParts', array());

        return parent::getParts();
    }

    /**
     * {@inheritDoc}
     */
    public function setBrand(\LundProducts\Entity\Brands $brand = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBrand', array($brand));

        return parent::setBrand($brand);
    }

    /**
     * {@inheritDoc}
     */
    public function getBrand()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBrand', array());

        return parent::getBrand();
    }

    /**
     * {@inheritDoc}
     */
    public function setProductCategories(\LundProducts\Entity\ProductCategories $productCategories = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductCategories', array($productCategories));

        return parent::setProductCategories($productCategories);
    }

    /**
     * {@inheritDoc}
     */
    public function getProductCategories()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductCategories', array());

        return parent::getProductCategories();
    }

    /**
     * {@inheritDoc}
     */
    public function setProductLines(\LundProducts\Entity\ProductLines $productLines = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setProductLines', array($productLines));

        return parent::setProductLines($productLines);
    }

    /**
     * {@inheritDoc}
     */
    public function getProductLines()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getProductLines', array());

        return parent::getProductLines();
    }

    /**
     * {@inheritDoc}
     */
    public function setChangesets(\LundProducts\Entity\Changesets $changesets = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setChangesets', array($changesets));

        return parent::setChangesets($changesets);
    }

    /**
     * {@inheritDoc}
     */
    public function getChangesets()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getChangesets', array());

        return parent::getChangesets();
    }

    /**
     * {@inheritDoc}
     */
    public function setPart(\LundProducts\Entity\Parts $part = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPart', array($part));

        return parent::setPart($part);
    }

    /**
     * {@inheritDoc}
     */
    public function getPart()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPart', array());

        return parent::getPart();
    }

}