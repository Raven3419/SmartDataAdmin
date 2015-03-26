<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * LundCustomer
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundCustomer\Repository
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace LundCustomer\Repository\Factory;

use LundCustomer\Repository\RetailerRepository;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * RetailerRepositoryFactory
 *
 * @category   Zend
 * @package    LundCustomer\Repository
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class RetailerRepositoryFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see   FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return RetailerRepository
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new RetailerRepository(
            $serviceLocator->get('LundCustomer\ObjectManager'),
            $serviceLocator->get('LundCustomer\ObjectManager')->getRepository('LundCustomer\Entity\Retailer')
        );
    }
}
