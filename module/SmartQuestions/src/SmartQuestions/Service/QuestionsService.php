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
use SmartQuestions\Entity\Questions;
use SmartQuestions\Repository\QuestionsRepositoryInterface;
use SmartQuestions\Form\QuestionForm;
use SmartQuestions\Entity\QuestionsInterface;
use RocketUser\Entity\User;
use DateTime;

/*
 * Service managing the CRUD of questions.
 */
class QuestionsService implements EventManagerAwareInterface
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
     * @var QuestionsForm
     */
    protected $questionsForm;

    /**
     * @var QuestionsInterface
     */
    protected $questionsPrototype;

    /**
     * @param ObjectManager             $objectManager
     * @param QuestionsRepositoryInterface $repository
     * @param FormInterface             $questionsForm
     */
    public function __construct(
        ObjectManager             $objectManager,
        QuestionsRepositoryInterface $repository,
        FormInterface             $questionsForm
    )
    {
        $this->objectManager = $objectManager;
        $this->repository    = $repository;
        $this->questionsForm    = $questionsForm;
    }

    /**
     * @return mixed
     */
    public function getActiveQuestions()
    {
        return $this->repository->findBy(
            array('disabled' => false),
            array('createdAt' => 'ASC')
        );
    }

    /**
     * @return mixed
     */
    public function getCurrentQuestions($schoolId = null)
    {
        return $this->repository->findBy(
            array('disabled' => false,
            	  'schoolId' => $schoolId),
            array('createdAt' => 'ASC')
        );
    }

    /**
     * Return question record
     *
     * @param  string          $textQuestion
     * @return QuestionsInterface
     */
    public function getQuestionByTextQuestion($textQuestion = null)
    {
        return $this->repository->findOneBy(
            array('textQuestion' => $textQuestion)
        );
    }

    /**
     * Return create QuestionForm
     *
     * @return QuestionForm
     */
    public function getCreateQuestionForm()
    {
        $this->questionsForm->bind(clone $this->getQuestionsPrototype());

        return $this->questionsForm;
    }

    /**
     * Return edit QuestionForm
     *
     * @param  string    $questionId
     * @return QuestionForm
     */
    public function getEditQuestionForm($questionId)
    {
        $question = $this->repository->find($questionId);

        $this->questionsForm->bind($question);

        return $this->questionsForm;
    }

    /**
     * @return QuestionsInterface
     */
    public function getQuestionsPrototype()
    {
        if ($this->questionsPrototype === null) {
            $this->setQuestionsPrototype(new Questions());
        }

        return $this->questionsPrototype;
    }

    /**
     * @param  QuestionsInterface $questionsPrototype
     * @return QuestionsService
     */
    public function setQuestionsPrototype(QuestionsInterface $questionsPrototype)
    {
        $this->questionsPrototype = $questionsPrototype;

        return $this;
    }

    /**
     * @param integer $recordId
     *
     * @return mixed
     */
    public function getQuestion($recordId)
    {
        return $this->repository->find($recordId);
    }

    /**
     * @param \Admin\Entity\Questions $recordEntity
     * @param \Admin\Entity\User   $usersEntity
     */
    public function createQuestion(Questions $recordEntity, User $usersEntity)
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
     * @param \Admin\Entity\Questions $recordEntity
     * @param \Admin\Entity\User   $usersEntity
     *
     * @return \Admin\Entity\Questions $recordEntity
     */
    public function editQuestion(Questions $recordEntity, User $usersEntity)
    {
        $recordEntity->setModifiedAt(new DateTime('now'))
            ->setModifiedBy($usersEntity->getUsername());
        $this->objectManager->persist($recordEntity);
        $this->objectManager->flush($recordEntity);
        //$this->flushCache();
        return $recordEntity;
    }

    /**
     * @param \Admin\Entity\Questions $recordEntity
     * @param \Admin\Entity\User   $usersEntity
     *
     * @return \Admin\Entity\Questions $recordEntity
     */
    public function deleteQuestion(Questions $recordEntity, User $usersEntity)
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
