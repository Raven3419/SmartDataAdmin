<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * RocketDam
 *
 * @category   Zend
 * @package    RocketDam
 * @subpackage Config
 * @author     Jason Guthery <jason@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/RocketDam for the canonical source repository
 * @since      File available since Release 0.1.0
 */

namespace RocketDam;

return array(
    'rocket_dam' => array(
        'elfinder' => array(
            'disableLayouts' => true,
            'connectorPath'  => '/admin/dam/connector',
            'publicFolder'   => '/assets',
            'mounts'         => array(
                'library' => array(
                    'roots' => array(
                        'library' => array(
                            'driver'        => 'LocalFileSystem',
                            'path'          => __DIR__ . '/../../public/assets/library',
                            'accessControl' => 'access',
                            'mimeDetect'    => 'internal',
                            'imgLib'        => 'gd',
                        ),
                    ),
                ),
                'clients' => array(
                    'roots' => array(
                        'clients' => array(
                            'driver'         => 'LocalFileSystem',
                            'path'           => __DIR__ . '/../../public/assets/library/clients/',
                            'accessControl'  => 'access',
                            'mimeDetect'    => 'internal',
                            'imgLib'        => 'gd',
                        ),
                    ),
                ),
            ),
        ),
    ),
);
