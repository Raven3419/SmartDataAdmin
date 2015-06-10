<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartAccounts
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartAccounts
 * @subpackage Entity
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartAccounts\Entity;

/**
 * Customer
 *
 * @see CustomerInterface
 */
class Customer implements CustomerInterface
{
    /**
     * @var \DateTime
     */
    protected $createdAt;

    /**
     * @var string
     */
    protected $createdBy;

    /**
     * @var \DateTime
     */
    protected $modifiedAt;

    /**
     * @var string
     */
    protected $modifiedBy;

    /**
     * @var boolean
     */
    protected $disabled;

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $parentFirstName;

    /**
     * @var string
     */
    protected $parentLastName;

    /**
     * @var string
     */
    protected $parentEmail;

    /**
     * @var integer
     */
    protected $customerId;

    /**
     * @var string
     */
    protected $address;

    /**
     * @var string
     */
    protected $city;

    /**
     * @var string
     */
    protected $state;

    /**
     * @var string
     */
    protected $zip;

    /**
     * @var string
     */
    protected $notificationFree;

    /**
     * @var string
     */
    protected $notificationGrade;

    /**
     * @var boolean
     */
    protected $downloadReady;

    /**
     * @var string
     */
    protected $downloadUrl;

    /**
     * Set createdAt
     *
     * @param  \DateTime $createdAt
     * @return Customer
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set createdBy
     *
     * @param  string $createdBy
     * @return Customer
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return string
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set modifiedAt
     *
     * @param  \DateTime $modifiedAt
     * @return Customer
     */
    public function setModifiedAt($modifiedAt)
    {
        $this->modifiedAt = $modifiedAt;

        return $this;
    }

    /**
     * Get modifiedAt
     *
     * @return \DateTime
     */
    public function getModifiedAt()
    {
        return $this->modifiedAt;
    }

    /**
     * Set modifiedBy
     *
     * @param  string $modifiedBy
     * @return Customer
     */
    public function setModifiedBy($modifiedBy)
    {
        $this->modifiedBy = $modifiedBy;

        return $this;
    }

    /**
     * Get modifiedBy
     *
     * @return string
     */
    public function getModifiedBy()
    {
        return $this->modifiedBy;
    }

    /**
     * Set disabled
     *
     * @param  boolean $disabled
     * @return Customer
     */
    public function setDisabled($disabled)
    {
        $this->disabled = $disabled;

        return $this;
    }

    /**
     * Get disabled
     *
     * @return boolean
     */
    public function getDisabled()
    {
        return $this->disabled;
    }

    /**
     * Set firstName
     *
     * @param  string $firstName
     * @return Customer
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param  string $lastName
     * @return Customer
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set email
     *
     * @param  string $email
     * @return Customer
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set password
     *
     * @param  string $password
     * @return Customer
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set parentEmail
     *
     * @param  string $parentEmail
     * @return Customer
     */
    public function setParentEmail($parentEmail)
    {
        $this->parentEmail = $parentEmail;

        return $this;
    }

    /**
     * Get parentEmail
     *
     * @return string
     */
    public function getParentEmail()
    {
        return $this->parentEmail;
    }

    /**
     * Set parentFirstName
     *
     * @param  string $parentFirstName
     * @return Customer
     */
    public function setParentFirstName($parentFirstName)
    {
        $this->parentFirstName = $parentFirstName;

        return $this;
    }

    /**
     * Get parentFirstName
     *
     * @return string
     */
    public function getParentFirstName()
    {
        return $this->parentFirstName;
    }

    /**
     * Set parentLastName
     *
     * @param  string $parentLastName
     * @return Customer
     */
    public function setParentLastName($parentLastName)
    {
        $this->parentLastName = $parentLastName;

        return $this;
    }

    /**
     * Get parentLastName
     *
     * @return string
     */
    public function getParentLastName()
    {
        return $this->parentLastName;
    }
    
    /**
     * Get customerId
     *
     * @return integer
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Set address
     *
     * @param  string $address
     * @return Customer
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set city
     *
     * @param  string $city
     * @return Customer
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set state
     *
     * @param  string $state
     * @return Customer
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set zip
     *
     * @param  string $zip
     * @return Customer
     */
    public function setZip($zip)
    {
        $this->zip = $zip;

        return $this;
    }

    /**
     * Get zip
     *
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * Set notificationFree
     *
     * @param  string $notificationFree
     * @return Customer
     */
    public function setNotificationFree($notificationFree)
    {
        $this->notificationFree = $notificationFree;

        return $this;
    }

    /**
     * Get notificationFree
     *
     * @return string
     */
    public function getNotificationFree()
    {
        return $this->notificationFree;
    }

    /**
     * Set notificationGrade
     *
     * @param  string $notificationGrade
     * @return Customer
     */
    public function setNotificationGrade($notificationGrade)
    {
        $this->notificationGrade = $notificationGrade;

        return $this;
    }

    /**
     * Get notificationGrade
     *
     * @return string
     */
    public function getNotificationGrade()
    {
        return $this->notificationGrade;
    }

    /**
     * Set downloadReady
     *
     * @param  boolean $downloadReady
     * @return Customer
     */
    public function setDownloadReady($downloadReady)
    {
        $this->downloadReady = $downloadReady;

        return $this;
    }

    /**
     * Get downloadReady
     *
     * @return boolean
     */
    public function getDownloadReady()
    {
        return $this->downloadReady;
    }

    /**
     * Set downloadUrl
     *
     * @param  string $downloadUrl
     * @return Customer
     */
    public function setDownloadUrl($downloadUrl)
    {
        $this->downloadUrl = $downloadUrl;

        return $this;
    }

    /**
     * Get downloadUrl
     *
     * @return string
     */
    public function getDownloadUrl()
    {
        return $this->downloadUrl;
    }

}
