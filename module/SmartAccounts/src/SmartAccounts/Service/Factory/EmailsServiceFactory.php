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

use SmartAccounts\Service\EmailsService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see EmailsService}
 */
class EmailsServiceFactory implements FactoryInterface
{
    /**
     * Create Emails service from factory
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return EmailsService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $emailsService = new EmailsService(
            $serviceLocator->get('SmartAccounts\ObjectManager'),
            $serviceLocator->get('SmartAccounts\Repository\EmailsRepository'),
            $serviceLocator->get('FormElementManager')->get('SmartAccounts\Form\EmailsForm')
        );

        return $emailsService;
    }
}
