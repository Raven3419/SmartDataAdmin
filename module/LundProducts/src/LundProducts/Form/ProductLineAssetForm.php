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
 * @author     Jason Guthery <jason@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 * @since      File available since Release 1.0.0
 */

namespace LundProducts\Form;

use Zend\Form\Form;

/**
 * ProductLineAsset Form
 *
 * @category   Zend
 * @package    LundProducts
 * @subpackage Form
 * @author     Jason Guthery <jason@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 */
class ProductLineAssetForm extends Form
{
    public function init()
    {
        $this->setName('product-line-asset-form');

        $this->add(array(
            'type'    => 'LundProducts\Form\Fieldset\ProductLineAssetFieldset',
            'name'    => 'product-line-asset-fieldset',
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
