<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartAccounts
 *
 * @category   Zend
 * @package    SmartAccounts
 * @subpackage InputFilter
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartAccounts\InputFilter;

use SmartAccounts\Options\SmartAccountsOptionsInterface;
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
        ObjectRepository             	$objectRepository,
        SmartAccountsOptionsInterface 	$options
    )
    {
        $this->add(array(
            'name'     => 'customerId',
            'required' => false
        ));

        $this->add(array(
            'name'       => 'login',
            'required'   => true,
          	'allow_empty'=> false,
            'filters'    => array(array('name' => 'StringTrim'))
        ));

        $this->add(array(
            'name'       => 'password',
            'required'   => false,
          	'allow_empty'=> true,
            'filters'    => array(array('name' => 'StringTrim'))
        ));

        $this->add(array(
            'name'       => 'name',
			'required'   => false,
          	'allow_empty'=> true,
            'filters'    => array(array('name' => 'StringTrim'))
        ));
        
        $this->add(array(
            'name'     => 'disabled',
            'required' => true,
        ));
        
        $this->add(array(
            'name'     => 'downloadReady',
            'required' => true,
        ));

        $this->add(array(
            'name'       => 'address',
			'required'   => false,
          	'allow_empty'=> true,
            'filters'    => array(array('name' => 'StringTrim'))
        ));

        $this->add(array(
            'name'       => 'city',
			'required'   => false,
          	'allow_empty'=> true,
            'filters'    => array(array('name' => 'StringTrim'))
        ));

        $this->add(array(
            'name'       => 'state',
			'required'   => false,
          	'allow_empty'=> true,
            'filters'    => array(array('name' => 'StringTrim'))
        ));

        $this->add(array(
            'name'       => 'zip',
			'required'   => false,
          	'allow_empty'=> true,
            'filters'    => array(array('name' => 'StringTrim'))
        ));
        
        $this->add(array(
            'name'     => 'notificationFree',
            'required' => true,
        ));
        
        $this->add(array(
            'name'     => 'notificationGrade',
            'required' => true,
        ));

        $this->add(array(
            'name'       => 'downloadUrl',
			'required'   => false,
          	'allow_empty'=> true,
            'filters'    => array(array('name' => 'StringTrim'))
        ));

    }
}
