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
            'name'    => 'login',
            'options' => array(
                'label' => 'Login',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a Login',
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
            'name'    => 'name',
            'options' => array(
                'label' => 'Name',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a Name',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'address',
            'options' => array(
                'label' => 'Address',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter in Your Address',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'city',
            'options' => array(
                'label' => 'City',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter in Your City',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'state',
            'options' => array(
                'label' => 'State',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter in Your State',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'zip',
            'options' => array(
                'label' => 'Zip',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter in Zip',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'notificationFree',
            'options' => array(
                'label'         => 'Notification Free',
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
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'notificationGrade',
            'options' => array(
                'label'         => 'Notification Grade',
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
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'downloadReady',
            'options' => array(
                'label'         => 'Download Ready',
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
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'downloadUrl',
            'options' => array(
                'label' => 'Download Url',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter in your download url',
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
