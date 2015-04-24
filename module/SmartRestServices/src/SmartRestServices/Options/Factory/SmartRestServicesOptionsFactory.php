<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartRestServices
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartRestServices\Options
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartRestServices\Options\Factory;

use SmartRestServices\Options\SmartRestServicesOptions;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see SmartRestServicesOptions}.
 */
class SmartRestServicesOptionsFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return SmartRestServicesOptions
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('SmartRestServices\Config');

        if (isset($config['smart_rest_services'])) {
            return new SmartRestServicesOptions($config['smart_rest_services']);
        }

        return new SmartRestServicesOptions();
    }
}
