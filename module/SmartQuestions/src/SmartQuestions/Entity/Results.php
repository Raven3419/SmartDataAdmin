<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartQuestions
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartQuestions
 * @subpackage Entity
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartQuestions\Entity;

/**
 * Results
 *
 * @see ResultsInterface
 */
class Results implements ResultsInterface
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
    protected $status;

    /**
     * @var \SmartAccounts\Entity\Customer
     */
    protected $customerId;

    /**
     * @var \SmartQuestions\Entity\Questions
     */
    protected $questionId;

    /**
     * @var integer
     */
    protected $resultId;

    /**
     * Set createdAt
     *
     * @param  \DateTime $createdAt
     * @return Results
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
     * @return Results
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
     * @return Results
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
     * @return Results
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
     * @return Results
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
     * Set status
     *
     * @param  string $status
     * @return Results
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set customerId
     *
     * @param  \SmartAccounts\Entity\Customer $customerId
     * @return Customer
     */
    public function setCustomerId(\SmartAccounts\Entity\Customer $customerId = null)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * Get customerId
     *
     * @return \SmartAccounts\Entity\Customer
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * Set questionId
     *
     * @param  \SmartQuestions\Entity\Questions $questionId
     * @return Customer
     */
    public function setQuestionId(\SmartQuestions\Entity\Questions $questionId = null)
    {
        $this->questionId = $questionId;

        return $this;
    }

    /**
     * Get questionId
     *
     * @return \SmartQuestions\Entity\Questions
     */
    public function getQuestionId()
    {
        return $this->questionId;
    }
    
    /**
     * Get resultId
     *
     * @return integer
     */
    public function getResultId()
    {
        return $this->resultId;
    }

}
