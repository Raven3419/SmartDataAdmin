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

use SmartQuestions\Service\SubjectsService;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Service factory that instantiates {@see SubjectsService}
 */
class SubjectsServiceFactory implements FactoryInterface
{
    /**
     * Create Subject service from factory
     *
     * @param ServiceLocatorInterface $serviceLocator
     *
     * @return SubjectsService
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $subjectsService = new SubjectsService(
            $serviceLocator->get('SmartQuestions\ObjectManager'),
            $serviceLocator->get('SmartQuestions\Repository\SubjectsRepository'),
            $serviceLocator->get('FormElementManager')->get('SmartQuestions\Form\SubjectForm')
        );

        return $subjectsService;
    }
}
