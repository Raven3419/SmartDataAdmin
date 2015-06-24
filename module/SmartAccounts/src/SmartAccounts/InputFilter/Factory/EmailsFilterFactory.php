<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartAccounts
 *
 * @category   Zend
 * @package    SmartAccounts\InputFilter
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartAccounts\InputFilter\Factory;

use SmartAccounts\InputFilter\EmailsFilter;
use DoctrineModule\Validator\UniqueObject;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see EmailsFilter}.
 */
class EmailsFilterFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return EmailsFilter
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $parentLocator    	= $serviceLocator->getServiceLocator();
        $emailsRepository 	= $parentLocator->get('SmartAccounts\Repository\EmailsRepository');
        $options          	= $parentLocator->get('SmartAccounts\Options\SmartAccountsOptions');


        return new EmailsFilter($emailsRepository, $options);
    }
}
