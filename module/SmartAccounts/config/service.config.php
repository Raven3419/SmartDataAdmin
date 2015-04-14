<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartAccounts
 *
 * @category   Zend
 * @package    SmartAccounts
 * @subpackage Config
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartAccounts;

return array(
    'abstract_factories' => array(
        'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
        'Zend\Log\LoggerAbstractServiceFactory',
    ),
    'aliases' => array(
        'SmartAccounts\ObjectManager' => 'Doctrine\ORM\EntityManager',
    ),
    'invokables' => array(
        'SmartAccounts\Entity\CustomerPrototype'                	=> 'SmartAccounts\Entity\Customer',
    ),
    'factories' => array(
        'SmartAccounts\Options\SmartAccountsOptions'         	=> 'SmartAccounts\Options\Factory\SmartAccountsOptionsFactory',
        'SmartAccounts\Service\SmartAccountsService'          	=> 'SmartAccounts\Service\Factory\SmartAccountsServiceFactory',
        'SmartAccounts\Config'                               	=> 'SmartAccounts\Factory\ConfigFactory',
        'SmartAccounts\Repository\CustomerRepository'           	=> 'SmartAccounts\Repository\Factory\CustomerRepositoryFactory',
        'SmartAccounts\Service\CustomerService'               	=> 'SmartAccounts\Service\Factory\CustomerServiceFactory',
	),
);
