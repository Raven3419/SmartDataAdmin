<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/*
 * SmartAccounts
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartAccounts\Service
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace SmartAccounts\Service\Factory;

use SmartAccounts\Service\SmartAccountsService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see SmartAccountsService}.
 */
class SmartAccountsServiceFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return SmartAccountsService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $smartCustomerService = new SmartAccountsService(
            $serviceLocator->get('SmartAccounts\ObjectManager'),
            $serviceLocator->get('SmartAccounts\Service\CustomerService')
        );

        return $smartCustomerService;
    }
}
