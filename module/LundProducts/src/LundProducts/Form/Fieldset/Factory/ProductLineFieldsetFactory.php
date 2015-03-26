<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * RocketUser
 *
 * @category   Zend
 * @package    LundProducts\Form\Fieldset
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace LundProducts\Form\Fieldset\Factory;

use LundProducts\Form\Fieldset\ProductLineFieldset;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see ProductLineFieldset}.
 */
class ProductLineFieldsetFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return ProductLineFieldset
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $parentLocator = $serviceLocator->getServiceLocator();
        $objectManager = $parentLocator->get('LundProducts\ObjectManager');

        $fieldset = new ProductLineFieldset($objectManager);

        return $fieldset;
    }
}
