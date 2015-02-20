<?php

namespace DoctrineORMModule\Proxy\__CG__\RocketDam\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Asset extends \RocketDam\Entity\Asset implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', 'createdAt', 'createdBy', 'modifiedAt', 'modifiedBy', 'deleted', 'disabled', 'objectId', 'label', 'revision', 'size', 'width', 'height', 'mime', 'mtime', 'extension', 'hidden', 'locked', 'hash', 'filePath', 'fileName', 'origName', 'assetType', 'assetId', 'parentAsset', 'origAsset');
        }

        return array('__isInitialized__', 'createdAt', 'createdBy', 'modifiedAt', 'modifiedBy', 'deleted', 'disabled', 'objectId', 'label', 'revision', 'size', 'width', 'height', 'mime', 'mtime', 'extension', 'hidden', 'locked', 'hash', 'filePath', 'fileName', 'origName', 'assetType', 'assetId', 'parentAsset', 'origAsset');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Asset $proxy) {
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
    public function setCreatedAt($createdAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedAt', array($createdAt));

        return parent::setCreatedAt($createdAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedAt', array());

        return parent::getCreatedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setCreatedBy($createdBy)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCreatedBy', array($createdBy));

        return parent::setCreatedBy($createdBy);
    }

    /**
     * {@inheritDoc}
     */
    public function getCreatedBy()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCreatedBy', array());

        return parent::getCreatedBy();
    }

    /**
     * {@inheritDoc}
     */
    public function setModifiedAt($modifiedAt)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setModifiedAt', array($modifiedAt));

        return parent::setModifiedAt($modifiedAt);
    }

    /**
     * {@inheritDoc}
     */
    public function getModifiedAt()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getModifiedAt', array());

        return parent::getModifiedAt();
    }

    /**
     * {@inheritDoc}
     */
    public function setModifiedBy($modifiedBy)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setModifiedBy', array($modifiedBy));

        return parent::setModifiedBy($modifiedBy);
    }

    /**
     * {@inheritDoc}
     */
    public function getModifiedBy()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getModifiedBy', array());

        return parent::getModifiedBy();
    }

    /**
     * {@inheritDoc}
     */
    public function setDeleted($deleted)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDeleted', array($deleted));

        return parent::setDeleted($deleted);
    }

    /**
     * {@inheritDoc}
     */
    public function getDeleted()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDeleted', array());

        return parent::getDeleted();
    }

    /**
     * {@inheritDoc}
     */
    public function setDisabled($disabled)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDisabled', array($disabled));

        return parent::setDisabled($disabled);
    }

    /**
     * {@inheritDoc}
     */
    public function getDisabled()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDisabled', array());

        return parent::getDisabled();
    }

    /**
     * {@inheritDoc}
     */
    public function setObjectId($objectId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setObjectId', array($objectId));

        return parent::setObjectId($objectId);
    }

    /**
     * {@inheritDoc}
     */
    public function getObjectId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getObjectId', array());

        return parent::getObjectId();
    }

    /**
     * {@inheritDoc}
     */
    public function setLabel($label)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLabel', array($label));

        return parent::setLabel($label);
    }

    /**
     * {@inheritDoc}
     */
    public function getLabel()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLabel', array());

        return parent::getLabel();
    }

    /**
     * {@inheritDoc}
     */
    public function setREvision($revision)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setREvision', array($revision));

        return parent::setREvision($revision);
    }

    /**
     * {@inheritDoc}
     */
    public function getRevision()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRevision', array());

        return parent::getRevision();
    }

    /**
     * {@inheritDoc}
     */
    public function setSize($size)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setSize', array($size));

        return parent::setSize($size);
    }

    /**
     * {@inheritDoc}
     */
    public function getSize()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSize', array());

        return parent::getSize();
    }

    /**
     * {@inheritDoc}
     */
    public function setWidth($width)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setWidth', array($width));

        return parent::setWidth($width);
    }

    /**
     * {@inheritDoc}
     */
    public function getWidth()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getWidth', array());

        return parent::getWidth();
    }

    /**
     * {@inheritDoc}
     */
    public function setHeight($height)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHeight', array($height));

        return parent::setHeight($height);
    }

    /**
     * {@inheritDoc}
     */
    public function getHeight()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHeight', array());

        return parent::getHeight();
    }

    /**
     * {@inheritDoc}
     */
    public function setMime($mime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMime', array($mime));

        return parent::setMime($mime);
    }

    /**
     * {@inheritDoc}
     */
    public function getMime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMime', array());

        return parent::getMime();
    }

    /**
     * {@inheritDoc}
     */
    public function setMtime($mtime)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMtime', array($mtime));

        return parent::setMtime($mtime);
    }

    /**
     * {@inheritDoc}
     */
    public function getMtime()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMtime', array());

        return parent::getMtime();
    }

    /**
     * {@inheritDoc}
     */
    public function setExtension($extension)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setExtension', array($extension));

        return parent::setExtension($extension);
    }

    /**
     * {@inheritDoc}
     */
    public function getExtension()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getExtension', array());

        return parent::getExtension();
    }

    /**
     * {@inheritDoc}
     */
    public function setHidden($hidden)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHidden', array($hidden));

        return parent::setHidden($hidden);
    }

    /**
     * {@inheritDoc}
     */
    public function getHidden()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHidden', array());

        return parent::getHidden();
    }

    /**
     * {@inheritDoc}
     */
    public function setLocked($locked)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLocked', array($locked));

        return parent::setLocked($locked);
    }

    /**
     * {@inheritDoc}
     */
    public function getLocked()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLocked', array());

        return parent::getLocked();
    }

    /**
     * {@inheritDoc}
     */
    public function setHash($hash)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHash', array($hash));

        return parent::setHash($hash);
    }

    /**
     * {@inheritDoc}
     */
    public function getHash()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHash', array());

        return parent::getHash();
    }

    /**
     * {@inheritDoc}
     */
    public function setFilePath($filePath)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFilePath', array($filePath));

        return parent::setFilePath($filePath);
    }

    /**
     * {@inheritDoc}
     */
    public function getFilePath()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFilePath', array());

        return parent::getFilePath();
    }

    /**
     * {@inheritDoc}
     */
    public function setFileName($fileName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFileName', array($fileName));

        return parent::setFileName($fileName);
    }

    /**
     * {@inheritDoc}
     */
    public function getFileName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFileName', array());

        return parent::getFileName();
    }

    /**
     * {@inheritDoc}
     */
    public function setOrigName($origName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOrigName', array($origName));

        return parent::setOrigName($origName);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrigName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOrigName', array());

        return parent::getOrigName();
    }

    /**
     * {@inheritDoc}
     */
    public function setAssetType($assetType)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAssetType', array($assetType));

        return parent::setAssetType($assetType);
    }

    /**
     * {@inheritDoc}
     */
    public function getAssetType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAssetType', array());

        return parent::getAssetType();
    }

    /**
     * {@inheritDoc}
     */
    public function getAssetId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getAssetId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAssetId', array());

        return parent::getAssetId();
    }

    /**
     * {@inheritDoc}
     */
    public function setParentAsset(\RocketDam\Entity\Asset $parentAsset = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setParentAsset', array($parentAsset));

        return parent::setParentAsset($parentAsset);
    }

    /**
     * {@inheritDoc}
     */
    public function getParentAsset()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getParentAsset', array());

        return parent::getParentAsset();
    }

    /**
     * {@inheritDoc}
     */
    public function setOrigAsset(\RocketDam\Entity\Asset $origAsset = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setOrigAsset', array($origAsset));

        return parent::setOrigAsset($origAsset);
    }

    /**
     * {@inheritDoc}
     */
    public function getOrigAsset()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getOrigAsset', array());

        return parent::getOrigAsset();
    }

}