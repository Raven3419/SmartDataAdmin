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
use SmartQuestions\Entity\Customers;
use SmartQuestions\Repository\CustomersRepositoryInterface;
use SmartQuestions\Form\CustomerForm;
use SmartQuestions\Entity\CustomersInterface;
use RocketUser\Entity\User;
use DateTime;

/*
 * Service managing the CRUD of customers.
 */
class CustomersService implements EventManagerAwareInterface
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
     * @var CustomersForm
     */
    protected $customersForm;

    /**
     * @var CustomersInterface
     */
    protected $customersPrototype;

    /**
     * @param ObjectManager             $objectManager
     * @param CustomersRepositoryInterface $repository
     * @param FormInterface             $customersForm
     */
    public function __construct(
        ObjectManager             $objectManager,
        CustomersRepositoryInterface $repository,
        FormInterface             $customersForm
    )
    {
        $this->objectManager = $objectManager;
        $this->repository    = $repository;
        $this->customersForm    = $customersForm;
    }

    /**
     * @return mixed
     */
    public function getActiveCustomers()
    {
        return $this->repository->findBy(
            array('disabled' => false),
            array('createdAt' => 'ASC')
        );
    }

    /**
     * @return mixed
     */
    public function getCurrentCustomers()
    {
        return $this->repository->findBy(
            array('disabled' => false),
            array('createdAt' => 'ASC')
        );
    }

    /**
     * Return customer record
     *
     * @param  string          $name
     * @return CustomersInterface
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
        $this->customersForm->bind(clone $this->getCustomersPrototype());

        return $this->customersForm;
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

        $this->customersForm->bind($customer);

        return $this->customersForm;
    }

    /**
     * @return CustomersInterface
     */
    public function getCustomersPrototype()
    {
        if ($this->customersPrototype === null) {
            $this->setCustomersPrototype(new Customers());
        }

        return $this->customersPrototype;
    }

    /**
     * @param  CustomersInterface $customersPrototype
     * @return CustomersService
     */
    public function setCustomersPrototype(CustomersInterface $customersPrototype)
    {
        $this->customersPrototype = $customersPrototype;

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
     * @param \Admin\Entity\Customers $recordEntity
     * @param \Admin\Entity\User   $usersEntity
     */
    public function createCustomer(Customers $recordEntity, User $usersEntity)
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
     * @param \Admin\Entity\Customers $recordEntity
     * @param \Admin\Entity\User   $usersEntity
     *
     * @return \Admin\Entity\Customers $recordEntity
     */
    public function editCustomer(Customers $recordEntity, User $usersEntity)
    {
        $recordEntity->setModifiedAt(new DateTime('now'))
            ->setModifiedBy($usersEntity->getUsername());
        $this->objectManager->persist($recordEntity);
        $this->objectManager->flush($recordEntity);
        //$this->flushCache();
        return $recordEntity;
    }

    /**
     * @param \Admin\Entity\Customers $recordEntity
     * @param \Admin\Entity\User   $usersEntity
     *
     * @return \Admin\Entity\Customers $recordEntity
     */
    public function deleteCustomer(Customers $recordEntity, User $usersEntity)
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
