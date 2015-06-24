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
        'SmartAccounts\Form\AccountsForm'                             	=> 'SmartAccounts\Form\Factory\AccountsFormFactory',
        'SmartAccounts\Form\Fieldset\AccountsFieldset'                	=> 'SmartAccounts\Form\Fieldset\Factory\AccountsFieldsetFactory',
        'SmartAccounts\Form\CustomerForm'                             	=> 'SmartAccounts\Form\Factory\CustomerFormFactory',
        'SmartAccounts\Form\Fieldset\CustomerFieldset'                	=> 'SmartAccounts\Form\Fieldset\Factory\CustomerFieldsetFactory',
        'SmartAccounts\Form\PlansForm'                             		=> 'SmartAccounts\Form\Factory\PlansFormFactory',
        'SmartAccounts\Form\Fieldset\PlansFieldset'                		=> 'SmartAccounts\Form\Fieldset\Factory\PlansFieldsetFactory',
        'SmartAccounts\Form\EmailsForm'                             	=> 'SmartAccounts\Form\Factory\EmailsFormFactory',
        'SmartAccounts\Form\Fieldset\EmailsFieldset'                	=> 'SmartAccounts\Form\Fieldset\Factory\EmailsFieldsetFactory',
    ),
);
