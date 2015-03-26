<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * LundFeeds
 *
 * @category   Zend
 * @package    LundFeeds
 * @subpackage Config
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace LundFeeds;

return array(
    'factories' => array(
        'LundFeeds\Controller\Aces' => 'LundFeeds\Controller\Factory\AcesControllerFactory',
        'LundFeeds\Controller\Pies' => 'LundFeeds\Controller\Factory\PiesControllerFactory',
    ),
);
