<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * Lund Digital Platform Application
 *
 * @category   Zend
 * @package    Application
 * @subpackage Config
 * @author     Jason Guthery <jason@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 * @since      File available since Release 0.1.0
 */

namespace Application;

return array(
    'factories' => array(
        'Application\Controller\Index'    => 'Application\Controller\Factory\IndexControllerFactory',
    ),
);
