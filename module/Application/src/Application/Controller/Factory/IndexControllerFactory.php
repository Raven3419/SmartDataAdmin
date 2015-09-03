<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * Application
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    Application\Controller
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace Application\Controller\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Application\Controller\IndexController;

/**
 * Controller Factory
 *
 * @category   Zend
 * @package    Application\Controller
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class IndexControllerFactory implements FactoryInterface
{
    /**
     * @param \Zend\ServiceManager\ServiceLocatorInterface $sl
     *
     * @return \Application\Controller\IndexController
     */
    public function createService(ServiceLocatorInterface $sl)
    {
        $sm = $sl->getServiceLocator();

        $cn = new IndexController(
            $sm->get('RocketCms\Service\SiteService'),
            $sm->get('RocketCms\Service\LayoutService'),
            $sm->get('RocketCms\Service\TemplateService'),
            $sm->get('RocketCms\Service\PageService'),
            $sm->get('RocketCms\Service\MenuService'),
            $sm->get('RocketCms\Service\MenuElementService'),
            $sm->get('RocketUser\Service\UserService'),
            $sm->get('RocketUser\Service\LoginService'),
            $sm->get('RocketDam\Service\AssetService'),
            $sm->get('RocketEcom\Service\RocketEcomService'),
            $sm->get('ViewHelperManager'),
            $sm->get('SmartQuestions\Service\CustomerQuestionsService')
        );

        return $cn;
    }
}
