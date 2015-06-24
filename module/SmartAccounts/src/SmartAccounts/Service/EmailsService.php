<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/*
 * SmartAccounts
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartAccounts
 * @subpackage Service
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace SmartAccounts\Service;

use Zend\EventManager\Eventmanager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\Form\FormInterface;
use Doctrine\Common\Persistence\ObjectManager;
use SmartAccounts\Entity\Emails;
use SmartAccounts\Repository\EmailsRepositoryInterface;
use SmartAccounts\Form\EmailsForm;
use SmartAccounts\Entity\EmailsInterface;
use RocketUser\Entity\User;
use DateTime;

/*
 * Service managing the CRUD of emails.
 */
class EmailsService implements EventManagerAwareInterface
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
     * @var EmailsForm
     */
    protected $emailsForm;

    /**
     * @var EmailsInterface
     */
    protected $emailsPrototype;

    /**
     * @param ObjectManager             	$objectManager
     * @param EmailsRepositoryInterface 	$repository
     * @param FormInterface             	$emailsForm
     */
    public function __construct(
        ObjectManager             	$objectManager,
        EmailsRepositoryInterface 	$repository,
        FormInterface             	$emailsForm
    )
    {
        $this->objectManager 	= $objectManager;
        $this->repository    	= $repository;
        $this->emailsForm  		= $emailsForm;
    }

    /**
     * @return mixed
     */
    public function getActiveEmails()
    {
        return $this->repository->findBy(
            array('disabled' => false),
            array('createdAt' => 'ASC')
        );
    }

    /**
     * @return mixed
     */
    public function getCurrentEmails()
    {
        return $this->repository->findBy(
            array('disabled' => false),
            array('createdAt' => 'ASC')
        );
    }

    /**
     * @return mixed
     */
    public function getValidEmails($customerId)
    {
        return $this->repository->findBy(
            array('disabled' => false),
            array('customerId' => $customerId),
            array('createdAt' => 'ASC')
        );
    }

    /**
     * Return emails record
     *
     * @param  string          $name
     * @return EmailsInterface
     */
    public function getEmailsByName($name = null)
    {
        return $this->repository->findOneBy(
            array('email' => $name)
        );
    }

    /**
     * Return create EmailsForm
     *
     * @return EmailsForm
     */
    public function getCreateEmailsForm()
    {
        $this->emailsForm->bind(clone $this->getEmailsPrototype());

        return $this->emailsForm;
    }

    /**
     * Return edit EmailsForm
     *
     * @param  string    $emailsId
     * @return EmailsForm
     */
    public function getEditEmailsForm($emailsId)
    {
        $emails = $this->repository->find($emailsId);

        $this->emailsForm->bind($emails);

        return $this->emailsForm;
    }

    /**
     * @return EmailsInterface
     */
    public function getEmailsPrototype()
    {
        if ($this->emailsPrototype === null) {
            $this->setEmailsPrototype(new Emails());
        }

        return $this->emailsPrototype;
    }

    /**
     * @param  EmailsInterface $emailsPrototype
     * @return EmailsService
     */
    public function setEmailsPrototype(EmailsInterface $emailsPrototype)
    {
        $this->emailsPrototype = $emailsPrototype;

        return $this;
    }

    /**
     * @param integer $recordId
     *
     * @return mixed
     */
    public function getEmails($recordId)
    {
        return $this->repository->find($recordId);
    }

    /**
     * @param \Admin\Entity\Emails 	$recordEntity
     * @param \Admin\Entity\User   		$usersEntity
     */
    public function createEmails(Emails $recordEntity, User $usersEntity)
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
     * @param \Admin\Entity\Emails $recordEntity
     * @param \Admin\Entity\User  	 $usersEntity
     *
     * @return \Admin\Entity\Emails $recordEntity
     */
    public function editEmails(Emails $recordEntity, User $usersEntity)
    {
        $recordEntity->setModifiedAt(new DateTime('now'))
            ->setModifiedBy($usersEntity->getUsername());
        $this->objectManager->persist($recordEntity);
        $this->objectManager->flush($recordEntity);
        //$this->flushCache();
        return $recordEntity;
    }

    /**
     * @param \Admin\Entity\Emails $recordEntity
     * @param \Admin\Entity\User   $usersEntity
     *
     * @return \Admin\Entity\Emails $recordEntity
     */
    public function deleteEmails(Emails $recordEntity, User $usersEntity)
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
