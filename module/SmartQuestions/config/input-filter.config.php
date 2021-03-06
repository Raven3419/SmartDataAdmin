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
        'SmartQuestions\InputFilter\GradeFilter'                => 'SmartQuestions\InputFilter\Factory\GradeFilterFactory',
        'SmartQuestions\InputFilter\QuestionFilter'             => 'SmartQuestions\InputFilter\Factory\QuestionFilterFactory',
        'SmartQuestions\InputFilter\SubjectFilter'              => 'SmartQuestions\InputFilter\Factory\SubjectFilterFactory',
        'SmartQuestions\InputFilter\ResultFilter'               => 'SmartQuestions\InputFilter\Factory\ResultFilterFactory',
        'SmartQuestions\InputFilter\CustomerFilter'     		=> 'SmartQuestions\InputFilter\Factory\CustomerFilterFactory',
    ),
);
