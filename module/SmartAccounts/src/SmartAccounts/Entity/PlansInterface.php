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
 * Plans interface
 */
interface PlansInterface
{
    /**
     * @param  \DateTime $createdAt
     * @return Plans
     */
    public function setCreatedAt($createdAt);

    /**
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * @param  string $createdBy
     * @return Plans
     */
    public function setCreatedBy($createdBy);

    /**
     * @return string
     */
    public function getCreatedBy();

    /**
     * @param  \DateTime $modifiedAt
     * @return Plans
     */
    public function setModifiedAt($modifiedAt);

    /**
     * @return \DateTime
     */
    public function getModifiedAt();

    /**
     * @param  string $modifiedBy
     * @return Plans
     */
    public function setModifiedBy($modifiedBy);

    /**
     * @return string
     */
    public function getModifiedBy();

    /**
     * @param  string $modifiedBy
     * @return Plans
     */
    public function setPlanName($planName);

    /**
     * @return string
     */
    public function getPlanName();

    /**
     * @param  string $modifiedBy
     * @return Plans
     */
    public function setPlanDescription($planDescription);

    /**
     * @return string
     */
    public function getPlanDescription();

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
     * @return integer
     */
    public function getPlanId();

}
