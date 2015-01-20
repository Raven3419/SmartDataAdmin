<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * LundProducts
 *
 * @category   Zend
 * @package    LundProducts\InputFilter
 * @subpackage Factory
 * @author     Jason Guthery <jason@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 * @since      File available since Release 0.1.0
 */

namespace LundProducts\InputFilter\Factory;

use LundProducts\InputFilter\BrandProductCategoryFilter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see BrandProductCategoryFilter}.
 */
class BrandProductCategoryFilterFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return BrandProductCategoryFilter
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $parentLocator  = $serviceLocator->getServiceLocator();
        $brandProductCategoryRepository = $parentLocator->get('LundProducts\Repository\BrandProductCategoryRepository');

        return new BrandProductCategoryFilter($brandProductCategoryRepository);
    }
}
