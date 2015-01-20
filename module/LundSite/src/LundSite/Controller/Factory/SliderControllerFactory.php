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
 * @author     Jason Guthery <jason@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 * @since      File available since Release 1.0.0
 */

namespace LundSite\Controller\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use LundSite\Controller\SliderController;

/**
 * Controller Factory
 *
 * @category   Zend
 * @package    LundSite\Controller
 * @subpackage Factory
 * @author     Jason Guthery <jason@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 */
class SliderControllerFactory implements FactoryInterface
{
    /**
     * @param \Zend\ServiceManager\ServiceLocatorInterface $sl
     *
     * @return \LundSite\Controller\SliderController
     */
    public function createService(ServiceLocatorInterface $sl)
    {
        $sm = $sl->getServiceLocator();
        $em = $sm->get('EventManager');

        $cn = new SliderController(
            $sm->get('RocketCms\Service\SiteService'),
            $sm->get('LundSite\Service\SliderService'),
            $sm->get('ViewHelperManager')
        );

        $em->attach('dispatch', function ($e) use ($cn) {
            $cn->layout()->pageTitle = 'Lund Site';
            $cn->layout()->pageDescr = 'Slider System';
        }, 100);

        $cn->setEventManager($em);

        return $cn;
    }
}
