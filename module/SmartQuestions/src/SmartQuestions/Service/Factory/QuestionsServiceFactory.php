<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/*
 * SmartQuestions
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartQuestions\Service
 * @subpackage Factory
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace SmartQuestions\Service\Factory;

use SmartQuestions\Service\QuestionsService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see QuestionsService}
 */
class QuestionsServiceFactory implements FactoryInterface
{
    /**
     * Create Question service from factory
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return QuestionsService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $questionsService = new QuestionsService(
            $serviceLocator->get('SmartQuestions\ObjectManager'),
            $serviceLocator->get('SmartQuestions\Repository\QuestionsRepository'),
            $serviceLocator->get('FormElementManager')->get('SmartQuestions\Form\QuestionForm')
        );

        return $questionsService;
    }
}
