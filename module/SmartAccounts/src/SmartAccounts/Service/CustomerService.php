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
use SmartAccounts\Entity\Customer;
use SmartAccounts\Repository\CustomerRepositoryInterface;
use SmartAccounts\Form\CustomerForm;
use SmartAccounts\Entity\CustomerInterface;
use RocketUser\Entity\User;
use DateTime;
use SmartAccounts\Service\AccountsService;
use SmartAccounts\Service\AccountsProductCategoryService;

/*
 * Service managing the CRUD of customer.
 */
class CustomerService implements EventManagerAwareInterface
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
     * @var CustomerForm
     */
    protected $customerForm;

    /**
     * @var CustomerInterface
     */
    protected $customerPrototype;
    
    /**
     * @var AccountsService
     */
    protected $accountsService;

    /**
     * @param ObjectManager             	$objectManager
     * @param CustomerRepositoryInterface 	$repository
     * @param FormInterface             	$customerForm
     */
    public function __construct(
        ObjectManager             	$objectManager,
        CustomerRepositoryInterface $repository,
        AccountsService  			$accountsService,
        FormInterface             	$customerForm
    )
    {
        $this->objectManager 	= $objectManager;
        $this->repository    	= $repository;
        $this->accountsService  = $accountsService;
        $this->customerForm  	= $customerForm;
    }

    /**
     * @return mixed
     */
    public function getActiveCustomer()
    {
        return $this->repository->findBy(
            array('disabled' => false),
            array('createdAt' => 'ASC')
        );
    }

    /**
     * @return mixed
     */
    public function getCurrentCustomer()
    {
        return $this->repository->findBy(
            array('disabled' => false),
            array('createdAt' => 'ASC')
        );
    }
    
    /**
     * @return mixed
     */
    public function getCustomerByLogin($login = null)
	{
        return $this->repository->findOneBy(
            array('login' => $login)
        );
    }
    
    /**
     * @return mixed
     */
    public function getCustomerByLoginPassword($login = null, $password = null)
	{
        return $this->repository->findOneBy(
            array('password' => $password,
            	  'login' => $login)
        );
    }

    /**
     * Return customer record
     *
     * @param  string          $name
     * @return CustomerInterface
     */
    public function getCustomerByName($name = null)
    {
        return $this->repository->findOneBy(
            array('name' => $name)
        );
    }

    /**
     * Return create CustomerForm
     *
     * @return CustomerForm
     */
    public function getCreateCustomerForm()
    {
        $this->customerForm->bind(clone $this->getCustomerPrototype());

        return $this->customerForm;
    }

    /**
     * Return edit CustomerForm
     *
     * @param  string    $customerId
     * @return CustomerForm
     */
    public function getEditCustomerForm($customerId)
    {
        $customer = $this->repository->find($customerId);

        $this->customerForm->bind($customer);

        return $this->customerForm;
    }

    /**
     * @return CustomerInterface
     */
    public function getCustomerPrototype()
    {
        if ($this->customerPrototype === null) {
            $this->setCustomerPrototype(new Customer());
        }

        return $this->customerPrototype;
    }

    /**
     * @param  CustomerInterface $customerPrototype
     * @return CustomerService
     */
    public function setCustomerPrototype(CustomerInterface $customerPrototype)
    {
        $this->customerPrototype = $customerPrototype;

        return $this;
    }

    /**
     * @param integer $recordId
     *
     * @return mixed
     */
    public function getCustomer($recordId)
    {
        return $this->repository->find($recordId);
    }

    /**
     * @param \Admin\Entity\Customer 	$recordEntity
     * @param \Admin\Entity\User   		$usersEntity
     */
    public function createCustomer(Customer $recordEntity, User $usersEntity)
    {
    	
    	$recordAccounts = new \SmartAccounts\Entity\Accounts();
    	
        $recordEntity->setCreatedAt(new DateTime('now'))
            ->setCreatedBy($usersEntity->getUsername())
            ->setDisabled(false)
        	->setNotificationFree('1')
		    ->setNotificationGrade('1')
		    ->setDownloadReady('0');
        
        $this->objectManager->persist($recordEntity);
        $this->objectManager->flush($recordEntity);
        
        //$this->flushCache();
        
        
        $record = $this->getCustomerByLogin($recordEntity->getlogin());
        
        $recordAccounts->setCustomerId($record);
        
        $this->accountsService->createAccounts($recordAccounts, $usersEntity);
        
        return $recordEntity;
    }

    /**
     * @param \Admin\Entity\Customer $recordEntity
     * @param \Admin\Entity\User  	 $usersEntity
     *
     * @return \Admin\Entity\Customer $recordEntity
     */
    public function editCustomer(Customer $recordEntity, User $usersEntity)
    {
        $recordEntity->setModifiedAt(new DateTime('now'))
            ->setModifiedBy($usersEntity->getUsername());
        $this->objectManager->persist($recordEntity);
        $this->objectManager->flush($recordEntity);
        //$this->flushCache();
        return $recordEntity;
    }

    /**
     * @param \Admin\Entity\Customer $recordEntity
     * @param \Admin\Entity\User   $usersEntity
     *
     * @return \Admin\Entity\Customer $recordEntity
     */
    public function deleteCustomer(Customer $recordEntity, User $usersEntity)
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
