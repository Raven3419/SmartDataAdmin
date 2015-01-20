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
 * @author     Jason Guthery <jason@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 * @since      File available since Release 1.0.0
 */

namespace LundProducts\Service\Factory;

use LundProducts\Service\BrandProductCategoryService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see BrandProductCategoryService}.
 */
class BrandProductCategoryServiceFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return BrandProductCategoryService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $brandProductCategoryService = new BrandProductCategoryService(
            $serviceLocator->get('LundProducts\ObjectManager'),
            $serviceLocator->get('RocketUser\Repository\UserRepository'),
            $serviceLocator->get('LundProducts\Repository\BrandProductCategoryRepository'),
            $serviceLocator->get('LundProducts\Repository\BrandsRepository'),
            $serviceLocator->get('LundProducts\Repository\ProductCategoriesRepository'),
            $serviceLocator->get('FormElementManager')->get('LundProducts\Form\BrandProductCategoryForm'),
            $serviceLocator->get('LundProducts\Options\LundProductsOptions')
        );

        $brandProductCategoryService->setBrandProductCategoryPrototype($serviceLocator->get('LundProducts\Entity\BrandProductCategoryPrototype'));

        return $brandProductCategoryService;
    }
}
