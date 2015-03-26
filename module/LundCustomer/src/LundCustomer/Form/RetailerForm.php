<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/*
 * LundCustomer
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundCustomer
 * @subpackage Form
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace LundCustomer\Form;

use Zend\Form\Form;

/**
 * Retailer Form
 *
 * @category   Zend
 * @package    LundCustomer
 * @subpackage Form
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class RetailerForm extends Form
{
    public function init()
    {
        $this->setName('retailer-form');

        $this->add(array(
            'type'    => 'LundCustomer\Form\Fieldset\RetailerFieldset',
            'name'    => 'retailer-fieldset',
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
