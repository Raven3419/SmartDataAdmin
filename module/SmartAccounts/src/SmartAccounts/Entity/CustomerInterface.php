<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartAccounts
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartAccounts\Entity
 * @subpackage Interface
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartAccounts\Entity;

/**
 * Customer interface
 */
interface CustomerInterface
{
    /**
     * @param  \DateTime $createdAt
     * @return Customer
     */
    public function setCreatedAt($createdAt);

    /**
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * @param  string $createdBy
     * @return Customer
     */
    public function setCreatedBy($createdBy);

    /**
     * @return string
     */
    public function getCreatedBy();

    /**
     * @param  \DateTime $modifiedAt
     * @return Customer
     */
    public function setModifiedAt($modifiedAt);

    /**
     * @return \DateTime
     */
    public function getModifiedAt();

    /**
     * @param  string $modifiedBy
     * @return Customer
     */
    public function setModifiedBy($modifiedBy);

    /**
     * @return string
     */
    public function getModifiedBy();

    /**
     * @param  boolean $disabled
     * @return Customer
     */
    public function setDisabled($disabled);

    /**
     * @return boolean
     */
    public function getDisabled();

    /**
     * @param  string $firstName
     * @return Customer
     */
    public function setFirstName($firstName);

    /**
     * @return string
     */
    public function getFirstName();

    /**
     * @param  string $lastName
     * @return Customer
     */
    public function setLastName($lastName);

    /**
     * @return string
     */
    public function getLastName();

    /**
     * @param  string $email
     * @return Customer
     */
    public function setEmail($email);

    /**
     * @return string
     */
    public function getEmail();

    /**
     * @param  string $password
     * @return Customer
     */
    public function setPassword($password);

    /**
     * @return string
     */
    public function getPassword();

    /**
     * @param  string $parentEmail
     * @return Customer
     */
    public function setParentEmail($parentEmail);

    /**
     * @return string
     */
    public function getParentEmail();

    /**
     * @param  string $parentFirstName
     * @return Customer
     */
    public function setParentFirstName($parentFirstName);

    /**
     * @return string
     */
    public function getParentFirstName();

    /**
     * @param  string $parentLastName
     * @return Customer
     */
    public function setParentLastName($parentLastName);

    /**
     * @return string
     */
    public function getParentLastName();

    /**
     * @return integer
     */
    public function getCustomerId();

    /**
     * @param  string $address
     * @return Customer
     */
    public function setAddress($address);

    /**
     * @return string
     */
    public function getAddress();

    /**
     * @param  string $city
     * @return Customer
     */
    public function setCity($city);

    /**
     * @return string
     */
    public function getCity();

    /**
     * @param  string $state
     * @return Customer
     */
    public function setState($state);

    /**
     * @return string
     */
    public function getState();

    /**
     * @param  string $zip
     * @return Customer
     */
    public function setZip($zip);

    /**
     * @return string
     */
    public function getZip();

    /**
     * @param  string $notificationFree
     * @return Customer
     */
    public function setNotificationFree($notificationFree);

    /**
     * @return string
     */
    public function getNotificationFree();

    /**
     * @param  string $notificationGrade
     * @return Customer
     */
    public function setNotificationGrade($notificationGrade);

    /**
     * @return string
     */
    public function getNotificationGrade();

}
