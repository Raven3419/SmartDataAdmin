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

use RocketCms\Entity\SiteInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use SmartAccounts\Service\CustomerService;
use SmartAccounts\Service\AccountsService;
use SmartAccounts\Service\PlansService;

/**
 * Service injecting all lund product services.
 */
class SmartAccountsService implements EventManagerAwareInterface
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
     * @var CustomerService
     */
    protected $customerService;

    /**
     * @var AccountsService
     */
    protected $accountsService;

    /**
     * @var PlansService
     */
    protected $plansService;

    /**
     * @param ObjectManager                     $objectManager
     * @param CustomerService                   $customerService
     * @param AccountsService                   $accountsService
     * @param PlansService                   	$plansService
     */
    public function __construct(
        ObjectManager 	$objectManager,
        CustomerService $customerService,
        AccountsService $accountsService,
        PlansService 	$plansService
    ) {
        $this->objectManager 	= $objectManager;
        $this->customerService 	= $customerService;
        $this->accountsService 	= $accountsService;
        $this->plansService 	= $plansService;
    }
    
    /**
     * Return CustomerService
     *
     * @return CustomerService
     */
    public function getCustomerService()
    {
    	return $this->customerService;
    }
    
    /**
     * Return AccountsService
     *
     * @return AccountsService
     */
    public function getAccountsService()
    {
    	return $this->accountsService;
    }
    
    /**
     * Return PlansService
     *
     * @return PlansService
     */
    public function getPlansService()
    {
    	return $this->plansService;
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
