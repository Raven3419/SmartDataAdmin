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
 * Emails fieldset for admin module
 *
 * @category   Zend
 * @package    SmartAccounts\Form
 * @subpackage Fieldset
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 */
class EmailsFieldset extends Fieldset
{
    /**
     * Constructor
     *
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('emails-fieldset');

        $this->setHydrator(new DoctrineHydrator($objectManager, 'SmartAccounts\Entity\Emails'));

        $this->add(array(
            'type' => 'Zend\Form\Element\Hidden',
            'name' => 'emailId',
        ));
        
        $this->add(array(
        		'type' => 'DoctrineModule\Form\Element\ObjectSelect',
        		'name' => 'customerId',
        		'options' => array(
        			'label' => 'Name',
        			'object_manager' => $objectManager,
        			'target_class' => 'SmartAccounts\Entity\Customer',
        			'property' => 'name',
        			'empty_option' => '---please choose---',
        		),
        		'attributes' => array(
        				'required' => false,
        				'class'    => 'select',
        		),
        ));
        
        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'email',
            'options' => array(
                'label' => 'Email Address',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a Email Address',
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
