<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/*
 * LundProducts
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundProducts
 * @subpackage Form
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace LundProducts\Form;

use Zend\Form\Form;

/**
 * ProductLineFeature Form
 *
 * @category   Zend
 * @package    LundProducts
 * @subpackage Form
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class ProductLineFeatureForm extends Form
{
    public function init()
    {
        $this->setName('product-line-feature-form');

        $this->add(array(
            'type'    => 'LundProducts\Form\Fieldset\ProductLineFeatureFieldset',
            'name'    => 'product-line-feature-fieldset',
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
