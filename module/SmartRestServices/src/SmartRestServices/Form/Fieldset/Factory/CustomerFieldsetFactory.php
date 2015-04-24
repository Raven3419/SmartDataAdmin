<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 *
 * @category   Zend
 * @package    SmartRestServices\Form\Fieldset
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartRestServices\Form\Fieldset\Factory;

use SmartRestServices\Form\Fieldset\CustomerFieldset;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see CustomerFieldset}.
 */
class CustomerFieldsetFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return CustomerFieldset
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $parentLocator = $serviceLocator->getServiceLocator();
        $objectManager = $parentLocator->get('SmartRestServices\ObjectManager');

        $fieldset = new CustomerFieldset($objectManager);

        return $fieldset;
    }
}
