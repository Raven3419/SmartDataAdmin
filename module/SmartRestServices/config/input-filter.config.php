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
    'factories' => array(
        'SmartRestServices\InputFilter\CustomerFilter'                => 'SmartRestServices\InputFilter\Factory\CustomerFilterFactory',
    ),
);
