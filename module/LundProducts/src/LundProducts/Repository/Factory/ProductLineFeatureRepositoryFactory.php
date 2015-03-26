<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * LundProducts
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundProducts\Repository
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace LundProducts\Repository\Factory;

use LundProducts\Repository\ProductLineFeatureRepository;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * ProductLineFeatureRepositoryFactory
 *
 * @category   Zend
 * @package    LundProducts\Repository
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class ProductLineFeatureRepositoryFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see   FactoryInterface::createService()
     * @param  ServiceLocatorInterface    $serviceLocator
     * @return ProductLineFeatureRepository
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new ProductLineFeatureRepository(
            $serviceLocator->get('LundProducts\ObjectManager')->getRepository('LundProducts\Entity\ProductLineFeature')
        );
    }
}
