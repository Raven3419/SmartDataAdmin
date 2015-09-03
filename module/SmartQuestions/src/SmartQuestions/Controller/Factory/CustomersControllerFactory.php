<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * @category   Zend
 * @package    SmartQuestions\Controller
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace SmartQuestions\Controller\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Controller Factory
 *
 * @category   Zend
 * @package    SmartQuestions\Controller
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 */
class CustomersControllerFactory implements FactoryInterface
{
    /**
     * @param \Zend\ServiceManager\ServiceLocatorInterface $sl
     *
     * @return \SmartQuestions\Controller\CustomersController
     */
    public function createService(ServiceLocatorInterface $sl)
    {
        $sm = $sl->getServiceLocator();
        $em = $sm->get('EventManager');

        $cn = new \SmartQuestions\Controller\CustomersController(
            $sm->get('SmartQuestions\Service\CustomersService'),
            $sm->get('ViewHelperManager')
        );

        $em->attach('dispatch', function ($e) use ($cn) {
            $cn->layout()->pageTitle = 'Customer System';
            $cn->layout()->pageDescr = 'Customer Taxonomy';
        }, 100);

        $cn->setEventManager($em);

        return $cn;
    }
}
