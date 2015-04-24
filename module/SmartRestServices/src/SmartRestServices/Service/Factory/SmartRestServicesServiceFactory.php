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

use SmartRestServices\Service\SmartRestServicesService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see SmartRestServicesService}.
 */
class SmartRestServicesServiceFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return SmartRestServicesService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $smartCustomerService = new SmartRestServicesService(
            $serviceLocator->get('SmartRestServices\ObjectManager'),
            $serviceLocator->get('SmartRestServices\Service\CustomerService')
        );

        return $smartCustomerService;
    }
}
