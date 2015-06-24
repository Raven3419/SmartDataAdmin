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
use SmartAccounts\Entity\Accounts;
use SmartAccounts\Repository\AccountsRepositoryInterface;
use SmartAccounts\Form\AccountsForm;
use SmartAccounts\Entity\AccountsInterface;
use RocketUser\Entity\User;
use DateTime;
use SmartAccounts\Service\PlansService;
use SmartAccounts\Service\PlansProductCategoryService;

/*
 * Service managing the CRUD of accounts.
 */
class AccountsService implements EventManagerAwareInterface
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
     * @var AccountsForm
     */
    protected $accountsForm;

    /**
     * @var AccountsInterface
     */
    protected $accountsPrototype;
    
    /**
     * @var PlansService
     */
    protected $plansService;

    /**
     * @param ObjectManager             	$objectManager
     * @param AccountsRepositoryInterface 	$repository
     * @param FormInterface             	$accountsForm
     */
    public function __construct(
        ObjectManager             	$objectManager,
        AccountsRepositoryInterface $repository,
        PlansService  				$plansService,
        FormInterface             	$accountsForm
    )
    {
        $this->objectManager = $objectManager;
        $this->repository    = $repository;
        $this->plansService  = $plansService;
        $this->accountsForm  = $accountsForm;
    }

    /**
     * @return mixed
     */
    public function getActiveAccounts()
    {
        return $this->repository->findBy(
            array('createdAt' => 'ASC')
        );
    }

    /**
     * @return mixed
     */
    public function getCurrentAccounts()
    {
        return $this->repository->findBy(
            array('createdAt' => 'ASC')
        );
    }

    /**
     * Return create AccountsForm
     *
     * @return AccountsForm
     */
    public function getCreateAccountsForm()
    {
        $this->accountsForm->bind(clone $this->getAccountsPrototype());

        return $this->accountsForm;
    }

    /**
     * Return edit AccountsForm
     *
     * @param  string    $accountsId
     * @return AccountsForm
     */
    public function getEditAccountsForm($accountsId)
    {
        $accounts = $this->repository->find($accountsId);

        $this->accountsForm->bind($accounts);

        return $this->accountsForm;
    }

    /**
     * @return AccountsInterface
     */
    public function getAccountsPrototype()
    {
        if ($this->accountsPrototype === null) {
            $this->setAccountsPrototype(new Accounts());
        }

        return $this->accountsPrototype;
    }

    /**
     * @param  AccountsInterface $accountsPrototype
     * @return AccountsService
     */
    public function setAccountsPrototype(AccountsInterface $accountsPrototype)
    {
        $this->accountsPrototype = $accountsPrototype;

        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getAccountsByCustomerId($customerId)
	{
        return $this->repository->findOneBy(
            array('customerId' => $customerId)
        );
    }

    /**
     * @param integer $recordId
     *
     * @return mixed
     */
    public function getAccounts($recordId)
    {
        return $this->repository->find($recordId);
    }

    /**
     * @param \Admin\Entity\Accounts 	$recordEntity
     * @param \Admin\Entity\User   		$usersEntity
     */
    public function createAccounts(Accounts $recordEntity, User $usersEntity)
    {
    	
    	$plan = $this->plansService->getPlansByDescription('premium_0.00');
    	
        $recordEntity->setCreatedAt(new DateTime('now'))
            ->setCreatedBy($usersEntity->getUsername())
            ->setStatus('1')
            ->setPlanId($plan);
        
        $this->objectManager->persist($recordEntity);
        $this->objectManager->flush($recordEntity);
        
        //$this->flushCache();
        return $recordEntity;
    }

    /**
     * @param \Admin\Entity\Accounts $recordEntity
     * @param \Admin\Entity\User  	 $usersEntity
     *
     * @return \Admin\Entity\Accounts $recordEntity
     */
    public function editAccounts(Accounts $recordEntity, User $usersEntity)
    {
        $recordEntity->setModifiedAt(new DateTime('now'))
            ->setModifiedBy($usersEntity->getUsername());
        $this->objectManager->persist($recordEntity);
        $this->objectManager->flush($recordEntity);
        //$this->flushCache();
        return $recordEntity;
    }

    /**
     * @param \Admin\Entity\Accounts $recordEntity
     * @param \Admin\Entity\User   $usersEntity
     *
     * @return \Admin\Entity\Accounts $recordEntity
     */
    public function deleteAccounts(Accounts $recordEntity, User $usersEntity)
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
