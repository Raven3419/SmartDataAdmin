<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartQuestions
 *
 * @category   Zend
 * @package    SmartQuestions
 * @subpackage InputFilter
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartQuestions\InputFilter;

use SmartQuestions\Options\SmartQuestionsOptionsInterface;
use Doctrine\Common\Persistence\ObjectRepository;
use Zend\Validator\ValidatorInterface;
use Zend\InputFilter\InputFilter;

/**
 * Base input filter for the {@see GradeFieldset}.
 */
class GradeFilter extends InputFilter
{
    /**
     * @param ObjectRepository     $objectRepository
     * @param UserOptionsInterface $options
     */
    public function __construct(
        ObjectRepository             $objectRepository,
        SmartQuestionsOptionsInterface $options
    )
    {
        $this->add(array(
            'name'     => 'gradeId',
            'required' => false
        ));

        $this->add(array(
            'name'       => 'name',
            'required'   => true,
            'filters'    => array(array('name' => 'StringTrim')),
            'validators' => array(
                array(
                    'name'    => 'NotEmpty',
                    'options' => array('type' => 'string')
                ),
            ),
        ));
        
        $this->add(array(
            'name'     => 'disabled',
            'required' => true,
        ));

    }
}
