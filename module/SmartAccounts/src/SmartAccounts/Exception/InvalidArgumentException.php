<?php
/**
 * Reliv Common's Invalid Argument Exception
 *
 * This file contains the methods to throw an SPL invalid argument exception
 * from with in the Reliv Common Module
 *
 * PHP version 5.3
 *
 * LICENSE: No License yet
 *
 * @category  Reliv
 * @package   SmartAccounts\Exception
 * @author    Raven Sampson <rsampson@thesmartdata.com>
 * @copyright 2012 Reliv International
 * @license   License.txt New BSD License
 * @version   GIT: <git_id>
 * @link      http://ci.reliv.com/confluence
 */
namespace SmartAccounts\Exception;

/**
 * Reliv Common's Invalid Argument Exception
 *
 * This file contains the methods to throw an SPL invalid argument exception
 * from with in the Reliv Common Module
 *
 * @category  Reliv
 * @package   SmartAccounts\Exception
 * @author    Raven Sampson <rsampson@thesmartdata.com>
 * @copyright 2012 Reliv International
 * @license   License.txt New BSD License
 * @version   Release: 1.0
 * @link      http://ci.reliv.com/confluence
 */
class InvalidArgumentException
    extends \InvalidArgumentException
    implements \SmartAccounts\Exception\ExceptionInterface
{

}
