<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * LundSite
 *
 * @category   Zend
 * @package    LundSite\InputFilter
 * @subpackage Factory
 * @author     Jason Guthery <jason@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 * @since      File available since Release 0.1.0
 */

namespace LundSite\InputFilter\Factory;

use LundSite\InputFilter\DriversCouncilFilter;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see DriversCouncilFilter}.
 */
class DriversCouncilFilterFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return DriversCouncilFilter
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $parentLocator  = $serviceLocator->getServiceLocator();
        $driversCouncilRepository = $parentLocator->get('LundSite\Repository\DriversCouncilRepository');

        return new DriversCouncilFilter($driversCouncilRepository);
    }
}
