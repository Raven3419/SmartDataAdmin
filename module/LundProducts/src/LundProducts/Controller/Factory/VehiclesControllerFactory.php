<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * @category   Zend
 * @package    LundProducts\Controller
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace LundProducts\Controller\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Controller Factory
 *
 * @category   Zend
 * @package    LundProducts\Controller
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 */
class VehiclesControllerFactory implements FactoryInterface
{
    /**
     * @param \Zend\ServiceManager\ServiceLocatorInterface $sl
     *
     * @return \LundProducts\Controller\VehiclesController
     */
    public function createService(ServiceLocatorInterface $sl)
    {
        $sm = $sl->getServiceLocator();
        $em = $sm->get('EventManager');

        $cn = new \LundProducts\Controller\VehiclesController(
            $sm->get('LundProducts\Service\VehCollectionService')
        );

        $em->attach('dispatch', function ($e) use ($cn) {
            $cn->layout()->pageTitle = 'Product System';
            $cn->layout()->pageDescr = 'Product Taxonomy';
        }, 100);

        $cn->setEventManager($em);

        return $cn;
    }
}
