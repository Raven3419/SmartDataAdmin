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
 * Accounts
 *
 * @see AccountsInterface
 */
class Accounts implements AccountsInterface
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
     * @var string
     */
    protected $token;
    
    /**
     *  @var integer
     */
    protected $status;
    
    /**
     *  @var integer
     */
    protected $planId;
    
    /**
     *  @var integer
     */
    protected $processingPlanId;
    
    /**
     *  @var integer
     */
    protected $accountId;
    
    /**
     *  @var integer
     */
    protected $customerId;


    /**
     * Set createdAt
     *
     * @param  \DateTime $createdAt
     * @return Accounts
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
     * @return Accounts
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
     * @return Accounts
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
     * @return Accounts
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
     * Set token
     *
     * @param  string token
     * @return Accounts
     */
    public function setToken($token)
    {
        $this->token = $token;

        return $this;
    }

    /**
     * Get token
     *
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Set status
     *
     * @param  integer $status
     * @return Accounts
     */
    public function setStatus($status)
    {
    	$this->status = $status;
    
    	return $this;
    }
    
    /**
     * Get status
     *
     * @return integer
     */
    public function getStatus()
    {
    	return $this->status;
    }

    /**
     * Set productId
     *
     * @param  integer $planId
     * @return Accounts
     */
    public function setPlanId(\SmartAccounts\Entity\Plans $planId = null)
    {
    	$this->planId = $planId;
    
    	return $this;
    }
    
    /**
     * Get planId
     *
     * @return integer
     */
    public function getPlanId()
    {
    	return $this->planId;
    }
    
    /**
     * Get processingPlanId
     *
     * @return integer
     */
    public function getProcessingPlanId()
    {
    	return $this->processingPlanId;
    }

    /**
     * Set processingPlanId
     *
     * @param  integer $processingPlanId
     * @return Accounts
     */
    public function setProcessingPlanId(\SmartAccounts\Entity\Plans $processingPlanId = null)
    {
    	$this->processingPlanId = $processingPlanId;
    
    	return $this;
    }

    /**
     * Set customerId
     *
     * @param  \SmartAccounts\Entity\Customer $customerId
     * @return Accounts
     */
    public function setCustomerId(\SmartAccounts\Entity\Customer $customerId = null)
    {
    	$this->customerId = $customerId;
    
    	return $this;
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
     * Get accountId
     *
     * @return integer
     */
    public function getAccountId()
    {
        return $this->accountId;
    }

}
