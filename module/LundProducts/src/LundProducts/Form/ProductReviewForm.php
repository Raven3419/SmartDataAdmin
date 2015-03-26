<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundProducts
 * @subpackage Form
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace LundProducts\Form;

use Zend\Form\Form;

/**
 * Product Review form for LundProducts module
 *
 * @category   Zend
 * @package    Admin
 * @subpackage Form
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 */
class ProductReviewForm extends Form
{
    /**
     * construct form class
     *
     * @return void
     */
    public function init()
    {
        $this->setName('product-review-form');
        $this->add(array(
            'type'    => 'LundProducts\Form\Fieldset\ProductReviewFieldset',
            'name'    => 'product-review-fieldset',
            'options' => array(
                'use_as_base_fieldset' => true,
            ),
        ));

        $this->add(array(
            'type' => 'Zend\Form\Element\Csrf',
            'name' => 'secret',
        ));
    }
}
