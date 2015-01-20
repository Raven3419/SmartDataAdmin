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
 * @author     Jason Guthery <jason@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 * @since      File available since Release 1.0.0
 */

namespace LundSite\Form;

use Zend\Form\Form;

/**
 * Showroom Form
 *
 * @category   Zend
 * @package    LundSite
 * @subpackage Form
 * @author     Jason Guthery <jason@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
 */
class ShowroomForm extends Form
{
    public function init()
    {
        $this->setName('showroom-form');

        $this->add(array(
            'type'    => 'LundSite\Form\Fieldset\ShowroomFieldset',
            'name'    => 'showroom-fieldset',
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
