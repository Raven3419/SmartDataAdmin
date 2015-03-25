<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartQuestions
 * @subpackage Form
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace SmartQuestions\Form;

use Zend\Form\Form;

/**
 * Question form for admin module
 *
 * @category   Zend
 * @package    SmartQuestions
 * @subpackage Form
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 */
class QuestionForm extends Form
{
    /**
     * construct form class
     *
     * @return void
     */
    public function init()
    {
        $this->setName('question-form');
        $this->setUseInputFilterDefaults(false);
        $this->add(array(
            'type'    => 'SmartQuestions\Form\Fieldset\QuestionFieldset',
            'name'    => 'question-fieldset',
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
