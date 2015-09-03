<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/*
 * SmartQuestions
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartQuestions\Service
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace SmartQuestions\Service\Factory;

use SmartQuestions\Service\CustomersService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see CustomersService}
 */
class CustomersServiceFactory implements FactoryInterface
{
    /**
     * Create Customer service from factory
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return CustomersService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $customersService = new CustomersService(
            $serviceLocator->get('SmartQuestions\ObjectManager'),
            $serviceLocator->get('SmartQuestions\Repository\CustomersRepository'),
            $serviceLocator->get('FormElementManager')->get('SmartQuestions\Form\CustomerForm')
        );

        return $customersService;
    }
}
