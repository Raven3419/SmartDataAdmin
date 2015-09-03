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
    'navigation' => array(
        'admin' => array(
            array(
                'label'      => 'Education',
                'route'      => 'rocket-admin/education',
                'permission' => 'SmartQuestions\Controller\Changesets:index',
                'icon'       => 'icon-cogs',
            	'visible'    => true,
                'order'      => 500,
                'pages'      => array(
                    array(
                        'label'      => 'Grades',
                        'route'      => 'rocket-admin/education/grades',
                        'permission' => 'SmartQuestions\Controller\Grades:index',
                        'order'      => 501,
                        'pages'      => array(
                            array(
                                'label'           => 'Create Grade',
                                'route'           => 'rocket-admin/education/grades/create',
                                'permission'      => 'SmartQuestions\Controller\Grades:create',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'Edit Grade',
                                'route'           => 'rocket-admin/education/grades/edit',
                                'permission'      => 'SmartQuestions\Controller\Grades:edit',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'View Grade',
                                'route'           => 'rocket-admin/education/grades/view',
                                'permission'      => 'SmartQuestions\Controller\Grades:view',
                                'use_route_match' => true,
                            ),
                        ),
                    ),
                	array(
                		'label'      => 'Subjects',
                		'route'      => 'rocket-admin/education/subjects',
             			'permission' => 'SmartQuestions\Controller\Subjects:index',
                		'order'      => 502,
              			'pages'      => array(
                			array(
                				'label'           => 'Create Subject',
                				'route'           => 'rocket-admin/education/subjects/create',
                				'permission'      => 'SmartQuestions\Controller\Subjects:create',
                				'use_route_match' => true,
                			),
                			array(
                				'label'           => 'Edit Subject',
                				'route'           => 'rocket-admin/education/subjects/edit',
                				'permission'      => 'SmartQuestions\Controller\Subjects:edit',
                				'use_route_match' => true,
                			),
                			array(
               					'label'           => 'View Subject',
                				'route'           => 'rocket-admin/education/subjects/view',
                				'permission'      => 'SmartQuestions\Controller\Subjects:view',
                				'use_route_match' => true,
                			),
                		),
                	),
                	array(
                		'label'      => 'Middle School',
                		'route'      => 'rocket-admin/education/questions',
             			'permission' => 'SmartQuestions\Controller\Questions:index',
                		'order'      => 503,
              			'pages'      => array(
                			array(
                				'label'           => 'Create Question',
                				'route'           => 'rocket-admin/education/questions/create',
                				'permission'      => 'SmartQuestions\Controller\Questions:create',
                				'use_route_match' => true,
                			),
                			array(
                				'label'           => 'Edit Question',
                				'route'           => 'rocket-admin/education/questions/edit',
                				'permission'      => 'SmartQuestions\Controller\Questions:edit',
                				'use_route_match' => true,
                			),
                			array(
               					'label'           => 'View Question',
                				'route'           => 'rocket-admin/education/questions/view',
                				'permission'      => 'SmartQuestions\Controller\Questions:view',
                				'use_route_match' => true,
                			),
                		),
                	),
                	array(
                		'label'      => 'Customer',
                		'route'      => 'rocket-admin/education/customers',
             			'permission' => 'SmartQuestions\Controller\Customers:index',
                		'order'      => 504,
              			'pages'      => array(
                			array(
                				'label'           => 'Create Question',
                				'route'           => 'rocket-admin/education/customers/create',
                				'permission'      => 'SmartQuestions\Controller\Customers:create',
                				'use_route_match' => true,
                			),
                			array(
                				'label'           => 'Edit Question',
                				'route'           => 'rocket-admin/education/customers/edit',
                				'permission'      => 'SmartQuestions\Controller\Customers:edit',
                				'use_route_match' => true,
                			),
                			array(
               					'label'           => 'View Question',
                				'route'           => 'rocket-admin/education/customers/view',
                				'permission'      => 'SmartQuestions\Controller\Customers:view',
                				'use_route_match' => true,
                			),
                		),
                	),
                    array(
                        'label'      => 'Results',
                        'route'      => 'rocket-admin/education/results',
                        'permission' => 'SmartQuestions\Controller\Results:index',
                        'order'      => 505,
                        'pages'      => array(
                            array(
                                'label'           => 'Create Result',
                                'route'           => 'rocket-admin/education/results/create',
                                'permission'      => 'SmartQuestions\Controller\Results:create',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'Edit Result',
                                'route'           => 'rocket-admin/education/results/edit',
                                'permission'      => 'SmartQuestions\Controller\Results:edit',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'View Result',
                                'route'           => 'rocket-admin/education/results/view',
                                'permission'      => 'SmartQuestions\Controller\Results:view',
                                'use_route_match' => true,
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
