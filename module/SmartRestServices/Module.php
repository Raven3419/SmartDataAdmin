<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartRestServices
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartRestServices
 * @subpackage Module
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartRestServices;

use Zend\EventManager\EventInterface;
use Zend\ModuleManager\Feature\BootstrapListenerInterface;
use Zend\ModuleManager\Feature\AutoloaderProviderInterface;
use Zend\ModuleManager\Feature\ConfigProviderInterface;
use Zend\ModuleManager\Feature\ServiceProviderInterface;
use Zend\ModuleManager\Feature\ViewHelperProviderInterface;
use Zend\ModuleManager\Feature\FormElementProviderInterface;
use Zend\ModuleManager\Feature\InputFilterProviderInterface;

/**
 * SmartRestServices
 *
 * @category   Zend
 * @package    SmartRestServices
 * @subpackage Module
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class Module implements
    BootstrapListenerInterface,
    AutoloaderProviderInterface,
    ConfigProviderInterface
{
    /**
     * {@inheritDoc}
     */
    public function onBootstrap(EventInterface $e)
    {
        $sm = $e->getApplication()->getServiceManager();
    }

    /**
     * {@inheritDoc}
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\ClassMapAutoloader' => array(
                __DIR__ . '/autoload_classmap.php',
            ),
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }

    /**
     * {@inheritDoc}
     */
    public function getConfig()
    {
        $config = array();

        $configFiles = array(
            __DIR__ . '/config/module.config.php',
            __DIR__ . '/config/router.config.php'
        );

        foreach ($configFiles as $configFile) {
            $config = \Zend\Stdlib\ArrayUtils::merge($config, include $configFile);
        }

        return $config;
    }

   /**
    * {@inheritDoc}}
    */
    public function getControllerConfig()
    {
        return include __DIR__ . '/config/controller.config.php';
    }
}
