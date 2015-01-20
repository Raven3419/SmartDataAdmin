<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/*
 * LundProducts
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundProducts\Service
 * @subpackage Factory
 * @author     Mark Cizek <mark@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 * @since      File available since Release 1.0.0
 */

namespace LundProducts\Service\Factory;

use LundProducts\Service\ProductLineService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see ProductLineService}
 */
class ProductLineServiceFactory implements FactoryInterface
{
    /**
     * Create Product Line service from factory
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return ProductLineService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $brandsService = new ProductLineService(
            $serviceLocator->get('LundProducts\ObjectManager'),
            $serviceLocator->get('LundProducts\Repository\ProductLinesRepository'),
            $serviceLocator->get('FormElementManager')->get('LundProducts\Form\ProductLineForm'),
            $serviceLocator->get('LundProducts\Service\ProductLineFeatureService')
        );

        return $brandsService;
    }
}
