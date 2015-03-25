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

use SmartQuestions\Service\GradesService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see GradesService}
 */
class GradesServiceFactory implements FactoryInterface
{
    /**
     * Create Grade service from factory
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return GradesService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $gradesService = new GradesService(
            $serviceLocator->get('SmartQuestions\ObjectManager'),
            $serviceLocator->get('SmartQuestions\Repository\GradesRepository'),
            $serviceLocator->get('FormElementManager')->get('SmartQuestions\Form\GradeForm')
        );

        return $gradesService;
    }
}
