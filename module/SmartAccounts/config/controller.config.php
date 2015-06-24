<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartAccounts
 *
 * @category   Zend
 * @package    SmartAccounts
 * @subpackage Config
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartAccounts;

return array(
    'factories' => array(
        'SmartAccounts\Controller\Accounts'		=> 'SmartAccounts\Controller\Factory\AccountsControllerFactory',
        'SmartAccounts\Controller\Customer'		=> 'SmartAccounts\Controller\Factory\CustomerControllerFactory',
        'SmartAccounts\Controller\Plans'		=> 'SmartAccounts\Controller\Factory\PlansControllerFactory',
        'SmartAccounts\Controller\Emails'		=> 'SmartAccounts\Controller\Factory\EmailsControllerFactory',
    ),
);
