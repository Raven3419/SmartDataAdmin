<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartQuestions
 *
 * @category   Zend
 * @package    SmartQuestions\InputFilter
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartQuestions\InputFilter\Factory;

use SmartQuestions\InputFilter\CustomerFilter;
use DoctrineModule\Validator\UniqueObject;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see CustomerFilter}.
 */
class CustomerFilterFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return CustomerFilter
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $parentLocator    = $serviceLocator->getServiceLocator();
        $customersRepository = $parentLocator->get('SmartQuestions\Repository\CustomersRepository');
        $options          = $parentLocator->get('SmartQuestions\Options\SmartQuestionsOptions');


        return new CustomerFilter($customersRepository, $options);
    }
}
