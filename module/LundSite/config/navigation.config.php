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
    'navigation' => array(
        'admin' => array(
            array(
                'label'      => 'Smart Site Objects',
                'route'      => 'rocket-admin/lund',
                'permission' => 'LundSite\Controller\NewsRelease:index',
                'icon'       => 'icon-asterisk',
                'order'      => 550,
                'pages'      => array(
                    array(
                        'label'      => 'Manage News Releases',
                        'route'      => 'rocket-admin/lund/news-release',
                        'permission' => 'LundSite\Controller\NewsRelease:index',
                        'order'      => 551,
                        'pages'      => array(
                            array(
                                'label'           => 'Create News Release',
                                'route'           => 'rocket-admin/lund/news-release/create',
                                'permission'      => 'LundSite\Controller\NewsRelease:create',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'Edit News Release',
                                'route'           => 'rocket-admin/lund/news-release/edit',
                                'permission'      => 'LundSite\Controller\NewsRelease:edit',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'View News Release',
                                'route'           => 'rocket-admin/lund/news-release/view',
                                'permission'      => 'LundSite\Controller\NewsRelease:view',
                                'use_route_match' => true,
                            ),
                        ),
                    ),
                    array(
                        'label'      => 'Manage Showroom',
                        'route'      => 'rocket-admin/lund/showroom',
                        'permission' => 'LundSite\Controller\Showroom:index',
                        'order'      => 552,
                        'pages'      => array(
                            array(
                                'label'           => 'Create Showroom',
                                'route'           => 'rocket-admin/lund/showroom/create',
                                'permission'      => 'LundSite\Controller\Showroom:create',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'Edit Showroom',
                                'route'           => 'rocket-admin/lund/showroom/edit',
                                'permission'      => 'LundSite\Controller\Showroom:edit',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'View Showroom',
                                'route'           => 'rocket-admin/lund/showroom/view',
                                'permission'      => 'LundSite\Controller\Showroom:view',
                                'use_route_match' => true,
                            ),
                        ),
                    ),
                    array(
                        'label'      => 'Manage Sliders',
                        'route'      => 'rocket-admin/lund/slider',
                        'permission' => 'LundSite\Controller\Slider:index',
                        'order'      => 553,
                        'pages'      => array(
                            array(
                                'label'           => 'Create Slider',
                                'route'           => 'rocket-admin/lund/slider/create',
                                'permission'      => 'LundSite\Controller\Slider:create',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'Edit Slider',
                                'route'           => 'rocket-admin/lund/slider/edit',
                                'permission'      => 'LundSite\Controller\Slider:edit',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'View Slider',
                                'route'           => 'rocket-admin/lund/slider/view',
                                'permission'      => 'LundSite\Controller\Slider:view',
                                'use_route_match' => true,
                            ),
                        ),
                    ),
                    array(
                        'label'      => 'Manage Testimonials',
                        'route'      => 'rocket-admin/lund/testimonial',
                        'permission' => 'LundSite\Controller\Testimonial:index',
                        'order'      => 554,
                        'pages'      => array(
                            array(
                                'label'           => 'Create Testimonial',
                                'route'           => 'rocket-admin/lund/testimonial/create',
                                'permission'      => 'LundSite\Controller\Testimonial:create',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'Edit Testimonial',
                                'route'           => 'rocket-admin/lund/testimonial/edit',
                                'permission'      => 'LundSite\Controller\Testimonial:edit',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'View Testimonial',
                                'route'           => 'rocket-admin/lund/testimonial/view',
                                'permission'      => 'LundSite\Controller\Testimonial:view',
                                'use_route_match' => true,
                            ),
                        ),
                    ),
                    array(
                        'label'      => 'Manage Contact Submissions',
                        'route'      => 'rocket-admin/lund/contact-submission',
                        'permission' => 'LundSite\Controller\ContactSubmission:index',
                        'order'      => 555,
                        'pages'      => array(
                            array(
                                'label'           => 'Create Contact Submission',
                                'route'           => 'rocket-admin/lund/contact-submission/create',
                                'permission'      => 'LundSite\Controller\ContactSubmission:create',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'Edit Contact Submission',
                                'route'           => 'rocket-admin/lund/contact-submission/edit',
                                'permission'      => 'LundSite\Controller\ContactSubmission:edit',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'View Contact Submission',
                                'route'           => 'rocket-admin/lund/contact-submission/view',
                                'permission'      => 'LundSite\Controller\ContactSubmission:view',
                                'use_route_match' => true,
                            ),
                        ),
                    ),
                    array(
                        'label'      => 'Manage Support Requests',
                        'route'      => 'rocket-admin/lund/support-request',
                        'permission' => 'LundSite\Controller\SupportRequest:index',
                        'order'      => 556,
                        'pages'      => array(
                            array(
                                'label'           => 'Create Support Request',
                                'route'           => 'rocket-admin/lund/support-request/create',
                                'permission'      => 'LundSite\Controller\SupportRequest:create',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'Edit Support Request',
                                'route'           => 'rocket-admin/lund/support-request/edit',
                                'permission'      => 'LundSite\Controller\SupportRequest:edit',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'View Support Request',
                                'route'           => 'rocket-admin/lund/support-request/view',
                                'permission'      => 'LundSite\Controller\SupportRequest:view',
                                'use_route_match' => true,
                            ),
                        ),
                    ),
                    array(
                        'label'      => 'Manage Product Registrations',
                        'route'      => 'rocket-admin/lund/product-registration',
                        'permission' => 'LundSite\Controller\ProductRegistration:index',
                        'order'      => 557,
                        'pages'      => array(
                            array(
                                'label'           => 'Create Product Registration',
                                'route'           => 'rocket-admin/lund/product-registration/create',
                                'permission'      => 'LundSite\Controller\ProductRegistration:create',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'Edit Product Registration',
                                'route'           => 'rocket-admin/lund/product-registration/edit',
                                'permission'      => 'LundSite\Controller\ProductRegistration:edit',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'View Product Registration',
                                'route'           => 'rocket-admin/lund/product-registration/view',
                                'permission'      => 'LundSite\Controller\ProductRegistration:view',
                                'use_route_match' => true,
                            ),
                        ),
                    ),
                    array(
                        'label'      => 'Manage Dealers Edge Requests',
                        'route'      => 'rocket-admin/lund/dealers-edge',
                        'permission' => 'LundSite\Controller\DealersEdge:index',
                        'order'      => 558,
                        'pages'      => array(
                            array(
                                'label'           => 'Create Dealers Edge',
                                'route'           => 'rocket-admin/lund/dealers-edge/create',
                                'permission'      => 'LundSite\Controller\DealersEdge:create',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'Edit Dealers Edge',
                                'route'           => 'rocket-admin/lund/dealers-edge/edit',
                                'permission'      => 'LundSite\Controller\DealersEdge:edit',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'View Dealers Edge Request',
                                'route'           => 'rocket-admin/lund/dealers-edge/view',
                                'permission'      => 'LundSite\Controller\DealersEdge:view',
                                'use_route_match' => true,
                            ),
                        ),
                    ),
                    array(
                        'label'      => 'Manage Drivers Council Requests',
                        'route'      => 'rocket-admin/lund/drivers-council',
                        'permission' => 'LundSite\Controller\DriversCouncil:index',
                        'order'      => 559,
                        'pages'      => array(
                            array(
                                'label'           => 'Create Drivers Council',
                                'route'           => 'rocket-admin/lund/drivers-council/create',
                                'permission'      => 'LundSite\Controller\DriversCouncil:create',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'Edit Drivers Council',
                                'route'           => 'rocket-admin/lund/drivers-council/edit',
                                'permission'      => 'LundSite\Controller\DriversCouncil:edit',
                                'use_route_match' => true,
                            ),
                            array(
                                'label'           => 'View Drivers Council Request',
                                'route'           => 'rocket-admin/lund/drivers-council/view',
                                'permission'      => 'LundSite\Controller\DriversCouncil:view',
                                'use_route_match' => true,
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);
