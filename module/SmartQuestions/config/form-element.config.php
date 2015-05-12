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
        'SmartQuestions\Form\GradeForm'                             	=> 'SmartQuestions\Form\Factory\GradeFormFactory',
        'SmartQuestions\Form\QuestionForm'                             	=> 'SmartQuestions\Form\Factory\QuestionFormFactory',
        'SmartQuestions\Form\SubjectForm'                             	=> 'SmartQuestions\Form\Factory\SubjectFormFactory',
        'SmartQuestions\Form\ResultForm'                             	=> 'SmartQuestions\Form\Factory\ResultFormFactory',
        'SmartQuestions\Form\Fieldset\GradeFieldset'                	=> 'SmartQuestions\Form\Fieldset\Factory\GradeFieldsetFactory',
        'SmartQuestions\Form\Fieldset\QuestionFieldset'                	=> 'SmartQuestions\Form\Fieldset\Factory\QuestionFieldsetFactory',
        'SmartQuestions\Form\Fieldset\SubjectFieldset'                	=> 'SmartQuestions\Form\Fieldset\Factory\SubjectFieldsetFactory',
        'SmartQuestions\Form\Fieldset\ResultFieldset'                	=> 'SmartQuestions\Form\Fieldset\Factory\ResultFieldsetFactory',
    ),
);
