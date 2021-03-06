<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 *
 * @category   Zend
 * @package    RocketUser\Form\Fieldset
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartQuestions\Form\Fieldset\Factory;

use SmartQuestions\Form\Fieldset\GradeFieldset;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see GradeFieldset}.
 */
class GradeFieldsetFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return GradeFieldset
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $parentLocator = $serviceLocator->getServiceLocator();
        $objectManager = $parentLocator->get('SmartQuestions\ObjectManager');

        $fieldset = new GradeFieldset($objectManager);

        return $fieldset;
    }
}
