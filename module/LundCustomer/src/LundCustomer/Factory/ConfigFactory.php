<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/*
 * LundCustomer
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundCustomer
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace LundCustomer\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * LundCustomer
 *
 * Service factory that instantiates the rocket_admin config.
 *
 * @category   Zend
 * @package    LundCustomer
 * @subpackage Module
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class ConfigFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return array
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');

        if (isset($config['lund_customer'])) {
            return $config['lund_customer'];
        }

        return array();
    }
}
