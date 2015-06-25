<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 *
 * @category   Zend
 * @package    SmartAccounts\Form\Fieldset
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartAccounts\Form\Fieldset\Factory;

use SmartAccounts\Form\Fieldset\PlansFieldset;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see PlansFieldset}.
 */
class PlansFieldsetFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return PlansFieldset
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $parentLocator = $serviceLocator->getServiceLocator();
        $objectManager = $parentLocator->get('SmartAccounts\ObjectManager');

        $fieldset = new PlansFieldset($objectManager);

        return $fieldset;
    }
}