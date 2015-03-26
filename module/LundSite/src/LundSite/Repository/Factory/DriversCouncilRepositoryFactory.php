<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * LundSite
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundSite\Repository
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace LundSite\Repository\Factory;

use LundSite\Repository\DriversCouncilRepository;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * DriversCouncilRepositoryFactory
 *
 * @category   Zend
 * @package    LundSite\Repository
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class DriversCouncilRepositoryFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see   FactoryInterface::createService()
     * @param  ServiceLocatorInterface  $serviceLocator
     * @return DriversCouncilRepository
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new DriversCouncilRepository(
            $serviceLocator->get('LundSite\ObjectManager')->getRepository('LundSite\Entity\DriversCouncil')
        );
    }
}
