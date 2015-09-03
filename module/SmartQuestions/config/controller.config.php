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
    'factories' => array(
        'SmartQuestions\Controller\Grades'               => 'SmartQuestions\Controller\Factory\GradesControllerFactory',
        'SmartQuestions\Controller\Questions'            => 'SmartQuestions\Controller\Factory\QuestionsControllerFactory',
    	'SmartQuestions\Controller\Subjects'             => 'SmartQuestions\Controller\Factory\SubjectsControllerFactory',
    	'SmartQuestions\Controller\Results'              => 'SmartQuestions\Controller\Factory\ResultsControllerFactory',
        'SmartQuestions\Controller\Customers'    		 => 'SmartQuestions\Controller\Factory\CustomersControllerFactory',
    ),
);
