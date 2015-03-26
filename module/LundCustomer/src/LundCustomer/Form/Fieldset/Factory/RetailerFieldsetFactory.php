<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * LundCustomer
 *
 * @category   Zend
 * @package    LundCustomer\Form\Fieldset
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace LundCustomer\Form\Fieldset\Factory;

use LundCustomer\Form\Fieldset\RetailerFieldset;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see RetailerFieldset}.
 */
class RetailerFieldsetFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return RetailerFieldset
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $parentLocator = $serviceLocator->getServiceLocator();
        $options       = $parentLocator->get('LundCustomer\Options\LundCustomerOptions');
        $objectManager = $parentLocator->get('LundCustomer\ObjectManager');

        $fieldset = new RetailerFieldset($options, $objectManager);

        return $fieldset;
    }
}
