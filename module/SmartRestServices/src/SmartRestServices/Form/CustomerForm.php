<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartRestServices
 * @subpackage Form
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace SmartRestServices\Form;

use Zend\Form\Form;

/**
 * Customer form for admin module
 *
 * @category   Zend
 * @package    SmartRestServices
 * @subpackage Form
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 */
class CustomerForm extends Form
{
    /**
     * construct form class
     *
     * @return void
     */
    public function init()
    {
        $this->setName('customer-form');
        $this->setUseInputFilterDefaults(false);
        $this->add(array(
            'type'    => 'SmartRestServices\Form\Fieldset\CustomerFieldset',
            'name'    => 'customer-fieldset',
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
