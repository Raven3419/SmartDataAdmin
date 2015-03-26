<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * PHP version 5.5
 *
 * @category   Zend
 * @package    Admin\Form
 * @subpackage Fieldset
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace LundProducts\Form\Fieldset;

use Zend\Form\Fieldset;
use Zend\InputFilter\InputFilterProviderInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;

/**
 * Part fieldset for admin module
 *
 * @category   Zend
 * @package    Admin\Form
 * @subpackage Fieldset
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 */
class PartFieldset extends Fieldset
{
    /**
     * Constructor
     *
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('partfieldset');

        $this->setHydrator(new DoctrineHydrator($objectManager, 'LundProducts\Entity\Parts'));

        $this->add(array(
            'type' => 'Zend\Form\Element\Hidden',
            'name' => 'partId',
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'partNumber',
            'options' => array(
                'label' => 'Part Number',
            ),
            'attributes' => array(
                'required'    => 'required',
                'class'       => 'validate[required] span12',
                'placeholder' => 'Enter a part number',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'partVariant',
            'options' => array(
                'label' => 'Part Variant',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a part variant',
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
                 'class'    => 'validate[required] select',
             ),
         ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'productClass',
            'options' => array(
                'label' => 'Product Class',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a product class',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Textarea',
            'name'    => 'detail',
            'options' => array(
                'label' => 'Part Detail',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a part detail',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'jobberPrice',
            'options' => array(
                'label' => 'Jobber Price',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a jobber price',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'msrpPrice',
            'options' => array(
                'label' => 'MSRP Price',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a msrp price',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'salePrice',
            'options' => array(
                'label' => 'Sale Price',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a sale price',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'shippingPrice',
            'options' => array(
                'label' => 'Shipping Price',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a shipping price',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'popCode',
            'options' => array(
                'label' => 'POP Code',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a pop code',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'upcCode',
            'options' => array(
                'label' => 'UPC',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a upc',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'status',
            'options' => array(
                'label' => 'Status',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a status',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'weight',
            'options' => array(
                'label' => 'Weight',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a weight',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'height',
            'options' => array(
                'label' => 'Height',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a height',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'width',
            'options' => array(
                'label' => 'Width',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a width',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'length',
            'options' => array(
                'label' => 'Length',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a length',
            ),
        ));

        $this->add(array(
            'type'    => 'DoctrineModule\Form\Element\ObjectSelect',
            'name'    => 'productLine',
            'options' => array(
                'label'          => 'Product Line',
                'object_manager' => $objectManager,
                'target_class'   => 'LundProducts\Entity\ProductLines',
                'property'       => 'name',
                'empty_option'   => '---please choose---',
            ),
            'attributes' => array(
                'required' => 'required',
                'class'    => 'validate[required] select',
            ),
        ));

        $this->add(array(
            'type'    => 'DoctrineModule\Form\Element\ObjectSelect',
            'name'    => 'parentPart',
            'options' => array(
                'label'          => 'Parent Part',
                'object_manager' => $objectManager,
                'target_class'   => 'LundProducts\Entity\Parts',
                'property'       => 'partNumber',
                'empty_option'   => '---please choose---',
            ),
            'attributes' => array(
                'class'    => 'select2',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'isheet',
            'options' => array(
                'label' => 'I-Sheet',
            ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a length',
            ),
        ));
    }
}
