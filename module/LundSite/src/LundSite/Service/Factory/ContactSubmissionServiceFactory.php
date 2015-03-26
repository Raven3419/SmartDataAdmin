<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/*
 * LundSite
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundSite\Service
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace LundSite\Service\Factory;

use LundSite\Service\ContactSubmissionService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see ContactSubmissionService}.
 */
class ContactSubmissionServiceFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface  $serviceLocator
     * @return ContactSubmissionService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $contactSubmissionService = new ContactSubmissionService(
            $serviceLocator->get('LundSite\ObjectManager'),
            $serviceLocator->get('RocketUser\Repository\UserRepository'),
            $serviceLocator->get('RocketCms\Repository\SiteRepository'),
            $serviceLocator->get('LundSite\Repository\ContactSubmissionRepository'),
            $serviceLocator->get('FormElementManager')->get('LundSite\Form\ContactSubmissionForm')
        );

        $contactSubmissionService->setContactSubmissionPrototype($serviceLocator->get('LundSite\Entity\ContactSubmissionPrototype'));

        return $contactSubmissionService;
    }
}
