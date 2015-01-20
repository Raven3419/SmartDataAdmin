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
 * @author     Jason Guthery <jason@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/LundProducts for the canonical source repository
 * @since      File available since Release 0.1.0
 */

namespace LundProducts\Repository\Factory;

use LundProducts\Repository\PartAssetRepository;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * PartAssetRepositoryFactory
 *
 * @category   Zend
 * @package    LundProducts\Repository
 * @subpackage Factory
 * @author     Jason Guthery <jason@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/LundProducts for the canonical source repository
 */
class PartAssetRepositoryFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see   FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return PartAssetRepository
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new PartAssetRepository(
            $serviceLocator->get('LundProducts\ObjectManager')->getRepository('LundProducts\Entity\PartAsset')
        );
    }
}
