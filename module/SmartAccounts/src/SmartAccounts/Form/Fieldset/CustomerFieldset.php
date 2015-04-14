<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartAccounts\Form
 * @subpackage Fieldset
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace SmartAccounts\Form\Fieldset;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

/**
 * Customer fieldset for admin module
 *
 * @category   Zend
 * @package    SmartAccounts\Form
 * @subpackage Fieldset
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 */
class CustomerFieldset extends Fieldset
{
    /**
     * Constructor
     *
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('customer-fieldset');

        $this->setHydrator(new DoctrineHydrator($objectManager, 'SmartAccounts\Entity\Customer'));

        $this->add(array(
            'type' => 'Zend\Form\Element\Hidden',
            'name' => 'customerId',
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'email',
            'options' => array(
                'label' => 'Email',
            ),
            'attributes' => array(
                'required'    => 'required',
                'class'       => 'validate[required] span12',
                'placeholder' => 'Enter a Email',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Password',
            'name'    => 'password',
            'options' => array(
                'label' => 'Password',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Hidden for security',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'firstName',
            'options' => array(
                'label' => 'First Name',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a First Name',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'lastName',
            'options' => array(
                'label' => 'Last Name',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a Last Name',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'parentEmail',
            'options' => array(
                'label' => 'Parent Email',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter in Parent Email',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'parentFirstName',
            'options' => array(
                'label' => 'Parent First Name',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter in Parent First Name',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'parentLastName',
            'options' => array(
                'label' => 'Parent Last Name',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter in Parent Last Name',
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
