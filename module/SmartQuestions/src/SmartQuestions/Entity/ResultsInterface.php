<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartQuestions
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartQuestions\Entity
 * @subpackage Interface
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartQuestions\Entity;

/**
 * Results interface
 */
interface ResultsInterface
{
    /**
     * @param  \DateTime $createdAt
     * @return Results
     */
    public function setCreatedAt($createdAt);

    /**
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * @param  string $createdBy
     * @return Results
     */
    public function setCreatedBy($createdBy);

    /**
     * @return string
     */
    public function getCreatedBy();

    /**
     * @param  \DateTime $modifiedAt
     * @return Results
     */
    public function setModifiedAt($modifiedAt);

    /**
     * @return \DateTime
     */
    public function getModifiedAt();

    /**
     * @param  string $modifiedBy
     * @return Results
     */
    public function setModifiedBy($modifiedBy);

    /**
     * @return string
     */
    public function getModifiedBy();

    /**
     * @param  boolean $disabled
     * @return Results
     */
    public function setDisabled($disabled);

    /**
     * @return boolean
     */
    public function getDisabled();

    /**
     * @param  string $status
     * @return Results
     */
    public function setStatus($status);

    /**
     * @return string
     */
    public function getStatus();

    /**
     * @param  \SmartAccounts\Entity\Customer $customerId
     * @return Customer
     */
    public function setCustomerId(\SmartAccounts\Entity\Customer $customerId = null);

    /**
     * @return \SmartAccounts\Entity\Customer
     */
    public function getCustomerId();

    /**
     * @param  \SmartQuestions\Entity\Questions $questionId
     * @return Question
     */
    public function setQuestionId(\SmartQuestions\Entity\Questions $questionId = null);

    /**
     * @return \SmartQuestions\Entity\Questions
     */
    public function getQuestionId();

    /**
     * @return integer
     */
    public function getResultId();

}
