<?php

namespace DoctrineORMModule\Proxy\__CG__\LundCustomer\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Customer extends \LundCustomer\Entity\Customer implements \Doctrine\ORM\Proxy\Proxy
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
            return array('__isInitialized__', 'createdAt', 'createdBy', 'modifiedAt', 'modifiedBy', 'deleted', 'disabled', 'custId', 'name', 'filePickup', 'filePush', 'ftpSite', 'ftpUser', 'ftpPass', 'email', 'contactName', 'updateType', 'frequency', 'lastUpdate', 'acesVersion', 'piesVersion', 'lund', 'dfmal', 'avs', 'nifty', 'tradesman', 'lmp', 'amp', 'htam', 'belmor', 'lundAll', 'imageType', 'renameImages', 'acceptVideo', 'videoType', 'customerId', 'user');
        }

        return array('__isInitialized__', 'createdAt', 'createdBy', 'modifiedAt', 'modifiedBy', 'deleted', 'disabled', 'custId', 'name', 'filePickup', 'filePush', 'ftpSite', 'ftpUser', 'ftpPass', 'email', 'contactName', 'updateType', 'frequency', 'lastUpdate', 'acesVersion', 'piesVersion', 'lund', 'dfmal', 'avs', 'nifty', 'tradesman', 'lmp', 'amp', 'htam', 'belmor', 'lundAll', 'imageType', 'renameImages', 'acceptVideo', 'videoType', 'customerId', 'user');
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Customer $proxy) {
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
    public function setCustId($custId)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCustId', array($custId));

        return parent::setCustId($custId);
    }

    /**
     * {@inheritDoc}
     */
    public function getCustId()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCustId', array());

        return parent::getCustId();
    }

    /**
     * {@inheritDoc}
     */
    public function setName($name)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setName', array($name));

        return parent::setName($name);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getName', array());

        return parent::getName();
    }

    /**
     * {@inheritDoc}
     */
    public function setFilePickup($filePickup)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFilePickup', array($filePickup));

        return parent::setFilePickup($filePickup);
    }

    /**
     * {@inheritDoc}
     */
    public function getFilePickup()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFilePickup', array());

        return parent::getFilePickup();
    }

    /**
     * {@inheritDoc}
     */
    public function setFilePush($filePush)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFilePush', array($filePush));

        return parent::setFilePush($filePush);
    }

    /**
     * {@inheritDoc}
     */
    public function getFilePush()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFilePush', array());

        return parent::getFilePush();
    }

    /**
     * {@inheritDoc}
     */
    public function setFtpSite($ftpSite)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFtpSite', array($ftpSite));

        return parent::setFtpSite($ftpSite);
    }

    /**
     * {@inheritDoc}
     */
    public function getFtpSite()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFtpSite', array());

        return parent::getFtpSite();
    }

    /**
     * {@inheritDoc}
     */
    public function setFtpUser($ftpUser)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFtpUser', array($ftpUser));

        return parent::setFtpUser($ftpUser);
    }

    /**
     * {@inheritDoc}
     */
    public function getFtpUser()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFtpUser', array());

        return parent::getFtpUser();
    }

    /**
     * {@inheritDoc}
     */
    public function setFtpPass($ftpPass)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFtpPass', array($ftpPass));

        return parent::setFtpPass($ftpPass);
    }

    /**
     * {@inheritDoc}
     */
    public function getFtpPass()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFtpPass', array());

        return parent::getFtpPass();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmail($email)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmail', array($email));

        return parent::setEmail($email);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmail()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmail', array());

        return parent::getEmail();
    }

    /**
     * {@inheritDoc}
     */
    public function setContactName($contactName)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setContactName', array($contactName));

        return parent::setContactName($contactName);
    }

    /**
     * {@inheritDoc}
     */
    public function getContactName()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getContactName', array());

        return parent::getContactName();
    }

    /**
     * {@inheritDoc}
     */
    public function setUpdateType($updateType)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUpdateType', array($updateType));

        return parent::setUpdateType($updateType);
    }

    /**
     * {@inheritDoc}
     */
    public function getUpdateType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUpdateType', array());

        return parent::getUpdateType();
    }

    /**
     * {@inheritDoc}
     */
    public function setFrequency($frequency)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFrequency', array($frequency));

        return parent::setFrequency($frequency);
    }

    /**
     * {@inheritDoc}
     */
    public function getFrequency()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFrequency', array());

        return parent::getFrequency();
    }

    /**
     * {@inheritDoc}
     */
    public function setLastUpdate($lastUpdate)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLastUpdate', array($lastUpdate));

        return parent::setLastUpdate($lastUpdate);
    }

    /**
     * {@inheritDoc}
     */
    public function getLastUpdate()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLastUpdate', array());

        return parent::getLastUpdate();
    }

    /**
     * {@inheritDoc}
     */
    public function setAcesVersion($acesVersion)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAcesVersion', array($acesVersion));

        return parent::setAcesVersion($acesVersion);
    }

    /**
     * {@inheritDoc}
     */
    public function getAcesVersion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAcesVersion', array());

        return parent::getAcesVersion();
    }

    /**
     * {@inheritDoc}
     */
    public function setPiesVersion($piesVersion)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPiesVersion', array($piesVersion));

        return parent::setPiesVersion($piesVersion);
    }

    /**
     * {@inheritDoc}
     */
    public function getPiesVersion()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPiesVersion', array());

        return parent::getPiesVersion();
    }

    /**
     * {@inheritDoc}
     */
    public function setLund($lund)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLund', array($lund));

        return parent::setLund($lund);
    }

    /**
     * {@inheritDoc}
     */
    public function getLund()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLund', array());

        return parent::getLund();
    }

    /**
     * {@inheritDoc}
     */
    public function setDfmal($dfmal)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDfmal', array($dfmal));

        return parent::setDfmal($dfmal);
    }

    /**
     * {@inheritDoc}
     */
    public function getDfmal()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDfmal', array());

        return parent::getDfmal();
    }

    /**
     * {@inheritDoc}
     */
    public function setAvs($avs)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAvs', array($avs));

        return parent::setAvs($avs);
    }

    /**
     * {@inheritDoc}
     */
    public function getAvs()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAvs', array());

        return parent::getAvs();
    }

    /**
     * {@inheritDoc}
     */
    public function setNifty($nifty)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNifty', array($nifty));

        return parent::setNifty($nifty);
    }

    /**
     * {@inheritDoc}
     */
    public function getNifty()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNifty', array());

        return parent::getNifty();
    }

    /**
     * {@inheritDoc}
     */
    public function setTradesman($tradesman)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setTradesman', array($tradesman));

        return parent::setTradesman($tradesman);
    }

    /**
     * {@inheritDoc}
     */
    public function getTradesman()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getTradesman', array());

        return parent::getTradesman();
    }

    /**
     * {@inheritDoc}
     */
    public function setLmp($lmp)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLmp', array($lmp));

        return parent::setLmp($lmp);
    }

    /**
     * {@inheritDoc}
     */
    public function getLmp()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLmp', array());

        return parent::getLmp();
    }

    /**
     * {@inheritDoc}
     */
    public function setAmp($amp)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAmp', array($amp));

        return parent::setAmp($amp);
    }

    /**
     * {@inheritDoc}
     */
    public function getAmp()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAmp', array());

        return parent::getAmp();
    }

    /**
     * {@inheritDoc}
     */
    public function setHtam($htam)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setHtam', array($htam));

        return parent::setHtam($htam);
    }

    /**
     * {@inheritDoc}
     */
    public function getHtam()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getHtam', array());

        return parent::getHtam();
    }

    /**
     * {@inheritDoc}
     */
    public function setBelmor($belmor)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBelmor', array($belmor));

        return parent::setBelmor($belmor);
    }

    /**
     * {@inheritDoc}
     */
    public function getBelmor()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBelmor', array());

        return parent::getBelmor();
    }

    /**
     * {@inheritDoc}
     */
    public function setLundAll($lundAll)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLundAll', array($lundAll));

        return parent::setLundAll($lundAll);
    }

    /**
     * {@inheritDoc}
     */
    public function getLundAll()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLundAll', array());

        return parent::getLundAll();
    }

    /**
     * {@inheritDoc}
     */
    public function setImageType($imageType)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setImageType', array($imageType));

        return parent::setImageType($imageType);
    }

    /**
     * {@inheritDoc}
     */
    public function getImageType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImageType', array());

        return parent::getImageType();
    }

    /**
     * {@inheritDoc}
     */
    public function setRenameImages($renameImages)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRenameImages', array($renameImages));

        return parent::setRenameImages($renameImages);
    }

    /**
     * {@inheritDoc}
     */
    public function getRenameImages()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRenameImages', array());

        return parent::getRenameImages();
    }

    /**
     * {@inheritDoc}
     */
    public function setAcceptVideo($acceptVideo)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setAcceptVideo', array($acceptVideo));

        return parent::setAcceptVideo($acceptVideo);
    }

    /**
     * {@inheritDoc}
     */
    public function getAcceptVideo()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAcceptVideo', array());

        return parent::getAcceptVideo();
    }

    /**
     * {@inheritDoc}
     */
    public function setVideoType($videoType)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVideoType', array($videoType));

        return parent::setVideoType($videoType);
    }

    /**
     * {@inheritDoc}
     */
    public function getVideoType()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVideoType', array());

        return parent::getVideoType();
    }

    /**
     * {@inheritDoc}
     */
    public function getCustomerId()
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getCustomerId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCustomerId', array());

        return parent::getCustomerId();
    }

    /**
     * {@inheritDoc}
     */
    public function setUser(\RocketUser\Entity\User $user = NULL)
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUser', array($user));

        return parent::setUser($user);
    }

    /**
     * {@inheritDoc}
     */
    public function getUser()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUser', array());

        return parent::getUser();
    }

}