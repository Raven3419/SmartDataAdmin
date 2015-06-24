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
        'SmartAccounts\InputFilter\AccountsFilter'                => 'SmartAccounts\InputFilter\Factory\AccountsFilterFactory',
        'SmartAccounts\InputFilter\CustomerFilter'                => 'SmartAccounts\InputFilter\Factory\CustomerFilterFactory',
        'SmartAccounts\InputFilter\PlansFilter'                	  => 'SmartAccounts\InputFilter\Factory\PlansFilterFactory',
        'SmartAccounts\InputFilter\EmailsFilter'                  => 'SmartAccounts\InputFilter\Factory\EmailsFilterFactory',
    ),
);
