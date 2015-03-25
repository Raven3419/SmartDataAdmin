<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartQuestions\Form
 * @subpackage Fieldset
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace SmartQuestions\Form\Fieldset;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use SmartQuestions\Entity\Grades;

/**
 * Question fieldset for admin module
 *
 * @category   Zend
 * @package    SmartQuestions\Form
 * @subpackage Fieldset
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 */
class QuestionFieldset extends Fieldset
{
    /**
     * Constructor
     *
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('question-fieldset');

        $this->setHydrator(new DoctrineHydrator($objectManager, 'SmartQuestions\Entity\Questions'));

        $this->add(array(
            'type' => 'Zend\Form\Element\Hidden',
            'name' => 'questionId',
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'isImage',
            'options' => array(
                'label'         => 'Is the Question an Image',
                'value_options' => array(
                    '0' => 'No',
                    '1'  => 'Yes',
                ),
            ),
            'attributes' => array(
                'required' => 'required',
                'class'    => 'select',
            ),
        ));

         $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'gradeId',
            'options' => array(
                'label' => 'Grade',
                'object_manager' => $objectManager,
                'target_class' => 'SmartQuestions\Entity\Grades',
                'property' => 'name',
                'empty_option' => '---please choose---',
            ),
            'attributes' => array(
                'required' => false,
                'class'    => 'select',
            ),
        ));

         $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'subjectId',
            'options' => array(
                'label' => 'Subject',
                'object_manager' => $objectManager,
                'target_class' => 'SmartQuestions\Entity\Subjects',
                'property' => 'name',
                'empty_option' => '---please choose---',
            ),
            'attributes' => array(
                'required' => false,
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Textarea',
            'name'    => 'textQuestion',
            'options' => array(
                'label' => 'Text Question',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a Question',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'textCorrectAnswer',
            'options' => array(
                'label' => 'Text Correct Answer',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a Correct Answer',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'textOptionOne',
            'options' => array(
                'label' => 'Text Option One',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a Option One',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'textOptionTwo',
            'options' => array(
                'label' => 'Text Option Two',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a Option Two',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'textOptionThree',
            'options' => array(
                'label' => 'Text Option Three',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a Option Three',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'imageQuestion',
            'options' => array(
                'label' => 'Image Question',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a Question Image',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'imageCorrectAnswer',
            'options' => array(
                'label' => 'Image Correct Answer',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a Correct Answer Image',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'imageOptionOne',
            'options' => array(
                'label' => 'Image Option One',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a Option One Image',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'imageOptionTwo',
            'options' => array(
                'label' => 'Image Option Two',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a Option Two Image',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'imageOptionThree',
            'options' => array(
                'label' => 'Image Option Three',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a Option Three Image',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'disabled',
            'options' => array(
                'label'         => 'Disabled',
                'value_options' => array(
                    '0' => 'No',
                    '1'  => 'Yes',
                ),
            ),
            'attributes' => array(
                'required' => 'required',
                'class'    => 'select',
            ),
        ));
        
        // Brand fieldset
        $grade = new GradeFieldset($objectManager);
        $this->add($grade);
    }
}
