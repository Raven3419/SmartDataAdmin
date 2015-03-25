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
use SmartQuestions\Entity\Subjects;
use SmartQuestions\Repository\SubjectsRepositoryInterface;
use SmartQuestions\Form\SubjectForm;
use SmartQuestions\Entity\SubjectsInterface;
use RocketUser\Entity\User;
use DateTime;

/*
 * Service managing the CRUD of subjects.
 */
class SubjectsService implements EventManagerAwareInterface
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
     * @var SubjectsForm
     */
    protected $subjectsForm;

    /**
     * @var SubjectsInterface
     */
    protected $subjectsPrototype;

    /**
     * @param ObjectManager             $objectManager
     * @param SubjectsRepositoryInterface $repository
     * @param FormInterface             $subjectsForm
     */
    public function __construct(
        ObjectManager             $objectManager,
        SubjectsRepositoryInterface $repository,
        FormInterface             $subjectsForm
    )
    {
        $this->objectManager = $objectManager;
        $this->repository    = $repository;
        $this->subjectsForm    = $subjectsForm;
    }

    /**
     * @return mixed
     */
    public function getActiveSubjects()
    {
        return $this->repository->findBy(
            array('disabled' => false),
            array('createdAt' => 'ASC')
        );
    }

    /**
     * @return mixed
     */
    public function getCurrentSubjects()
    {
        return $this->repository->findBy(
            array('disabled' => false),
            array('createdAt' => 'ASC')
        );
    }

    /**
     * Return subject record
     *
     * @param  string          $name
     * @return SubjectsInterface
     */
    public function getSubjectByName($name = null)
    {
        return $this->repository->findOneBy(
            array('name' => $name)
        );
    }

    /**
     * Return create SubjectForm
     *
     * @return SubjectForm
     */
    public function getCreateSubjectForm()
    {
        $this->subjectsForm->bind(clone $this->getSubjectsPrototype());

        return $this->subjectsForm;
    }

    /**
     * Return edit SubjectForm
     *
     * @param  string    $subjectId
     * @return SubjectForm
     */
    public function getEditSubjectForm($subjectId)
    {
        $subject = $this->repository->find($subjectId);

        $this->subjectsForm->bind($subject);

        return $this->subjectsForm;
    }

    /**
     * @return SubjectsInterface
     */
    public function getSubjectsPrototype()
    {
        if ($this->subjectsPrototype === null) {
            $this->setSubjectsPrototype(new Subjects());
        }

        return $this->subjectsPrototype;
    }

    /**
     * @param  SubjectsInterface $subjectsPrototype
     * @return SubjectsService
     */
    public function setSubjectsPrototype(SubjectsInterface $subjectsPrototype)
    {
        $this->subjectsPrototype = $subjectsPrototype;

        return $this;
    }

    /**
     * @param integer $recordId
     *
     * @return mixed
     */
    public function getSubject($recordId)
    {
        return $this->repository->find($recordId);
    }

    /**
     * @param \Admin\Entity\Subjects $recordEntity
     * @param \Admin\Entity\User   $usersEntity
     */
    public function createSubject(Subjects $recordEntity, User $usersEntity)
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
     * @param \Admin\Entity\Subjects $recordEntity
     * @param \Admin\Entity\User   $usersEntity
     *
     * @return \Admin\Entity\Subjects $recordEntity
     */
    public function editSubject(Subjects $recordEntity, User $usersEntity)
    {
        $recordEntity->setModifiedAt(new DateTime('now'))
            ->setModifiedBy($usersEntity->getUsername());
        $this->objectManager->persist($recordEntity);
        $this->objectManager->flush($recordEntity);
        //$this->flushCache();
        return $recordEntity;
    }

    /**
     * @param \Admin\Entity\Subjects $recordEntity
     * @param \Admin\Entity\User   $usersEntity
     *
     * @return \Admin\Entity\Subjects $recordEntity
     */
    public function deleteSubject(Subjects $recordEntity, User $usersEntity)
    {
        $recordEntity->setModifiedAt(new DateTime('now'))
            ->setModifiedBy($usersEntity->getUsername())
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
