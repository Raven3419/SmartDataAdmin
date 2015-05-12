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
use SmartQuestions\Entity\Results;
use SmartQuestions\Repository\ResultsRepositoryInterface;
use SmartQuestions\Form\ResultForm;
use SmartQuestions\Entity\ResultsInterface;
use RocketUser\Entity\User;
use DateTime;

/*
 * Service managing the CRUD of results.
 */
class ResultsService implements EventManagerAwareInterface
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
     * @var ResultsForm
     */
    protected $resultsForm;

    /**
     * @var ResultsInterface
     */
    protected $resultsPrototype;

    /**
     * @param ObjectManager             $objectManager
     * @param ResultsRepositoryInterface $repository
     * @param FormInterface             $resultsForm
     */
    public function __construct(
        ObjectManager             $objectManager,
        ResultsRepositoryInterface $repository,
        FormInterface             $resultsForm
    )
    {
        $this->objectManager = $objectManager;
        $this->repository    = $repository;
        $this->resultsForm    = $resultsForm;
    }

    /**
     * @return mixed
     */
    public function getActiveResults()
    {
        return $this->repository->findBy(
            array('disabled' => false),
            array('createdAt' => 'ASC')
        );
    }

    /**
     * @return mixed
     */
    public function getCurrentResults()
    {
        return $this->repository->findBy(
            array('disabled' => false),
            array('createdAt' => 'ASC')
        );
    }

    /**
     * Return result record
     *
     * @param  string          $status
     * @return ResultsInterface
     */
    public function getResultByStatus($status = null)
    {
        return $this->repository->findOneBy(
            array('status' => $status)
        );
    }

    /**
     * Return create ResultForm
     *
     * @return ResultForm
     */
    public function getCreateResultForm()
    {
        $this->resultsForm->bind(clone $this->getResultsPrototype());

        return $this->resultsForm;
    }

    /**
     * Return edit ResultForm
     *
     * @param  string    $resultId
     * @return ResultForm
     */
    public function getEditResultForm($resultId)
    {
        $result = $this->repository->find($resultId);

        $this->resultsForm->bind($result);

        return $this->resultsForm;
    }

    /**
     * @return ResultsInterface
     */
    public function getResultsPrototype()
    {
        if ($this->resultsPrototype === null) {
            $this->setResultsPrototype(new Results());
        }

        return $this->resultsPrototype;
    }

    /**
     * @param  ResultsInterface $resultsPrototype
     * @return ResultsService
     */
    public function setResultsPrototype(ResultsInterface $resultsPrototype)
    {
        $this->resultsPrototype = $resultsPrototype;

        return $this;
    }

    /**
     * @param integer $recordId
     *
     * @return mixed
     */
    public function getResult($recordId)
    {
        return $this->repository->find($recordId);
    }

    /**
     * @param \Admin\Entity\Results $recordEntity
     * @param \Admin\Entity\User   $usersEntity
     */
    public function createResult(Results $recordEntity, User $usersEntity)
    {
    	//print_r($recordEntity);
    	//echo "  madeithere ";
        $recordEntity->setCreatedAt(new DateTime('now'))
            ->setCreatedBy($usersEntity->getUsername())
            ->setDisabled(false);
        $this->objectManager->persist($recordEntity);
        $this->objectManager->flush($recordEntity);
        
        return $recordEntity;
    }

    /**
     * @param \Admin\Entity\Results $recordEntity
     * @param \Admin\Entity\User   $usersEntity
     *
     * @return \Admin\Entity\Results $recordEntity
     */
    public function editResult(Results $recordEntity, User $usersEntity)
    {
        $recordEntity->setModifiedAt(new DateTime('now'))
            ->setModifiedBy($usersEntity->getUsername());
        $this->objectManager->persist($recordEntity);
        $this->objectManager->flush($recordEntity);
        //$this->flushCache();
        return $recordEntity;
    }

    /**
     * @param \Admin\Entity\Results $recordEntity
     * @param \Admin\Entity\User   $usersEntity
     *
     * @return \Admin\Entity\Results $recordEntity
     */
    public function deleteResult(Results $recordEntity, User $usersEntity)
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
