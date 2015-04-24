<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * SmartRestServices
 *
 * @category   Zend
 * @package    SmartRestServices
 * @subpackage Config
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace SmartRestServices;

return array(
    'abstract_factories' => array(
        'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
        'Zend\Log\LoggerAbstractServiceFactory',
    ),
    'aliases' => array(
        'SmartRestServices\ObjectManager' => 'Doctrine\ORM\EntityManager',
    ),
    'invokables' => array(
        'SmartRestServices\Entity\CustomerPrototype'                	=> 'SmartRestServices\Entity\Customer',
    ),
    'factories' => array(
        'SmartRestServices\Options\SmartRestServicesOptions'         	=> 'SmartRestServices\Options\Factory\SmartRestServicesOptionsFactory',
        'SmartRestServices\Service\SmartRestServicesService'          	=> 'SmartRestServices\Service\Factory\SmartRestServicesServiceFactory',
        'SmartRestServices\Config'                               		=> 'SmartRestServices\Factory\ConfigFactory',
        'SmartRestServices\Repository\CustomerRepository'           	=> 'SmartRestServices\Repository\Factory\CustomerRepositoryFactory',
        'SmartRestServices\Service\CustomerService'               		=> 'SmartRestServices\Service\Factory\CustomerServiceFactory',
	),
);
