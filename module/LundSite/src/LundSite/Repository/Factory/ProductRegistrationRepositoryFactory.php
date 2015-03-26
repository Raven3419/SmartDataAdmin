<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * LundSite
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundSite\Repository
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace LundSite\Repository\Factory;

use LundSite\Repository\ProductRegistrationRepository;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * ProductRegistrationRepositoryFactory
 *
 * @category   Zend
 * @package    LundSite\Repository
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class ProductRegistrationRepositoryFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see   FactoryInterface::createService()
     * @param  ServiceLocatorInterface       $serviceLocator
     * @return ProductRegistrationRepository
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new ProductRegistrationRepository(
            $serviceLocator->get('LundSite\ObjectManager')->getRepository('LundSite\Entity\ProductRegistration')
        );
    }
}
