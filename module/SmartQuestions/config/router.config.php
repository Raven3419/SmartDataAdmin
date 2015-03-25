<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartQuestions
 *
 * @category   Zend
 * @package    SmartQuestions
 * @subpackage Config
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartQuestions;

return array(
    'router' => array(
        'routes' => array(
            'rocket-admin' => array(
                'child_routes' => array(
                    'education' => array(
                        'type'    => 'Zend\Mvc\Router\Http\Literal',
                        'options' => array(
                            'route'    => '/education',
                            'defaults' => array(
                                'controller' => 'SmartQuestions\Controller\Grades',
                                'action'     => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes'  => array(
                            'grades' => array(
                                'type'    => 'Zend\Mvc\Router\Http\Literal',
                                'options' => array(
                                    'route'    => '/grades',
                                    'defaults' => array(
                                        'controller' => 'SmartQuestions\Controller\Grades',
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
                                                'controller' => 'SmartQuestions\Controller\Grades',
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
                                                'controller' => 'SmartQuestions\Controller\Grades',
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
                                                'controller' => 'SmartQuestions\Controller\Grades',
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
                                                'controller' => 'SmartQuestions\Controller\Grades',
                                                'action'     => 'view',
                                                'id'         => 0,
                                            ),
                                        ),
                                        'may_terminate' => true,
                                    ),
                                ),
                            ),
                            'questions' => array(
                                'type'    => 'Zend\Mvc\Router\Http\Literal',
                                'options' => array(
                                    'route'    => '/questions',
                                    'defaults' => array(
                                        'controller' => 'SmartQuestions\Controller\Questions',
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
                                                'controller' => 'SmartQuestions\Controller\Questions',
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
                                                'controller' => 'SmartQuestions\Controller\Questions',
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
                                                'controller' => 'SmartQuestions\Controller\Questions',
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
                                                'controller' => 'SmartQuestions\Controller\Questions',
                                                'action'     => 'view',
                                                'id'         => 0,
                                            ),
                                        ),
                                        'may_terminate' => true,
                                    ),
                                ),
                            ),
                            'subjects' => array(
                           		'type'    => 'Zend\Mvc\Router\Http\Literal',
                           		'options' => array(
                            		'route'    => '/subjects',
                            		'defaults' => array(
                            			'controller' => 'SmartQuestions\Controller\Subjects',
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
                            					'controller' => 'SmartQuestions\Controller\Subjects',
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
                            					'controller' => 'SmartQuestions\Controller\Subjects',
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
                            					'controller' => 'SmartQuestions\Controller\Subjects',
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
                            					'controller' => 'SmartQuestions\Controller\Subjects',
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
