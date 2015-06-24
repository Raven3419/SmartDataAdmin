<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartAccounts
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartAccounts\Form
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartAccounts\Form\Factory;

use SmartAccounts\Form\AccountsForm;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see AccountsForm}
 *
 * @category   Zend
 * @package    SmartAccounts\Form
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class AccountsFormFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return AccountsForm
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $parentLocator = $serviceLocator->getServiceLocator();

        $form = new AccountsForm();

        $formFilter = new \Zend\InputFilter\InputFilter();
        $fieldsetInputFilter = $parentLocator->get('InputFilterManager')->get('SmartAccounts\InputFilter\AccountsFilter');
        $formFilter->add($fieldsetInputFilter, 'accounts-fieldset');

        $form->setInputFilter($formFilter);

        return $form;
    }
}
