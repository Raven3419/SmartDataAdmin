<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * LundProducts
 *
 * @category   Zend
 * @package    LundProducts\InputFilter
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace LundProducts\InputFilter\Factory;

use LundProducts\InputFilter\ProductLineFilter;
use DoctrineModule\Validator\UniqueObject;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see ProductLineFilter}.
 */
class ProductLineFilterFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return ProductLineFilter
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $parentLocator          = $serviceLocator->getServiceLocator();
        $productLinesRepository = $parentLocator->get('LundProducts\Repository\ProductLinesRepository');
        $options                = $parentLocator->get('LundProducts\Options\LundProductsOptions');

        $shortCodeValidator = new UniqueObject(array(
            'object_manager'    => $parentLocator->get('LundProducts\ObjectManager'),
            'object_repository' => $productLinesRepository,
            'fields'            => 'shortCode',
        ));

        return new ProductLineFilter($productLinesRepository, $shortCodeValidator, $options);
    }
}
