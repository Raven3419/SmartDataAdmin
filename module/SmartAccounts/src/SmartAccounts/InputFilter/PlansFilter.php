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
 * Base input filter for the {@see PlansFieldset}.
 */
class PlansFilter extends InputFilter
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
            'name'     => 'planId',
            'required' => false
        ));

        $this->add(array(
            'name'       => 'planName',
            'required'   => true,
          	'allow_empty'=> false,
            'filters'    => array(array('name' => 'StringTrim'))
        ));

        $this->add(array(
            'name'       => 'planDescription',
            'required'   => true,
          	'allow_empty'=> false,
            'filters'    => array(array('name' => 'StringTrim'))
        ));
        
        $this->add(array(
            'name'     => 'disabled',
            'required' => true,
        ));

    }
}
