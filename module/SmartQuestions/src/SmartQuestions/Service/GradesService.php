<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/*
 * SmartQuestions
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartQuestions
 * @subpackage Service
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace SmartQuestions\Service;

use Zend\EventManager\Eventmanager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SmartQuestions\Entity\Grades;
use SmartQuestions\Repository\GradesRepositoryInterface;
use SmartQuestions\Form\GradeForm;
use SmartQuestions\Entity\GradesInterface;
use RocketUser\Entity\User;
use DateTime;

/*
 * Service managing the CRUD of grades.
 */
class GradesService implements EventManagerAwareInterface
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
     * @var ObjectRepository
     */
    protected $repository;

    /**
     * @var GradesForm
     */
    protected $gradesForm;

    /**
     * @var GradesInterface
     */
    protected $gradesPrototype;

    /**
     * @param ObjectManager             $objectManager
     * @param GradesRepositoryInterface $repository
     * @param FormInterface             $gradesForm
     */
    public function __construct(
        ObjectManager             $objectManager,
        GradesRepositoryInterface $repository,
        FormInterface             $gradesForm
    )
    {
        $this->objectManager = $objectManager;
        $this->repository    = $repository;
        $this->gradesForm    = $gradesForm;
    }

    /**
     * @return mixed
     */
    public function getActiveGrades()
    {
        return $this->repository->findBy(
            array('disabled' => false),
            array('createdAt' => 'ASC')
        );
    }

    /**
     * @return mixed
     */
    public function getCurrentGrades()
    {
        return $this->repository->findBy(
            array('disabled' => false),
            array('createdAt' => 'ASC')
        );
    }

    /**
     * Return grade record
     *
     * @param  string          $name
     * @return GradesInterface
     */
    public function getGradeByName($name = null)
    {
        return $this->repository->findOneBy(
            array('name' => $name)
        );
    }

    /**
     * Return create GradeForm
     *
     * @return GradeForm
     */
    public function getCreateGradeForm()
    {
        $this->gradesForm->bind(clone $this->getGradesPrototype());

        return $this->gradesForm;
    }

    /**
     * Return edit GradeForm
     *
     * @param  string    $gradeId
     * @return GradeForm
     */
    public function getEditGradeForm($gradeId)
    {
        $grade = $this->repository->find($gradeId);

        $this->gradesForm->bind($grade);

        return $this->gradesForm;
    }

    /**
     * @return GradesInterface
     */
    public function getGradesPrototype()
    {
        if ($this->gradesPrototype === null) {
            $this->setGradesPrototype(new Grades());
        }

        return $this->gradesPrototype;
    }

    /**
     * @param  GradesInterface $gradesPrototype
     * @return GradesService
     */
    public function setGradesPrototype(GradesInterface $gradesPrototype)
    {
        $this->gradesPrototype = $gradesPrototype;

        return $this;
    }

    /**
     * @param integer $recordId
     *
     * @return mixed
     */
    public function getGrade($recordId)
    {
        return $this->repository->find($recordId);
    }

    /**
     * @param \Admin\Entity\Grades $recordEntity
     * @param \Admin\Entity\User   $usersEntity
     */
    public function createGrade(Grades $recordEntity, User $usersEntity)
    {
        $recordEntity->setCreatedAt(new DateTime('now'))
            ->setCreatedBy($usersEntity->getUsername())
            ->setDisabled(false);
        $this->objectManager->persist($recordEntity);
        $this->objectManager->flush($recordEntity);
        
        //$this->flushCache();
        return $recordEntity;
    }

    /**
     * @param \Admin\Entity\Grades $recordEntity
     * @param \Admin\Entity\User   $usersEntity
     *
     * @return \Admin\Entity\Grades $recordEntity
     */
    public function editGrade(Grades $recordEntity, User $usersEntity)
    {
        $recordEntity->setModifiedAt(new DateTime('now'))
            ->setModifiedBy($usersEntity->getUsername());
        $this->objectManager->persist($recordEntity);
        $this->objectManager->flush($recordEntity);
        //$this->flushCache();
        return $recordEntity;
    }

    /**
     * @param \Admin\Entity\Grades $recordEntity
     * @param \Admin\Entity\User   $usersEntity
     *
     * @return \Admin\Entity\Grades $recordEntity
     */
    public function deleteGrade(Grades $recordEntity, User $usersEntity)
    {
        $recordEntity->setModifiedAt(new DateTime('now'))
            ->setModifiedBy($usersEntity->getUsername())
            ->setDeleted(true)
            ->setDisabled(true);
        $this->objectManager->persist($recordEntity);
        $this->objectManager->flush($recordEntity);
        //$this->flushCache();
        return $recordEntity;
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
