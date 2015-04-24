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
    'router' => array(
        'routes' => array(
            'rocket-admin' => array(
                'child_routes' => array(
                    'rest' => array(
                        'type'    => 'Zend\Mvc\Router\Http\Literal',
                        'options' => array(
                            'route'    => '/rest',
                            'defaults' => array(
                                'controller' => 'SmartRestServices\Controller\Customer',
                                'action'     => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes'  => array(
                            'customer' => array(
                                'type'    => 'Zend\Mvc\Router\Http\Literal',
                                'options' => array(
                                    'route'    => '/customer',
                                    'defaults' => array(
                                        'controller' => 'SmartRestServices\Controller\Customer',
                                        'action'     => 'index',
                                    ),
                                ),
                                'may_terminate' => true,
                                'child_routes' => array(
                                    'create' => array(
                                        'type'    => 'Zend\Mvc\Router\Http\Literal',
                                        'options' => array(
                                            'route'    => '/create',
                                            'defaults' => array(
                                                'controller' => 'SmartRestServices\Controller\Customer',
                                                'action'     => 'create',
                                            ),
                                        ),
                                    ),
                                    'edit' => array(
                                        'type'    => 'Zend\Mvc\Router\Http\Segment',
                                        'options' => array(
                                            'route'       => '/edit/:id',
                                            'constraints' => array(
                                                'id' => '[0-9]*',
                                            ),
                                            'defaults'    => array(
                                                'controller' => 'SmartRestServices\Controller\Customer',
                                                'action'     => 'edit',
                                                'id'         => 0,
                                            ),
                                        ),
                                    ),
                                    'delete' => array(
                                        'type'    => 'Zend\Mvc\Router\Http\Segment',
                                        'options' => array(
                                            'route'       => '/delete/:id',
                                            'constraints' => array(
                                                'id' => '[0-9]*',
                                            ),
                                            'defaults'    => array(
                                                'controller' => 'SmartRestServices\Controller\Customer',
                                                'action'     => 'delete',
                                                'id'         => 0,
                                            ),
                                        ),
                                    ),
                                    'view' => array(
                                        'type'    => 'Zend\Mvc\Router\Http\Segment',
                                        'options' => array(
                                            'route'       => '/view/:id',
                                            'constraints' => array(
                                                'id' => '[0-9]*',
                                            ),
                                            'defaults'    => array(
                                                'controller' => 'SmartRestServices\Controller\Customer',
                                                'action'     => 'view',
                                                'id'         => 0,
                                            ),
                                        ),
                                        'may_terminate' => true,
                                    ),
                                ),
                            ),
                       	),
                 	),
                ),
            ),
        ),
    ),
);
