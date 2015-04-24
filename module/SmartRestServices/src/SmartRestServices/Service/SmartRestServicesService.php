<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 */
/*
 * SmartRestServices
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartRestServices
 * @subpackage Service
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace SmartRestServices\Service;

use RocketCms\Entity\SiteInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Zend\EventManager\EventManager;
use Zend\EventManager\EventManagerAwareInterface;
use Zend\EventManager\EventManagerInterface;
use SmartRestServices\Service\CustomerService;

/**
 * Service injecting all lund product services.
 */
class SmartRestServicesService implements EventManagerAwareInterface
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
     * @var GradesService
     */
    protected $customerService;

    /**
     * @param ObjectManager                        	$objectManager
     * @param CustomerService                   	$customerServie
     */
    public function __construct(
        ObjectManager $objectManager,
        CustomerService $customerService
    ) {
        $this->objectManager = $objectManager;
        $this->customerService = $customerService;
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
