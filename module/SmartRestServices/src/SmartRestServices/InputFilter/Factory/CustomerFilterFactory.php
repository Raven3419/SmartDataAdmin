<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartRestServices
 *
 * @category   Zend
 * @package    SmartRestServices\InputFilter
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartRestServices\InputFilter\Factory;

use SmartRestServices\InputFilter\CustomerFilter;
use DoctrineModule\Validator\UniqueObject;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see CustomerFilter}.
 */
class CustomerFilterFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return CustomerFilter
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $parentLocator    	= $serviceLocator->getServiceLocator();
        $customerRepository = $parentLocator->get('SmartRestServices\Repository\CustomerRepository');
        $options          	= $parentLocator->get('SmartRestServices\Options\SmartRestServicesOptions');


        return new CustomerFilter($customerRepository, $options);
    }
}
