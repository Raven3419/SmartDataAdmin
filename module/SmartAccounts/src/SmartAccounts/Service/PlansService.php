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
use SmartAccounts\Entity\Plans;
use SmartAccounts\Repository\PlansRepositoryInterface;
use SmartAccounts\Form\PlansForm;
use SmartAccounts\Entity\PlansInterface;
use RocketUser\Entity\User;
use DateTime;

/*
 * Service managing the CRUD of plans.
 */
class PlansService implements EventManagerAwareInterface
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
     * @var PlansForm
     */
    protected $plansForm;

    /**
     * @var PlansInterface
     */
    protected $plansPrototype;

    /**
     * @param ObjectManager             	$objectManager
     * @param PlansRepositoryInterface 	$repository
     * @param FormInterface             	$plansForm
     */
    public function __construct(
        ObjectManager             	$objectManager,
        PlansRepositoryInterface 	$repository,
        FormInterface             	$plansForm
    )
    {
        $this->objectManager 	= $objectManager;
        $this->repository    	= $repository;
        $this->plansForm  		= $plansForm;
    }

    /**
     * @return mixed
     */
    public function getActivePlans()
    {
        return $this->repository->findBy(
            array('disabled' => false),
            array('createdAt' => 'ASC')
        );
    }

    /**
     * @return mixed
     */
    public function getCurrentPlans()
    {
        return $this->repository->findBy(
            array('disabled' => false),
            array('createdAt' => 'ASC')
        );
    }

    /**
     * Return plans record
     *
     * @param  string          $name
     * @return PlansInterface
     */
    public function getPlansByDescription($description = null)
    {
        return $this->repository->findOneBy(
            array('planDescription' => $description)
        );
    }

    /**
     * Return create PlansForm
     *
     * @return PlansForm
     */
    public function getCreatePlansForm()
    {
        $this->plansForm->bind(clone $this->getPlansPrototype());

        return $this->plansForm;
    }

    /**
     * Return edit PlansForm
     *
     * @param  string    $plansId
     * @return PlansForm
     */
    public function getEditPlansForm($plansId)
    {
        $plans = $this->repository->find($plansId);

        $this->plansForm->bind($plans);

        return $this->plansForm;
    }

    /**
     * @return PlansInterface
     */
    public function getPlansPrototype()
    {
        if ($this->plansPrototype === null) {
            $this->setPlansPrototype(new Plans());
        }

        return $this->plansPrototype;
    }

    /**
     * @param  PlansInterface $plansPrototype
     * @return PlansService
     */
    public function setPlansPrototype(PlansInterface $plansPrototype)
    {
        $this->plansPrototype = $plansPrototype;

        return $this;
    }

    /**
     * @param integer $recordId
     *
     * @return mixed
     */
    public function getPlans($recordId)
    {
        return $this->repository->find($recordId);
    }

    /**
     * @param \Admin\Entity\Plans 	$recordEntity
     * @param \Admin\Entity\User   		$usersEntity
     */
    public function createPlans(Plans $recordEntity, User $usersEntity)
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
     * @param \Admin\Entity\Plans $recordEntity
     * @param \Admin\Entity\User  	 $usersEntity
     *
     * @return \Admin\Entity\Plans $recordEntity
     */
    public function editPlans(Plans $recordEntity, User $usersEntity)
    {
        $recordEntity->setModifiedAt(new DateTime('now'))
            ->setModifiedBy($usersEntity->getUsername());
        $this->objectManager->persist($recordEntity);
        $this->objectManager->flush($recordEntity);
        //$this->flushCache();
        return $recordEntity;
    }

    /**
     * @param \Admin\Entity\Plans $recordEntity
     * @param \Admin\Entity\User   $usersEntity
     *
     * @return \Admin\Entity\Plans $recordEntity
     */
    public function deletePlans(Plans $recordEntity, User $usersEntity)
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
