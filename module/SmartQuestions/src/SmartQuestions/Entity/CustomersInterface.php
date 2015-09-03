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
 * Customers interface
 */
interface CustomersInterface
{
    /**
     * @param  \DateTime $createdAt
     * @return Questions
     */
    public function setCreatedAt($createdAt);

    /**
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * @param  string $createdBy
     * @return Questions
     */
    public function setCreatedBy($createdBy);

    /**
     * @return string
     */
    public function getCreatedBy();

    /**
     * @param  \DateTime $modifiedAt
     * @return Questions
     */
    public function setModifiedAt($modifiedAt);

    /**
     * @return \DateTime
     */
    public function getModifiedAt();

    /**
     * @param  string $modifiedBy
     * @return Questions
     */
    public function setModifiedBy($modifiedBy);

    /**
     * @return string
     */
    public function getModifiedBy();

    /**
     * @param  boolean $disabled
     * @return Questions
     */
    public function setDisabled($disabled);

    /**
     * @return boolean
     */
    public function getDisabled();

    /**
     * @param  string $textQuestion
     * @return Questions
     */
    public function setTextQuestion($textQuestion);

    /**
     * @return string
     */
    public function getTextQuestion();

    /**
     * @param  string $textCorrectAnswer
     * @return Questions
     */
    public function setTextCorrectAnswer($textCorrectAnswer);

    /**
     * @return string
     */
    public function getTextCorrectAnswer();

    /**
     * @param  string $textOptionOne
     * @return Questions
     */
    public function setTextOptionOne($textOptionOne);

    /**
     * @return string
     */
    public function getTextOptionOne();

    /**
     * @param  string $textOptionTwo
     * @return Questions
     */
    public function setTextOptionTwo($textOptionTwo);

    /**
     * @return string
     */
    public function getTextOptionTwo();

    /**
     * @param  string $textOptionThree
     * @return Questions
     */
    public function setTextOptionThree($textOptionThree);

    /**
     * @return string
     */
    public function getTextOptionThree();

    /**
     * @param  string $images
     * @return Questions
     */
    public function setImages($images);

    /**
     * @return string
     */
    public function getImages();

    /**
     * @param  string $paragraph
     * @return Questions
     */
    public function setParagraph($paragraph);

    /**
     * @return string
     */
    public function getParagraph();

    /**
     * @param  string $isImage
     * @return Questions
     */
    public function setIsImage($isImage);

    /**
     * @return string
     */
    public function getIsImage();

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
     * @return integer
     */
    public function getCustomerQuestionId();

}
