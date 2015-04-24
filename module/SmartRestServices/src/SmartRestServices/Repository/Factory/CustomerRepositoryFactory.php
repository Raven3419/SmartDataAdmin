<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartRestServices
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartRestServices\Repository
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartRestServices\Repository\Factory;

use SmartRestServices\Repository\CustomerRepository;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * CustomerRepositoryFactory
 *
 * @category   Zend
 * @package    SmartRestServices\Repository
 * @subpackage Factory
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class CustomerRepositoryFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see   FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return ChangesetsRepository
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new CustomerRepository(
            $serviceLocator->get('SmartRestServices\ObjectManager')->getRepository('SmartRestServices\Entity\Customer')
        );
    }
}
