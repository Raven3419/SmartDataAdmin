<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/*
 * SmartAccounts
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartAccounts\Service
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace SmartAccounts\Service\Factory;

use SmartAccounts\Service\PlansService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see PlansService}
 */
class PlansServiceFactory implements FactoryInterface
{
    /**
     * Create Plans service from factory
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return PlansService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $plansService = new PlansService(
            $serviceLocator->get('SmartAccounts\ObjectManager'),
            $serviceLocator->get('SmartAccounts\Repository\PlansRepository'),
            $serviceLocator->get('FormElementManager')->get('SmartAccounts\Form\PlansForm')
        );

        return $plansService;
    }
}
