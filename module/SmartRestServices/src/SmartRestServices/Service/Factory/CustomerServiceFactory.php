<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/*
 * SmartRestServices
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartRestServices\Service
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace SmartRestServices\Service\Factory;

use SmartRestServices\Service\CustomerService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see CustomerService}
 */
class CustomerServiceFactory implements FactoryInterface
{
    /**
     * Create Customer service from factory
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return CustomerService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $customerService = new CustomerService(
            $serviceLocator->get('SmartRestServices\ObjectManager'),
            $serviceLocator->get('SmartRestServices\Repository\CustomerRepository'),
            $serviceLocator->get('FormElementManager')->get('SmartRestServices\Form\CustomerForm')
        );

        return $customerService;
    }
}
