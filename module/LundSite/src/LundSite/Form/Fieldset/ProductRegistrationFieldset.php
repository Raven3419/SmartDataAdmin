<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * LundSite
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundSite\Form
 * @subpackage Fieldset
 * @author     Jason Guthery <jason@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 * @since      File available since Release 0.1.0
 */

namespace LundSite\Form\Fieldset;

use Doctrine\Common\Persistence\ObjectManager;
use DoctrineModule\Stdlib\Hydrator\DoctrineObject as DoctrineHydrator;
use Zend\Form\Fieldset;

/**
 * ProductRegistration fieldset
 *
 * @category   Zend
 * @package    LundSite\Form
 * @subpackage Fieldset
 * @author     Jason Guthery <jason@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 */
class ProductRegistrationFieldset extends Fieldset
{
    /**
     * Constructor
     *
     * @param ObjectManager $objectManager
     */
    public function __construct(ObjectManager $objectManager)
    {
        parent::__construct('product-registration-fieldset');

        $this->setHydrator(new DoctrineHydrator($objectManager, 'LundSite\Entity\ProductRegistration'));

        $this->add(array(
            'type' => 'Zend\Form\Element\Hidden',
            'name' => 'productRegistrationId',
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'title',
            'options' => array(
                'label'         => 'Title',
                'empty_option'   => '---please choose---',
                'value_options' => array(
                    'Mr.'  => 'Mr.',
                    'Mrs.' => 'Mrs.',
                    'Ms.'  => 'Ms.',
                    'Miss' => 'Miss',
                ),
            ),
            'attributes' => array(
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'firstName',
            'options' => array(
                'label' => 'First Name',
             ),
            'attributes' => array(
                'required' => 'required',
                'class'       => 'span12',
                'placeholder' => 'Enter a first name',
             ),
         ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'middleInitial',
            'options' => array(
                'label' => 'Initial',
             ),
            'attributes' => array(
                'class'       => 'span4',
                'placeholder' => 'Enter a middle initial',
             ),
         ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'lastName',
            'options' => array(
                'label' => 'Last Name',
             ),
            'attributes' => array(
                'required' => 'required',
                'class'       => 'span12',
                'placeholder' => 'Enter a last name',
             ),
         ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'emailAddress',
            'options' => array(
                'label' => 'Email Address',
             ),
            'attributes' => array(
                'required' => 'required',
                'class'       => 'validate[required,custom[email]] span12',
                'placeholder' => 'Enter an email address',
             ),
         ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'streetAddress',
            'options' => array(
                'label' => 'Street Address',
             ),
            'attributes' => array(
                'required' => 'required',
                'class'       => 'span12',
                'placeholder' => 'Enter a street address',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'extStreetAddress',
            'options' => array(
                'label' => 'Extended Street Address',
             ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter an extended street address',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'locality',
            'options' => array(
                'label' => 'City',
             ),
            'attributes' => array(
                'required' => 'required',
                'class'       => 'span12',
                'placeholder' => 'Enter a locality',
             ),
        ));

        $this->add(array(
            'type'    => 'DoctrineModule\Form\Element\ObjectSelect',
            'name'    => 'region',
            'options' => array(
                'label'          => 'State',
                'object_manager' => $objectManager,
                'target_class'   => 'RocketBase\Entity\State',
                'property'       => 'subdivisionName',
                'empty_option'   => '---please choose---',
                'is_method'      => true,
                'find_method'    => array(
                    'name'   => 'findBy',
                    'params' => array(
                        'criteria' => array('codeChar3' => array('USA','CAN')),
                        'orderBy'  => array('subdivisionName' => 'ASC'),
                    ),
                ),
            ),
            'attributes' => array(
                'required' => 'required',
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'postCode',
            'options' => array(
                'label' => 'Postal Code',
             ),
            'attributes' => array(
                'required' => 'required',
                'class'       => 'span12',
                'placeholder' => 'Enter a postal code',
             ),
        ));

        $this->add(array(
            'type'    => 'DoctrineModule\Form\Element\ObjectSelect',
            'name'    => 'country',
            'options' => array(
                'label'          => 'Country',
                'object_manager' => $objectManager,
                'target_class'   => 'RocketBase\Entity\Country',
                'property'       => 'name',
                'empty_option'   => '---please choose---',
                'is_method'      => true,
                'find_method'    => array(
                    'name'   => 'findBy',
                    'params' => array(
                        'criteria' => array('codeChar3' => array('USA','CAN')),
                        'orderBy'  => array('name' => 'ASC'),
                    ),
                ),
            ),
            'attributes' => array(
                'required' => 'required',
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'phoneNumber',
            'options' => array(
                'label' => 'Phone Number',
             ),
            'attributes' => array(
                'type'        => 'tel',
                'class'       => 'span12',
                'placeholder' => 'Enter a telephone number',
                'pattern'     => '^\(?[0-9]{3}\)?[-.]?([0-9]{3})[-.]?([0-9]{4})$',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\DateSelect',
            'name'    => 'birthDate',
            'options' => array(
                'label'         => 'Date of Birth',
                'create_empty_option' => true,
                'render_delimiters' => false,
                'day_attributes' => array(
                    'data-placeholder' => 'Day',
                    'class' => 'select',
                ),
                'month_attributes' => array(
                    'data-placeholder' => 'Month',
                    'class' => 'select',
                ),
                'year_attributes' => array(
                    'data-placeholder' => 'Year',
                    'class' => 'select',
                ),
            ),
            'attributes' => array(
                'required' => 'required',
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'maritalStatus',
            'options' => array(
                'label'         => 'Marital Status',
                'value_options' => array(
                    'married' => 'Married',
                    'single'  => 'Single',
                ),
                'empty_option'   => '---please choose---',
            ),
            'attributes' => array(
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'DoctrineModule\Form\Element\ObjectSelect',
            'name'    => 'productCategory',
            'options' => array(
                'label'          => 'Product Purchased',
                'object_manager' => $objectManager,
                'target_class'   => 'LundProducts\Entity\ProductCategories',
                'property'       => 'displayName',
                'empty_option'   => '---please choose---',
            ),
            'attributes' => array(
                'required' => 'required',
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'upcCode',
            'options' => array(
                'label' => 'Lund Product UPC',
             ),
            'attributes' => array(
                'required' => 'required',
                'class'       => 'span12',
                'placeholder' => 'Enter a upc',
             ),
        ));

        $this->add(array(
            'type'    => 'DoctrineModule\Form\Element\ObjectSelect',
            'name'    => 'vehYear',
            'options' => array(
                'label'          => 'Vehicle Year',
                'object_manager' => $objectManager,
                'target_class'   => 'LundProducts\Entity\VehYear',
                'property'       => 'name',
                'empty_option'   => '---please choose---',
                'is_method' => true,
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy' => array('name' => 'ASC'),
                    ),
                ),
            ),
            'attributes' => array(
                'required' => 'required',
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'DoctrineModule\Form\Element\ObjectSelect',
            'name'    => 'vehMake',
            'options' => array(
                'label'          => 'Vehicle Make',
                'object_manager' => $objectManager,
                'target_class'   => 'LundProducts\Entity\VehMake',
                'property'       => 'name',
                'empty_option'   => '---please choose---',
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy' => array('name' => 'ASC'),
                    ),
                ),
            ),
            'attributes' => array(
                'required' => 'required',
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'DoctrineModule\Form\Element\ObjectSelect',
            'name'    => 'vehModel',
            'options' => array(
                'label'          => 'Vehicle Model',
                'object_manager' => $objectManager,
                'target_class'   => 'LundProducts\Entity\VehModel',
                'property'       => 'name',
                'empty_option'   => '---please choose---',
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy' => array('name' => 'ASC'),
                    ),
                ),
            ),
            'attributes' => array(
                'required' => 'required',
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'DoctrineModule\Form\Element\ObjectSelect',
            'name'    => 'vehSubmodel',
            'options' => array(
                'label'          => 'Vehicle Submodel',
                'object_manager' => $objectManager,
                'target_class'   => 'LundProducts\Entity\VehSubmodel',
                'property'       => 'name',
                'empty_option'   => '---please choose---',
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy' => array('name' => 'ASC'),
                    ),
                ),
            ),
            'attributes' => array(
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'ownedLength',
            'options' => array(
                'label'         => 'How long have you owned this vehicle?',
                'value_options' => array(
                    'Less than 6 months' => 'Less than 6 months',
                    '6 months to 1 year'  => '6 months to 1 year',
                    'More than 1 year' => 'More than 1 year',
                ),
                'empty_option'   => '---please choose---',
            ),
            'attributes' => array(
                'required' => 'required',
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'installer',
            'options' => array(
                'label'         => 'Who will install this product?',
                'value_options' => array(
                    'Self' => 'Self',
                    'Friend' => 'Friend',
                    'Relative' => 'Relative',
                    'Professional' => 'Professional',
                ),
                'empty_option'   => '---please choose---',
            ),
            'attributes' => array(
                'required' => 'required',
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'pricePaid',
            'options' => array(
                'label' => 'Price paid (excluding tax)',
             ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a price paid',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'shopStore',
            'options' => array(
                'label' => 'One or more stores',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'shopStore',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'shopOnline',
            'options' => array(
                'label' => 'On the Internet',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'shopOnline',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'shopCatalog',
            'options' => array(
                'label' => 'In catalogs',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'shopCatalog',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'wherePurchased',
            'options' => array(
                'label' => 'Name of Store/Catalog/Website where purchased',
             ),
            'attributes' => array(
                'class'       => 'span12',
                'placeholder' => 'Enter a purchase location',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'brandInMind',
            'options' => array(
                'label'         => 'Did you have a brand in mind?',
                'value_options' => array(
                    '0' => 'No',
                    '1' => 'Yes',
                ),
            ),
            'attributes' => array(
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'brandPurchased',
            'options' => array(
                'label'         => 'Was it the brand you purchased?',
                'value_options' => array(
                    '0' => 'No',
                    '1' => 'Yes',
                ),
            ),
            'attributes' => array(
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Radio',
            'name'    => 'easeOfInstallation',
            'options' => array(
                'label'         => 'Ease of Installation',
                'value_options' => array(
                    'exceeded' => 'Exceeded',
                    'met' => 'Met',
                    'did not meet' => 'Did Not Meet'
                ),
                'label_attributes' => array(
                    'class' => 'radio inline',
                ),
            ),
            'attributes' => array(
                'class'    => 'styled',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Radio',
            'name'    => 'quality',
            'options' => array(
                'label'         => 'Quality',
                'value_options' => array(
                    'exceeded' => 'Exceeded',
                    'met' => 'Met',
                    'did not meet' => 'Did Not Meet'
                ),
                'label_attributes' => array(
                    'class' => 'radio inline',
                ),
            ),
            'attributes' => array(
                'class'    => 'styled',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Radio',
            'name'    => 'valueOfMoney',
            'options' => array(
                'label'         => 'Value of Money',
                'value_options' => array(
                    'exceeded' => 'Exceeded',
                    'met' => 'Met',
                    'did not meet' => 'Did Not Meet'
                ),
                'label_attributes' => array(
                    'class' => 'radio inline',
                ),
            ),
            'attributes' => array(
                'class'    => 'styled',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Radio',
            'name'    => 'overall',
            'options' => array(
                'label'         => 'Overall',
                'value_options' => array(
                    'exceeded' => 'Exceeded',
                    'met' => 'Met',
                    'did not meet' => 'Did Not Meet'
                ),
                'label_attributes' => array(
                    'class' => 'radio inline',
                ),
            ),
            'attributes' => array(
                'class'    => 'styled',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'infReputation',
            'options' => array(
                'label' => 'Lund reputation or experience',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'infReputation',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'infEase',
            'options' => array(
                'label' => 'Ease of installation',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'infEase',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'infDealer',
            'options' => array(
                'label' => 'Experience with dealer',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'infDealer',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'infRecommendation',
            'options' => array(
                'label' => 'Friend/Salesperson recommendation',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'infRecommendation',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'infFunctionality',
            'options' => array(
                'label' => 'Functionality',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'infFunctionality',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'infAvailability',
            'options' => array(
                'label' => 'Immediate availability',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'infAvailability',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'infPrice',
            'options' => array(
                'label' => 'Price',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'infPrice',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'infStyle',
            'options' => array(
                'label' => 'Style/Design/Color',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'infStyle',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'infQuality',
            'options' => array(
                'label' => 'Quality/Durability',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'infQuality',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'infWarranty',
            'options' => array(
                'label' => 'Warranty',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'infWarranty',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'infOther',
            'options' => array(
                'label' => 'Other',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'infOther',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'personOneGender',
            'options' => array(
                'label'         => 'Person One Gender',
                'value_options' => array(
                    'Female' => 'Female',
                    'Male' => 'Male',
                ),
                'empty_option'   => '---please choose---',
            ),
            'attributes' => array(
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'personOneAge',
            'options' => array(
                'label' => 'Person One Age',
             ),
            'attributes' => array(
                'class'       => 'span3',
                'placeholder' => 'Enter an age',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'personTwoGender',
            'options' => array(
                'label'         => 'Person Two Gender',
                'value_options' => array(
                    'Female' => 'Female',
                    'Male' => 'Male',
                ),
                'empty_option'   => '---please choose---',
            ),
            'attributes' => array(
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'personTwoAge',
            'options' => array(
                'label' => 'Person Two Age',
             ),
            'attributes' => array(
                'class'       => 'span3',
                'placeholder' => 'Enter an age',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'personThreeGender',
            'options' => array(
                'label'         => 'Person Three Gender',
                'value_options' => array(
                    'Female' => 'Female',
                    'Male' => 'Male',
                ),
                'empty_option'   => '---please choose---',
            ),
            'attributes' => array(
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'personThreeAge',
            'options' => array(
                'label' => 'Person Three Age',
             ),
            'attributes' => array(
                'class'       => 'span3',
                'placeholder' => 'Enter an age',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'personFourGender',
            'options' => array(
                'label'         => 'Person Four Gender',
                'value_options' => array(
                    'Female' => 'Female',
                    'Male' => 'Male',
                ),
                'empty_option'   => '---please choose---',
            ),
            'attributes' => array(
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Text',
            'name'    => 'personFourAge',
            'options' => array(
                'label' => 'Person Four Age',
             ),
            'attributes' => array(
                'class'       => 'span3',
                'placeholder' => 'Enter an age',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'noneHousehold',
            'options' => array(
                'label' => 'No one else in household',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'infOther',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'childUnderOne',
            'options' => array(
                'label' => 'Child under 1 year',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'infOther',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'youOccupation',
            'options' => array(
                'label'         => 'Your Occupation',
                'value_options' => array(
                    'Professional/Technical' => 'Professional/Technical',
                    'Upper Management/Executive' => 'Upper Management/Executive',
                    'Middle Management' => 'Middle Management',
                    'Sales/Marketing' => 'Sales/Marketing',
                    'Clerical/Service Worker' => 'Clerical/Service Worker',
                    'Tradesman/Machine Operator/Laborer' => 'Tradesman/Machine Operator/Laborer',
                ),
                'empty_option'   => '---please choose---',
            ),
            'attributes' => array(
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'spouseOccupation',
            'options' => array(
                'label'         => 'Spouse Occupation',
                'value_options' => array(
                    'Professional/Technical' => 'Professional/Technical',
                    'Upper Management/Executive' => 'Upper Management/Executive',
                    'Middle Management' => 'Middle Management',
                    'Sales/Marketing' => 'Sales/Marketing',
                    'Clerical/Service Worker' => 'Clerical/Service Worker',
                    'Tradesman/Machine Operator/Laborer' => 'Tradesman/Machine Operator/Laborer',
                ),
                'empty_option'   => '---please choose---',
            ),
            'attributes' => array(
                'class'    => 'select',
            ),
        ));

         $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'youHomemaker',
            'options' => array(
                'label' => 'A Homemaker?',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'youHomemaker',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'spouseHomemaker',
            'options' => array(
                'label' => 'A Homemaker?',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'spouseHomemaker',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'youRetired',
            'options' => array(
                'label' => 'Retired?',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'youRetired',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'spouseRetired',
            'options' => array(
                'label' => 'Retired?',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'spouseRetired',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'youStudent',
            'options' => array(
                'label' => 'A Student?',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'youStudent',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'spouseStudent',
            'options' => array(
                'label' => 'A Student?',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'spouseStudent',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'youOwner',
            'options' => array(
                'label' => 'Self Employed/Business Owner?',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'youOwner',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'spouseOwner',
            'options' => array(
                'label' => 'Self Employed/Business Owner?',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'spouseOwner',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'youHome',
            'options' => array(
                'label' => 'Working from a Home Office?',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'youHome',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'spouseHome',
            'options' => array(
                'label' => 'Working from a Home Office?',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'spouseHome',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'youMilitary',
            'options' => array(
                'label' => 'In the Military?',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'youMilitary',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'spouseMilitary',
            'options' => array(
                'label' => 'In the Military?',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'spouseMilitary',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'youVeteran',
            'options' => array(
                'label' => 'A Veteran?',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'youVeteran',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'spouseVeteran',
            'options' => array(
                'label' => 'A Veteran?',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(
                'class' => 'styled',
                'id' => 'spouseVeteran',
             ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'income',
            'options' => array(
                'label'         => 'Which group describes your annual family income?',
                'value_options' => array(
                    "Under $15,000" => "Under $15,000",
                    "$15,000 - $19,000" => "$15,000 - $19,000",
                    "$20,000 - $29,000" => "$20,000 - $29,000",
                    "$30,000 - $39,000" => "$30,000 - $39,000",
                    "$40,000 - $49,000" => "$40,000 - $49,000",
                    "$50,000 - $59,000" => "$50,000 - $59,000",
                    "$60,000 - $74,000" => "$60,000 - $74,000",
                    "$75,000 - $99,000" => "$75,000 - $99,000",
                    "$100,000 - $124,000" => "$100,000 - $124,000",
                    "$125,000 - $149,000" => "$125,000 - $149,000",
                    "$150,000 - $174,000" => "$150,000 - $174,000",
                    "$175,000 - $199,000" => "$175,000 - $199,000",
                    "$200,000 - $249,000" => "$200,000 - $249,000",
                    "$250,000 & over" => "$250,000 & over",
                ),
                'empty_option'   => '---please choose---',
            ),
            'attributes' => array(
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'education',
            'options' => array(
                'label'         => 'Level of education',
                'value_options' => array(
                    'Completed High School' => 'Completed High School',
                    'Completed College' => 'Completed College',
                    'Completed Graduate School' => 'Completed Graduate School',
                ),
                'empty_option'   => '---please choose---',
            ),
            'attributes' => array(
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'creditCards',
            'options' => array(
                'label'         => 'Which credit cards do you use regularly?',
                'value_options' => array(
                    'American Express/Diners Club' => 'American Express/Diners Club',
                    'MasterCard/Visa/Disover' => 'MasterCard/Visa/Discover',
                    'Department Store/Oil Company/etc.' => 'Department Store/Oil Company/etc.',
                   'Do not use credit cards' => 'Do not use credit cards', 
                ),
                'empty_option'   => '---please choose---',
            ),
            'attributes' => array(
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'residence',
            'options' => array(
                'label'         => 'For your primary residence, do you:',
                'value_options' => array(
                    'Own' => 'Own?',
                    'Rent' => 'Rent?',
                ),
                'empty_option'   => '---please choose---',
            ),
            'attributes' => array(
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'magazineSubscribed',
            'options' => array(
                'label'         => 'Subscribes to',
                'value_options' => array(
                    '1-3 per month' => '1-3 per month',
                    '4+ per month' => '4+ per month',
                ),
                'empty_option'   => '---please choose---',
            ),
            'attributes' => array(
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'magazinePurchased',
            'options' => array(
                'label'         => 'Purchases at Stores/Newsstands',
                'value_options' => array(
                    '1-3 per month' => '1-3 per month',
                    '4+ per month' => '4+ per month',
                ),
                'empty_option'   => '---please choose---',
            ),
            'attributes' => array(
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'newWithin',
            'options' => array(
                'label'         => 'Buy/Lease a New Vehicle within',
                'value_options' => array(
                    '1-6 months' => '1-6 months',
                    '7-12 months' => '7-12 months',
                ),
                'empty_option'   => '---please choose---',
            ),
            'attributes' => array(
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'usedWithin',
            'options' => array(
                'label'         => 'Buy/Lease a Used Vehicle within',
                'value_options' => array(
                    '1-6 months' => '1-6 months',
                    '7-12 months' => '7-12 months',
                ),
                'empty_option'   => '---please choose---',
            ),
            'attributes' => array(
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'DoctrineModule\Form\Element\ObjectSelect',
            'name'    => 'recVehYear',
            'options' => array(
                'label'          => 'Vehicle Year',
                'object_manager' => $objectManager,
                'target_class'   => 'LundProducts\Entity\VehYear',
                'property'       => 'name',
                'empty_option'   => '---please choose---',
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy' => array('name' => 'ASC'),
                    ),
                ),
            ),
            'attributes' => array(
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'DoctrineModule\Form\Element\ObjectSelect',
            'name'    => 'recVehMake',
            'options' => array(
                'label'          => 'Vehicle Make',
                'object_manager' => $objectManager,
                'target_class'   => 'LundProducts\Entity\VehMake',
                'property'       => 'name',
                'empty_option'   => '---please choose---',
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy' => array('name' => 'ASC'),
                    ),
                ),
            ),
            'attributes' => array(
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'DoctrineModule\Form\Element\ObjectSelect',
            'name'    => 'recVehModel',
            'options' => array(
                'label'          => 'Vehicle Model',
                'object_manager' => $objectManager,
                'target_class'   => 'LundProducts\Entity\VehModel',
                'property'       => 'name',
                'empty_option'   => '---please choose---',
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy' => array('name' => 'ASC'),
                    ),
                ),
            ),
            'attributes' => array(
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'DoctrineModule\Form\Element\ObjectSelect',
            'name'    => 'recVehSubmodel',
            'options' => array(
                'label'          => 'Vehicle Submodel',
                'object_manager' => $objectManager,
                'target_class'   => 'LundProducts\Entity\VehSubmodel',
                'property'       => 'name',
                'empty_option'   => '---please choose---',
                'find_method' => array(
                    'name' => 'findBy',
                    'params' => array(
                        'criteria' => array(),
                        'orderBy' => array('name' => 'ASC'),
                    ),
                ),
            ),
            'attributes' => array(
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Select',
            'name'    => 'purchaseType',
            'options' => array(
                'label'         => 'Was this vehicle purchased or leased?',
                'value_options' => array(
                    'Bought New' => 'Bought New',
                    'Bought Used' => 'Bought Used',
                    'Leased New' => 'Leased New',
                    'Leased Used' => 'Leased Used',
                ),
                'empty_option'   => '---please choose---',
            ),
            'attributes' => array(
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'DoctrineModule\Form\Element\ObjectSelect',
            'name'    => 'aboutHousehold',
            'options' => array(
                'label'          => 'Please select all that apply to your household',
                'object_manager' => $objectManager,
                'target_class'   => 'LundSite\Entity\AboutHousehold',
                'property'       => 'title',
                'disable_inarray_validator' => true,
            ),
            'attributes' => array(
                'multiple' => 'multiple',
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'DoctrineModule\Form\Element\ObjectSelect',
            'name'    => 'lifestyleHousehold',
            'options' => array(
                'label'          => "To help us understand our customer's lifestyles, please indicate the interests and activities in which you or your spouse enjoy participating on a regular basis",
                'object_manager' => $objectManager,
                'target_class'   => 'LundSite\Entity\LifestyleHousehold',
                'property'       => 'title',
                'disable_inarray_validator' => true,
            ),
            'attributes' => array(
                'multiple' => 'multiple',
                'class'    => 'select',
            ),
        ));

        $this->add(array(
            'type'    => 'Zend\Form\Element\Checkbox',
            'name'    => 'optout',
            'options' => array(
                'label' => 'Please check here if, for some reason, you would prefer not to participate in this opportunity',
                'label_attributes' => array(
                    'class' => 'checkbox inline',
                ),
                'use_hidden_element' => false,
             ),
            'attributes' => array(                'class' => 'styled',
                'id' => 'spouseOwner',
             ),
        ));

        $this->add(array(
            'type'    => 'DoctrineModule\Form\Element\ObjectSelect',
            'name'    => 'site',
            'options' => array(
                'label'          => 'Site',
                'object_manager' => $objectManager,
                'target_class'   => 'RocketCms\Entity\Site',
                'property'       => 'name',
                'empty_option'   => '---please choose---',
            ),
            'attributes' => array(
                'required' => 'required',
                'class'    => 'validate[required] select',
            ),
        ));
    }
}
