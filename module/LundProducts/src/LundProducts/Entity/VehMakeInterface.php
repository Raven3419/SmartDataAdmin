<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * LundProducts
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundProducts\Entity
 * @subpackage Interface
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace LundProducts\Entity;

/**
 * VehMake interface
 */
interface VehMakeInterface
{
    /**
     * @param  string  $name
     * @return VehMake
     */
    public function setName($name);

    /**
     * @return string
     */
    public function getName();

    /**
     * @param  string  $shortCode
     * @return VehMake
     */
    public function setShortCode($shortCode);

    /**
     * @return string
     */
    public function getShortCode();

    /**
     * @return integer
     */
    public function getVehMakeId();
}
