<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * LundFeeds
 *
 * @category   Zend
 * @package    LundFeeds
 * @subpackage Config
 * @author     Mark Cizek <mark@rocketred.com
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 * @since      File available since Release 0.1.0
 */

namespace LundFeeds;

return array(
    'router' => array(
        'routes' => array(
            //'rocket-admin' => array(,
            //),
        ),
    ),
    'console' => array(
        'router' => array(
            'routes' => array(
                'generate-aces' => array(
                    'options' => array(
                        'route'    => 'generate aces <version> [<brand>] (full|incr):generate [<changeset_id>]',
                        'defaults' => array(
                            'controller' => 'LundFeeds\Controller\Aces',
                            'action'     => 'generateaces'
                        )
                    )
                ),
                'generate-pies' => array(
                    'options' => array(
                        'route'    => 'generate pies <version> [<brand>] (full|incr):generate [<changeset_id>]',
                        'defaults' => array(
                            'controller' => 'LundFeeds\Controller\Pies',
                            'action'     => 'generatepies'
                        )
                    )
                ),
            ),
        ),
    ),
);
