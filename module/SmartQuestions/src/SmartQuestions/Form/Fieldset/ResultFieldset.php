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

/**
 * Result fieldset for admin module
 *
 * @category   Zend
 * @package    SmartQuestions\Form
 * @subpackage Fieldset
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 */
class ResultFieldset extends Fieldset
{
    /**
     * Constructor
     *
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('result-fieldset');

        $this->setHydrator(new DoctrineHydrator($objectManager, 'SmartQuestions\Entity\Results'));

        $this->add(array(
            'type' => 'Zend\Form\Element\Hidden',
            'name' => 'resultId',
        ));

         $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'customerId',
            'options' => array(
                'label' => 'Customer',
                'object_manager' => $objectManager,
                'target_class' => 'SmartAccounts\Entity\Customer',
                'property' => 'email',
                'empty_option' => '---please choose---',
            ),
            'attributes' => array(
                'required' => false,
                'class'    => 'select',
            ),
        ));

         $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'questionId',
            'options' => array(
                'label' => 'Question',
                'object_manager' => $objectManager,
                'target_class' => 'SmartQuestions\Entity\Questions',
                'property' => 'textQuestion',
                'empty_option' => '---please choose---',
            ),
            'attributes' => array(
                'required' => false,
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'status',
            'options' => array(
                'label'         => 'Status',
                'value_options' => array(
                    '0' => 'Incorrect',
                    '1'  => 'Correct',
                ),
            ),
            'attributes' => array(
                'required' => 'required',
                'class'    => 'select',
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
    }
}
