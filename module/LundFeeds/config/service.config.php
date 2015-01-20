<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * LundFeeds
 *
 * @category   Zend
 * @package    LundFeeds
 * @subpackage Config
 * @author     Mark Cizek <mark@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 * @since      File available since Release 0.1.0
 */

namespace LundFeeds;

return array(
    'abstract_factories' => array(
        'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
        'Zend\Log\LoggerAbstractServiceFactory',
    ),
    'aliases' => array(
        'LundFeeds\ObjectManager' => 'Doctrine\ORM\EntityManager',
    ),
    'invokables' => array(
        //'LundFeeds\Entity\BrandsPrototype'                   => 'LundFeeds\Entity\BrandsEntity',
    ),
    'factories' => array(
        'LundFeeds\Config'              => 'LundFeeds\Factory\ConfigFactory',
        'LundFeeds\Service\AcesService' => 'LundFeeds\Service\Factory\AcesServiceFactory',
        'LundFeeds\Service\PiesService' => 'LundFeeds\Service\Factory\PiesServiceFactory',
    ),
);
