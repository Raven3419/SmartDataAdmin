<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * LundProducts
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundProducts\Form
 * @subpackage Factory
 * @author     Mark Cizek <mark@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 * @since      File available since Release 0.1.0
 */

namespace LundProducts\Form\Factory;

use LundProducts\Form\BrandForm;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see BrandForm}
 *
 * @category   Zend
 * @package    LundProducts\Form
 * @subpackage Factory
 * @author     Mark Cizek <mark@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 */
class BrandFormFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return BrandForm
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $parentLocator = $serviceLocator->getServiceLocator();

        $form = new BrandForm();

        $formFilter = new \Zend\InputFilter\InputFilter();
        $fieldsetInputFilter = $parentLocator->get('InputFilterManager')->get('LundProducts\InputFilter\BrandFilter');
        $formFilter->add($fieldsetInputFilter, 'brand-fieldset');

        $form->setInputFilter($formFilter);

        return $form;
    }
}
