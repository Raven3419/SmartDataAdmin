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
    'navigation' => array(
        'admin' => array(
            array(
                'label'      => 'Accounts',
                'route'      => 'rocket-admin/accounts',
                'permission' => 'SmartAccounts\Controller\Customer:index',
                'icon'       => 'icon-cogs',
            	'visible'    => true,
                'order'      => 300,
                'pages'      => array(
                    array(
                        'label'      => 'Customer',
                        'route'      => 'rocket-admin/accounts/customer',
                        'permission' => 'SmartAccounts\Controller\Customer:index',
                        'order'      => 301,
                        'pages'      => array(
                            array(
                                'label'           => 'Create Customer',
                                'route'           => 'rocket-admin/accounts/customer/create',
                                'permission'      => 'SmartAccounts\Controller\Customer:create',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'Edit Customer',
                                'route'           => 'rocket-admin/accounts/customer/edit',
                                'permission'      => 'SmartAccounts\Controller\Customer:edit',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'View Customer',
                                'route'           => 'rocket-admin/education/customer/view',
                                'permission'      => 'SmartAccounts\Controller\Customer:view',
                                'use_route_match' => true,
                            ),
                        ),
                    ),
                    array(
                        'label'      => 'Plans',
                        'route'      => 'rocket-admin/accounts/plans',
                        'permission' => 'SmartAccounts\Controller\Plans:index',
                        'order'      => 302,
                        'pages'      => array(
                            array(
                                'label'           => 'Create Plans',
                                'route'           => 'rocket-admin/accounts/plans/create',
                                'permission'      => 'SmartAccounts\Controller\Plans:create',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'Edit Plans',
                                'route'           => 'rocket-admin/accounts/plans/edit',
                                'permission'      => 'SmartAccounts\Controller\Plans:edit',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'View Plans',
                                'route'           => 'rocket-admin/education/plans/view',
                                'permission'      => 'SmartAccounts\Controller\Plans:view',
                                'use_route_match' => true,
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
