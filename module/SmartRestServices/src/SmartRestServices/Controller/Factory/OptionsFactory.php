<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * This source file is part of Commander.
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartRestServices\Controller
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace SmartRestServices\Controller\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use SmartRestServices\Controller\Options;

/**
 * Controller Factory
 *
 * @category   Zend
 * @package    SmartRestServices\Controller
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 */
class OptionsFactory implements FactoryInterface
{
    /**
     * Create Options instance from config
     *
     * @param ServiceLocatorInterface $sl
     *
     * @return SmartRestServices\Controller\Options
     */
    public function createService(ServiceLocatorInterface $sl)
    {
        $config = $sl->get('Config');

        $options = isset($config['rr_admin']['options']) ?
            $config['rr_admin']['options'] :
            array();

        return new Options($options);
    }
}
