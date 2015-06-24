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
 * Plans fieldset for admin module
 *
 * @category   Zend
 * @package    SmartAccounts\Form
 * @subpackage Fieldset
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 */
class PlansFieldset extends Fieldset
{
    /**
     * Constructor
     *
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('plans-fieldset');

        $this->setHydrator(new DoctrineHydrator($objectManager, 'SmartAccounts\Entity\Plans'));

        $this->add(array(
            'type' => 'Zend\Form\Element\Hidden',
            'name' => 'planId',
        ));
        
        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'planName',
            'options' => array(
                'label' => 'Plan Name',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a Plan Name',
            ),
        ));
        
        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'planDescription',
            'options' => array(
                'label' => 'Plan Description',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a Plan Description',
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
