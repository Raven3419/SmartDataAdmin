<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartAccounts
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartAccounts\Options
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartAccounts\Options\Factory;

use SmartAccounts\Options\SmartAccountsOptions;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see SmartAccountsOptions}.
 */
class SmartAccountsOptionsFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return SmartAccountsOptions
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('SmartAccounts\Config');

        if (isset($config['smart_accounts'])) {
            return new SmartAccountsOptions($config['smart_accounts']);
        }

        return new SmartAccountsOptions();
    }
}
