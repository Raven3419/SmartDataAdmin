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
 * Accounts fieldset for admin module
 *
 * @category   Zend
 * @package    SmartAccounts\Form
 * @subpackage Fieldset
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 */
class AccountsFieldset extends Fieldset
{
    /**
     * Constructor
     *
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('accounts-fieldset');

        $this->setHydrator(new DoctrineHydrator($objectManager, 'SmartAccounts\Entity\Accounts'));

        $this->add(array(
            'type' => 'Zend\Form\Element\Hidden',
            'name' => 'accountId',
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
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'status',
            'options' => array(
                'label'         => 'Payment Status',
                'value_options' => array(
                    '1' => 'none',
                    '2' => 'processing',
                    '3' => 'cancelled',
                    '4' => 'success',
                ),
            ),
            'attributes' => array(
                'required' => 'required',
                'class'    => 'select',
            ),
        ));

         $this->add(array(
            'type' => 'DoctrineModule\Form\Element\ObjectSelect',
            'name' => 'planId',
            'options' => array(
                'label' => 'Plans',
                'object_manager' => $objectManager,
                'target_class' => 'SmartAccounts\Entity\Plans',
                'property' => 'planName',
                'empty_option' => '---please choose---',
            ),
            'attributes' => array(
                'required' => false,
                'class'    => 'select',
            ),
        ));

    }
}
