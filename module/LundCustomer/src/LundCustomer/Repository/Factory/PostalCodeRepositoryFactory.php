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

use LundCustomer\Repository\PostalCodeRepository;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * PostalCodeRepositoryFactory
 *
 * @category   Zend
 * @package    LundCustomer\Repository
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class PostalCodeRepositoryFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see   FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return PostalCodeRepository
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new PostalCodeRepository(
            $serviceLocator->get('LundCustomer\ObjectManager'),
            $serviceLocator->get('LundCustomer\ObjectManager')->getRepository('LundCustomer\Entity\PostalCode')
        );
    }
}
