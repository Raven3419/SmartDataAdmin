<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
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
class CustomerControllerFactory implements FactoryInterface
{
    /**
     * @param \Zend\ServiceManager\ServiceLocatorInterface $sl
     *
     * @return \SmartRestServices\Controller\CustomerController
     */
    public function createService(ServiceLocatorInterface $sl)
    {
        $sm = $sl->getServiceLocator();
        $em = $sm->get('EventManager');

        $cn = new \SmartRestServices\Controller\CustomerController(
            $sm->get('SmartAccounts\Service\CustomerService'),
            $sm->get('SmartAccounts\Service\AccountsService'),
            $sm->get('SmartQuestions\Service\ResultsService'),
            $sm->get('SmartQuestions\Service\QuestionsService'),
            $sm->get('SmartAccounts\Service\EmailsService'),
            $sm->get('SmartAccounts\Service\PlansService')
        );

        $em->attach('dispatch', function ($e) use ($cn) {
            $cn->layout()->pageTitle = 'Customer System';
            $cn->layout()->pageDescr = 'Customer Taxonomy';
        }, 100);

        $cn->setEventManager($em);

        return $cn;
    }
}
