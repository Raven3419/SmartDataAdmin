<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/*
 * LundSite
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundSite
 * @subpackage Form
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace LundSite\Form;

use Zend\Form\Form;

/**
 * Testimonial Form
 *
 * @category   Zend
 * @package    LundSite
 * @subpackage Form
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class TestimonialForm extends Form
{
    public function init()
    {
        $this->setName('testimonial-form');

        $this->add(array(
            'type'    => 'LundSite\Form\Fieldset\TestimonialFieldset',
            'name'    => 'testimonial-fieldset',
            'options' => array(
                'use_as_base_fieldset' => true
            )
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Csrf',
            'name' => 'secret'
        ));
    }
}
