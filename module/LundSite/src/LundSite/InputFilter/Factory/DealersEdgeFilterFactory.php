<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * LundSite
 *
 * @category   Zend
 * @package    LundSite\InputFilter
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace LundSite\InputFilter\Factory;

use LundSite\InputFilter\DealersEdgeFilter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see DealersEdgeFilter}.
 */
class DealersEdgeFilterFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return DealersEdgeFilter
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $parentLocator  = $serviceLocator->getServiceLocator();
        $dealersEdgeRepository = $parentLocator->get('LundSite\Repository\DealersEdgeRepository');

        return new DealersEdgeFilter($dealersEdgeRepository);
    }
}
