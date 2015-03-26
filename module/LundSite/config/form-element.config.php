<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/**
 * LundSite
 *
 * @category   Zend
 * @package    LundSite
 * @subpackage Config
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 0.1.0
 */

namespace LundSite;

return array(
    'factories' => array(
        'LundSite\Form\NewsReleaseForm'                      => 'LundSite\Form\Factory\NewsReleaseFormFactory',
        'LundSite\Form\Fieldset\NewsReleaseFieldset'         => 'LundSite\Form\Fieldset\Factory\NewsReleaseFieldsetFactory',
        'LundSite\Form\ContactSubmissionForm'                => 'LundSite\Form\Factory\ContactSubmissionFormFactory',
        'LundSite\Form\Fieldset\ContactSubmissionFieldset'   => 'LundSite\Form\Fieldset\Factory\ContactSubmissionFieldsetFactory',
        'LundSite\Form\DealersEdgeForm'                      => 'LundSite\Form\Factory\DealersEdgeFormFactory',
        'LundSite\Form\Fieldset\DealersEdgeFieldset'         => 'LundSite\Form\Fieldset\Factory\DealersEdgeFieldsetFactory',
        'LundSite\Form\DriversCouncilForm'                   => 'LundSite\Form\Factory\DriversCouncilFormFactory',
        'LundSite\Form\Fieldset\DriversCouncilFieldset'      => 'LundSite\Form\Fieldset\Factory\DriversCouncilFieldsetFactory',
        'LundSite\Form\ProductRegistrationForm'              => 'LundSite\Form\Factory\ProductRegistrationFormFactory',
        'LundSite\Form\Fieldset\ProductRegistrationFieldset' => 'LundSite\Form\Fieldset\Factory\ProductRegistrationFieldsetFactory',
        'LundSite\Form\SupportRequestForm'                   => 'LundSite\Form\Factory\SupportRequestFormFactory',
        'LundSite\Form\Fieldset\SupportRequestFieldset'      => 'LundSite\Form\Fieldset\Factory\SupportRequestFieldsetFactory',
        'LundSite\Form\ShowroomForm'                         => 'LundSite\Form\Factory\ShowroomFormFactory',
        'LundSite\Form\Fieldset\ShowroomFieldset'            => 'LundSite\Form\Fieldset\Factory\ShowroomFieldsetFactory',
        'LundSite\Form\SliderForm'                           => 'LundSite\Form\Factory\SliderFormFactory',
        'LundSite\Form\Fieldset\SliderFieldset'              => 'LundSite\Form\Fieldset\Factory\SliderFieldsetFactory',
        'LundSite\Form\TestimonialForm'                      => 'LundSite\Form\Factory\TestimonialFormFactory',
        'LundSite\Form\Fieldset\TestimonialFieldset'         => 'LundSite\Form\Fieldset\Factory\TestimonialFieldsetFactory',
    ),
);
