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
 * Accounts interface
 */
interface AccountsInterface
{
    /**
     * @param  \DateTime $createdAt
     * @return Accounts
     */
    public function setCreatedAt($createdAt);

    /**
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * @param  string $createdBy
     * @return Accounts
     */
    public function setCreatedBy($createdBy);

    /**
     * @return string
     */
    public function getCreatedBy();

    /**
     * @param  \DateTime $modifiedAt
     * @return Accounts
     */
    public function setModifiedAt($modifiedAt);

    /**
     * @return \DateTime
     */
    public function getModifiedAt();

    /**
     * @param  string $modifiedBy
     * @return Accounts
     */
    public function setModifiedBy($modifiedBy);

    /**
     * @return string
     */
    public function getModifiedBy();
    
    /**
     * @param  integer $status
     * @return Accounts
     */
    public function setStatus($status);
    
    /**
     * @return integer
     */
    public function getStatus();
    
    /**
     * @param  integer $planId
     * @return Accounts
     */
    public function setPlanId(\SmartAccounts\Entity\Plans $planId);
    
    /**
     * @return integer
     */
    public function getPlanId();
    
    /**
     * @param  integer $processingPlanId
     * @return Accounts
     */
    public function setProcessingPlanId(\SmartAccounts\Entity\Plans $processingPlanId);
    
    /**
     * @return integer
     */
    public function getProcessingPlanId();
    
    /**
     * @param  integer $customerId
     * @return Accounts
     */
    public function setCustomerId(\SmartAccounts\Entity\Customer $customerId);
    
    /**
     * @return integer
     */
    public function getCustomerId();
    
    /**
     * @return integer
     */
    public function getAccountId();
    
}
