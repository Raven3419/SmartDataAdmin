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

use SmartQuestions\Service\SmartQuestionService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see SmartQuestionService}.
 */
class SmartQuestionServiceFactory implements FactoryInterface
{
    /**
     * createService(): defined by FactoryInterface.
     *
     * @see    FactoryInterface::createService()
     * @param  ServiceLocatorInterface $serviceLocator
     * @return SmartQuestionService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $smartGradeService = new SmartQuestionService(
            $serviceLocator->get('SmartQuestions\ObjectManager'),
            $serviceLocator->get('SmartQuestions\Service\GradesService'),
            $serviceLocator->get('SmartQuestions\Service\QuestionsService'),
            $serviceLocator->get('SmartQuestions\Service\SubjectsService')
        );

        return $smartGradeService;
    }
}
