<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * LundSite
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundSite\Controller
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace LundSite\Controller\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use LundSite\Controller\ContactSubmissionController;

/**
 * Controller Factory
 *
 * @category   Zend
 * @package    LundSite\Controller
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class ContactSubmissionControllerFactory implements FactoryInterface
{
    /**
     * @param \Zend\ServiceManager\ServiceLocatorInterface $sl
     *
     * @return \LundSite\Controller\ContactSubmissionController
     */
    public function createService(ServiceLocatorInterface $sl)
    {
        $sm = $sl->getServiceLocator();
        $em = $sm->get('EventManager');

        $cn = new ContactSubmissionController(
            $sm->get('RocketCms\Service\SiteService'),
            $sm->get('LundSite\Service\ContactSubmissionService'),
            $sm->get('ViewHelperManager')
        );

        $em->attach('dispatch', function ($e) use ($cn) {
            $cn->layout()->pageTitle = 'Lund Site';
            $cn->layout()->pageDescr = 'Contact Submission System';
        }, 100);

        $cn->setEventManager($em);

        return $cn;
    }
}
