<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartRestServices
 *
 * @category   Zend
 * @package    SmartRestServices
 * @subpackage InputFilter
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartRestServices\InputFilter;

use SmartRestServices\Options\SmartRestServicesOptionsInterface;
use Doctrine\Common\Persistence\ObjectRepository;
use Zend\Validator\ValidatorInterface;
use Zend\InputFilter\InputFilter;

/**
 * Base input filter for the {@see CustomerFieldset}.
 */
class CustomerFilter extends InputFilter
{
    /**
     * @param ObjectRepository     $objectRepository
     * @param UserOptionsInterface $options
     */
    public function __construct(
        ObjectRepository             		$objectRepository,
        SmartRestServicesOptionsInterface 	$options
    )
    {
        $this->add(array(
            'name'     => 'customerId',
            'required' => false
        ));

        $this->add(array(
            'name'       => 'email',
            'required'   => true,
            'filters'    => array(array('name' => 'StringTrim')),
            'validators' => array(
                array(
                    'name'    => 'NotEmpty',
                    'options' => array('type' => 'string')
                ),
            ),
        ));

        $this->add(array(
            'name'       => 'password',
            'required'   => false,
          	'allow_empty'=> true,
            'filters'    => array(array('name' => 'StringTrim'))
        ));

        $this->add(array(
            'name'       => 'firstName',
			'required'   => false,
            'filters'    => array(array('name' => 'StringTrim'))
        ));

        $this->add(array(
            'name'       => 'lastName',
			'required'   => false,
          	'allow_empty'=> true,
            'filters'    => array(array('name' => 'StringTrim'))
        ));
        
        $this->add(array(
            'name'     => 'disabled',
            'required' => true,
        ));

        $this->add(array(
            'name'       => 'parentEmail',
            'required'   => true,
          	'allow_empty'=> true,
            'filters'    => array(array('name' => 'StringTrim'))
        ));

        $this->add(array(
            'name'       => 'parentFirstName',
			'required'   => false,
            'filters'    => array(array('name' => 'StringTrim'))
        ));

        $this->add(array(
            'name'       => 'parentLastName',
			'required'   => false,
          	'allow_empty'=> true,
            'filters'    => array(array('name' => 'StringTrim'))
        ));

    }
}
