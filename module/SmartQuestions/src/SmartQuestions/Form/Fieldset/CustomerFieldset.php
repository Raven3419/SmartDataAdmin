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
 * Customer fieldset for admin module
 *
 * @category   Zend
 * @package    SmartQuestions\Form
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

        $this->setHydrator(new DoctrineHydrator($objectManager, 'SmartQuestions\Entity\Customers'));

        $this->add(array(
            'type' => 'Zend\Form\Element\Hidden',
            'name' => 'customerId',
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'name',
            'options' => array(
                'label' => 'Name',
            ),
            'attributes' => array(
                'required'    => 'required',
                'class'       => 'validate[required] span12',
                'placeholder' => 'Enter a name',
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
