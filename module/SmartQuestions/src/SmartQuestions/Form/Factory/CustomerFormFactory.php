<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartQuestions
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartQuestions\Form
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartQuestions\Form\Factory;

use SmartQuestions\Form\CustomerForm;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see CustomerForm}
 *
 * @category   Zend
 * @package    SmartQuestions\Form
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class CustomerFormFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return CustomerForm
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $parentLocator = $serviceLocator->getServiceLocator();

        $form = new CustomerForm();

        $formFilter = new \Zend\InputFilter\InputFilter();
        $fieldsetInputFilter = $parentLocator->get('InputFilterManager')->get('SmartQuestions\InputFilter\CustomerFilter');
        $formFilter->add($fieldsetInputFilter, 'customer-fieldset');

        $form->setInputFilter($formFilter);

        return $form;
    }
}
