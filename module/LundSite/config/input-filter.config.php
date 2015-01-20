<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * LundSite
 *
 * @category   Zend
 * @package    LundSite
 * @subpackage Config
 * @author     Mark Cizek <mark@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 * @since      File available since Release 0.1.0
 */

namespace LundSite;

return array(
    'factories' => array(
        'LundSite\InputFilter\NewsReleaseFilter'         => 'LundSite\InputFilter\Factory\NewsReleaseFilterFactory',
        'LundSite\InputFilter\ContactSubmissionFilter'   => 'LundSite\InputFilter\Factory\ContactSubmissionFilterFactory',
        'LundSite\InputFilter\DealersEdgeFilter'         => 'LundSite\InputFilter\Factory\DealersEdgeFilterFactory',
        'LundSite\InputFilter\DriversCouncilFilter'      => 'LundSite\InputFilter\Factory\DriversCouncilFilterFactory',
        'LundSite\InputFilter\ProductRegistrationFilter' => 'LundSite\InputFilter\Factory\ProductRegistrationFilterFactory',
        'LundSite\InputFilter\SupportRequestFilter'      => 'LundSite\InputFilter\Factory\SupportRequestFilterFactory',
        'LundSite\InputFilter\ShowroomFilter'            => 'LundSite\InputFilter\Factory\ShowroomFilterFactory',
        'LundSite\InputFilter\SliderFilter'              => 'LundSite\InputFilter\Factory\SliderFilterFactory',
        'LundSite\InputFilter\TestimonialFilter'         => 'LundSite\InputFilter\Factory\TestimonialFilterFactory',
    ),
);
