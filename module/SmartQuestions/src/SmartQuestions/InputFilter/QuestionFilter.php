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
 * Base input filter for the {@see QuestionFieldset}.
 */
class QuestionFilter extends InputFilter
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
            'name'     => 'questionId',
            'required' => false
        ));
        
        $this->add(array(
            'name'     => 'schoolId',
            'required' => false
        ));
        
        $this->add(array(
            'name'     => 'isImage',
            'required' => false,
        	'allow_empty'	=> true,
          	'filters'     => array(array('name' => 'Zend\Filter\Null'))
        ));

       $this->add(array(
          'name'        => 'gradeId',
          'required'    => true,
          'allow_empty' => false,
          'filters'     => array(array('name' => 'Zend\Filter\Null'))
       ));

       $this->add(array(
          'name'        => 'subjectId',
          'required'    => true,
          'allow_empty' => false,
          'filters'     => array(array('name' => 'Zend\Filter\Null'))
       ));

        $this->add(array(
            'name'       	=> 'textQuestion',
            'required'   	=> false,
          	'allow_empty' 	=> true,
            'filters'   	 => array(array('name' => 'StringTrim'))
        ));

        $this->add(array(
            'name'       	=> 'textCorrectAnswer',
            'required'   	=> false,
          	'allow_empty' 	=> true,
            'filters'    	=> array(array('name' => 'StringTrim'))
        ));

        $this->add(array(
            'name'       	=> 'textOptionOne',
            'required'   	=> false,
          	'allow_empty' 	=> true,
            'filters'    	=> array(array('name' => 'StringTrim'))
        ));

        $this->add(array(
            'name'       	=> 'textOptionTwo',
            'required'   	=> false,
          	'allow_empty' 	=> true,
            'filters'    	=> array(array('name' => 'StringTrim'))
        ));

        $this->add(array(
            'name'       	=> 'textOptionThree',
            'required'   	=> false,
          	'allow_empty' 	=> true,
            'filters'    	=> array(array('name' => 'StringTrim'))
        ));

        $this->add(array(
            'name'       	=> 'images',
            'required'   	=> false,
          	'allow_empty' 	=> true,
            'filters'    	=> array(array('name' => 'StringTrim'))
        ));

        $this->add(array(
            'name'       	=> 'paragraph',
            'required'   	=> false,
          	'allow_empty' 	=> true,
            'filters'    	=> array(array('name' => 'StringTrim'))
        ));

        $this->add(array(
            'name'       	=> 'helpId',
            'required'   	=> false,
          	'allow_empty' 	=> true,
            'filters'    	=> array(array('name' => 'StringTrim'))
        ));

        $this->add(array(
            'name'       	=> 'youtube',
            'required'   	=> false,
          	'allow_empty' 	=> true,
            'filters'   	 => array(array('name' => 'StringTrim'))
        ));
        
        $this->add(array(
            'name'     => 'disabled',
            'required' => true,
        ));

    }
}
