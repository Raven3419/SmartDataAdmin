<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/*
 * SmartQuestion
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartQuestion
 * @subpackage Service
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace SmartQuestions\Service;

use RocketCms\Entity\SiteInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use SmartQuestions\Service\GradesService;
use SmartQuestions\Service\SubjectsService;
use SmartQuestions\Service\QuestionsService;

/**
 * Service injecting all lund product services.
 */
class SmartQuestionService implements EventManagerAwareInterface
{
    /**
     * @var EventManagerInterface
     */
    protected $eventManager;

    /**
     * @var ObjectManager
     */
    protected $objectManager;

    /**
     * @var GradesService
     */
    protected $gradesService;

    /**
     * @var QuestionsService
     */
    protected $questionsService;

    /**
     * @var SubjectsService
     */
    protected $subjectsService;

    /**
     * @param ObjectManager                        	$objectManager
     * @param GradesService                   		$gradesServie
     * @param QuestionsService                   	$questionsServie
     * @param SubjectsService                   	$subjectsServie
     */
    public function __construct(
        ObjectManager $objectManager,
        GradesService $gradesService,
        QuestionsService $questionsService,
        SubjectsService $subjectsService
    ) {
        $this->objectManager = $objectManager;
        $this->gradesService = $gradesService;
        $this->questionsService = $questionsService;
        $this->subjectsService = $subjectsService;
    }
    
    /**
     * Return GradesService
     *
     * @return GradesService
     */
    public function getGradesService()
    {
    	return $this->gradesService;
    }
    
    /**
     * Return QuestionsService
     *
     * @return QuestionsService
     */
    public function getQuestionsService()
    {
    	return $this->questionsService;
    }

    /**
     * Return SubjectsService
     *
     * @return SubjectsService
     */
    public function getSubjectsService()
    {
        return $this->subjectsService;
    }

    /**
     * setEventManager(): defined by EventManagerAwareInterface.
     *
     * @see    EventManagerAwareInterface::setEventManager()
     * @param  EventManagerInterface $eventManager
     * @return void
     */
    public function setEventManager(EventManagerInterface $eventManager)
    {
        $eventManager->setIdentifiers(array(__CLASS__, get_class($this)));

        $this->eventManager = $eventManager;
    }

    /**
     * getEventManager(): defined by EventManagerAwareInterface.
     *
     * @see    EventManagerAwareInterface::getEventManager()
     * @return EventManagerInterface
     */
    public function getEventManager()
    {
        if (null === $this->eventManager) {
            $this->setEventManager(new EventManager());
        }

        return $this->eventManager;
    }
}
