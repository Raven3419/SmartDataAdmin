<?php

namespace DoctrineORMModule\Proxy\__CG__\LundProducts\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class PartVehCollection extends \LundProducts\Entity\PartVehCollection implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', 'sequence', 'subdetail', 'makeId', 'modelId', 'submodelId', 'bodyTypeId', 'bodyNumDoorsId', 'bedTypeId', 'partVehCollectionId', 'changesetDetail', 'part', 'vehCollection');
        }

        return array('__isInitialized__', 'sequence', 'subdetail', 'makeId', 'modelId', 'submodelId', 'bodyTypeId', 'bodyNumDoorsId', 'bedTypeId', 'partVehCollectionId', 'changesetDetail', 'part', 'vehCollection');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (PartVehCollection $proxy) {
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
    public function setSequence($sequence)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSequence', array($sequence));

        return parent::setSequence($sequence);
    }

    /**
     * {@inheritDoc}
     */
    public function getSequence()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSequence', array());

        return parent::getSequence();
    }

    /**
     * {@inheritDoc}
     */
    public function setSubdetail($subdetail)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSubdetail', array($subdetail));

        return parent::setSubdetail($subdetail);
    }

    /**
     * {@inheritDoc}
     */
    public function getSubdetail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSubdetail', array());

        return parent::getSubdetail();
    }

    /**
     * {@inheritDoc}
     */
    public function getPartVehCollectionId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getPartVehCollectionId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPartVehCollectionId', array());

        return parent::getPartVehCollectionId();
    }

    /**
     * {@inheritDoc}
     */
    public function setChangesetDetail(\LundProducts\Entity\ChangesetDetails $changesetDetail = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setChangesetDetail', array($changesetDetail));

        return parent::setChangesetDetail($changesetDetail);
    }

    /**
     * {@inheritDoc}
     */
    public function getChangesetDetail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getChangesetDetail', array());

        return parent::getChangesetDetail();
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

    /**
     * {@inheritDoc}
     */
    public function setVehCollection(\LundProducts\Entity\VehCollection $vehCollection = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVehCollection', array($vehCollection));

        return parent::setVehCollection($vehCollection);
    }

    /**
     * {@inheritDoc}
     */
    public function getVehCollection()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVehCollection', array());

        return parent::getVehCollection();
    }

}