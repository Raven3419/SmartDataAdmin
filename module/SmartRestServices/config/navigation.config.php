<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartRestServices
 *
 * @category   Zend
 * @package    SmartRestServices
 * @subpackage Config
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartRestServices;

return array(
    'navigation' => array(
        'admin' => array(
            array(
                'label'      => 'REST',
                'route'      => 'rocket-admin/rest',
                'permission' => 'SmartRestServices\Controller\Customer:index',
                'icon'       => 'icon-cogs',
            	'visible'    => true,
                'order'      => 1400,
                'pages'      => array(
                    array(
                        'label'      => 'Customer',
                        'route'      => 'rocket-admin/rest/customer',
                        'permission' => 'SmartRestServices\Controller\Customer:index',
                        'order'      => 1401,
                        'pages'      => array(
                            array(
                                'label'           => 'Create Customer',
                                'route'           => 'rocket-admin/rest/customer/create',
                                'permission'      => 'SmartRestServices\Controller\Customer:create',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'Edit Customer',
                                'route'           => 'rocket-admin/rest/customer/edit',
                                'permission'      => 'SmartRestServices\Controller\Customer:edit',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'View Customer',
                                'route'           => 'rocket-admin/rest/customer/view',
                                'permission'      => 'SmartRestServices\Controller\Customer:view',
                                'use_route_match' => true,
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
