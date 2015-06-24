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
 * Emails interface
 */
interface EmailsInterface
{
    /**
     * @param  \DateTime $createdAt
     * @return Emails
     */
    public function setCreatedAt($createdAt);

    /**
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * @param  string $createdBy
     * @return Emails
     */
    public function setCreatedBy($createdBy);

    /**
     * @return string
     */
    public function getCreatedBy();

    /**
     * @param  \DateTime $modifiedAt
     * @return Emails
     */
    public function setModifiedAt($modifiedAt);

    /**
     * @return \DateTime
     */
    public function getModifiedAt();

    /**
     * @param  string $modifiedBy
     * @return Emails
     */
    public function setModifiedBy($modifiedBy);

    /**
     * @return string
     */
    public function getModifiedBy();

    /**
     * @param  boolean $disabled
     * @return Plans
     */
    public function setDisabled($disabled);

    /**
     * @return boolean
     */
    public function getDisabled();
    
    /**
     * @param  string $email
     * @return Emails
     */
    public function setEmail($email);
    
    /**
     * @return string
     */
    public function getEmail();
    
    /**
     * @param  integer $customerId
     * @return Emails
     */
    public function setCustomerId(\SmartAccounts\Entity\Customer $customerId);
    
    /**
     * @return integer
     */
    public function getCustomerId();
    
    /**
     * @return integer
     */
    public function getEmailId();
    
}
