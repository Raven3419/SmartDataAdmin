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
    'router' => array(
        'routes' => array(
            'rocket-admin' => array(
                'child_routes' => array(
                    'accounts' => array(
                        'type'    => 'Zend\Mvc\Router\Http\Literal',
                        'options' => array(
                            'route'    => '/accounts',
                            'defaults' => array(
                                'controller' => 'SmartAccounts\Controller\Customer',
                                'action'     => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes'  => array(
                        	'accounts' => array(
                        		'type'    => 'Zend\Mvc\Router\Http\Literal',
                        		'options' => array(
                        			'route'    => '/accounts',
                        			'defaults' => array(
                        				'controller' => 'SmartAccounts\Controller\Accounts',
                        				'action'     => 'index',
                        			),
                        		),
                        		'may_terminate' => true,
                        		'child_routes' => array(
                        			'edit' => array(
                        				'type'    => 'Zend\Mvc\Router\Http\Segment',
                        				'options' => array(
                        					'route'       => '/edit/:id',
                        					'constraints' => array(
                        						'id' => '[0-9]*',
                        					),
                        					'defaults'    => array(
                        						'controller' => 'SmartAccounts\Controller\Accounts',
                        						'action'     => 'edit',
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
                        						'controller' => 'SmartAccounts\Controller\Accounts',
                        						'action'     => 'view',
                        						'id'         => 0,
                        					),
                        				),
                        				'may_terminate' => true,
                        			),
                        		),
                        	),
                        	'plans' => array(
                        		'type'    => 'Zend\Mvc\Router\Http\Literal',
                        		'options' => array(
                        			'route'    => '/plans',
                        			'defaults' => array(
                        				'controller' => 'SmartAccounts\Controller\Plans',
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
	                                       		'controller' => 'SmartAccounts\Controller\Plans',
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
                        						'controller' => 'SmartAccounts\Controller\Plans',
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
	                                       		'controller' => 'SmartAccounts\Controller\Plans',
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
                        						'controller' => 'SmartAccounts\Controller\Plans',
                        						'action'     => 'view',
                        						'id'         => 0,
                        					),
                        				),
                        				'may_terminate' => true,
                        			),
                        		),
                        	),
                        	'emails' => array(
                        		'type'    => 'Zend\Mvc\Router\Http\Literal',
                        		'options' => array(
                        			'route'    => '/emails',
                        			'defaults' => array(
                        				'controller' => 'SmartAccounts\Controller\Emails',
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
	                                       		'controller' => 'SmartAccounts\Controller\Emails',
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
                        						'controller' => 'SmartAccounts\Controller\Emails',
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
	                                       		'controller' => 'SmartAccounts\Controller\Emails',
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
                        						'controller' => 'SmartAccounts\Controller\Emails',
                        						'action'     => 'view',
                        						'id'         => 0,
                        					),
                        				),
                        				'may_terminate' => true,
                        			),
                        		),
                        	),
	                        'customer' => array(
	                        	'type'    => 'Zend\Mvc\Router\Http\Literal',
	                            'options' => array(
	                            	'route'    => '/customer',
	                                'defaults' => array(
	                                 	'controller' => 'SmartAccounts\Controller\Customer',
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
	                                       		'controller' => 'SmartAccounts\Controller\Customer',
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
	                                        	'controller' => 'SmartAccounts\Controller\Customer',
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
	                                       		'controller' => 'SmartAccounts\Controller\Customer',
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
	                              				'controller' => 'SmartAccounts\Controller\Customer',
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
