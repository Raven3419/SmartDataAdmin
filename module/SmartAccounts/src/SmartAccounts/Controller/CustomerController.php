<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartAccounts
 * @subpackage Controller
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace SmartAccounts\Controller;

use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\HelperPluginManager as ViewHelperManager;
use Zend\View\Model\ViewModel;
use SmartAccounts\Form\CustomerForm;
use SmartAccounts\Service\CustomerService;
use SmartAccounts\Service\CustomerProductCategoryService;
use RocketAdmin\Service\MessageService;

/**
 * Customer controller for SmartAccounts module
 *
 * @category   Zend
 * @package    SmartAccounts
 * @subpackage Controller
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 */
class CustomerController extends AbstractActionController
{
    /**
     * @var CustomerService
     */
    protected $customerService;

    /**
     * @var HelperPluginManager
     */
    protected $viewHelperManager;

    /**
     * @param CustomerService  $customerService
     * @param HelperPluginManager $viewHelperManager
     */
    public function __construct(
        CustomerService  $customerService,
        ViewHelperManager $viewHelperManager
    )
    {
        $this->customerService  = $customerService;
        $this->viewHelperManager = $viewHelperManager;
    }

    /**
     * Display a table of customer
     *
     * @return Zend\View\Model\ViewModel|array
     */
    public function indexAction()
    {
        return new ViewModel(array(
            'records' => $this->customerService->getCurrentCustomer(),
        ));
    }

    /**
     * View a single customer record
     *
     * @return ViewModel|array
     */
    public function viewAction()
    {
        $recordId = (int) $this->params('id', null);

        if (null === $recordId) {
            $this->flashMessenger()->setNamespace('error')
                                   ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/accounts/customer');
        }

        $record = $this->customerService->getCustomer($recordId);

        if (null === $record) {
            $this->flashMessenger()->setNamespace('error')
                                   ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/accounts/customer');
        }

        $form = $this->customerService->getEditCustomerForm($recordId);

        return new ViewModel(array(
            'record'   => $record,
            'form'     => $form,
            'recordId' => $recordId,
            'productCategories' => '',
        ));
    }

    /**
     * Create a new customer record
     *
     * @return ViewModel|array
     */
    public function createAction()
    {
        $record = new \SmartAccounts\Entity\Customer();

        $form = $this->customerService->getCreateCustomerForm();

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());
            if ($form->isValid()) {
            	$data = $form->getData();
            	
            	$record->setEmail($data->getEmail());
            	$record->setPassword($data->getPassword());
            	$record->setFirstName($data->getFirstName());
            	$record->setLastName($data->getLastName());
            	$record->setDisabled($data->getDisabled());
            	$record->setParentFirstName($data->getParentFirstName());
            	$record->setParentLastName($data->getParentLastName());
            	$record->setParentEmail($data->getParentEmail());
            	
                $this->customerService->createCustomer($record, $this->identity());

                $this->flashMessenger()->setNamespace('success')
                                       ->addMessage('You have successfullly created a new Customer.');

                return $this->redirect()->toRoute('rocket-admin/accounts/customer');
            } else {
                $this->flashMessenger()->setNamespace('error')
                                       ->addMessage('There was an error trying to create a new Customer.');
            }
        }

        $uri = $this->getRequest()->getUri();
        $base = sprintf('%s://%s', $uri->getScheme(), $uri->getHost());
        $this->viewHelperManager->get('HeadScript')
             ->appendFile($base . '/assets/rocket-admin/ckeditor/ckeditor.js');
        $this->viewHelperManager->get('InlineScript')
             ->appendScript("$(function () {CKEDITOR.replace('customer-fieldset[html]');});", 'text/javascript');

        return new ViewModel(array(
            'record' => $record,
            'form'   => $form,
        ));
    }

    /**
     * Edit an existing customer record
     *
     * @return ViewModel|array
     */
    public function editAction()
    {
        $recordId = (int) $this->params('id', null);

        if (null === $recordId) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/accounts/customer');
        }

        $record = $this->customerService->getCustomer($recordId);

        if (null === $record) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/accounts/customer');
        }

        $form = $this->customerService->getEditCustomerForm($recordId);

        if ($this->request->isPost()) {
        	
        	$holdPassword = $record->getPassword();
        	
            $form->setData($this->request->getPost());
            
            if ($form->isValid()) {
            	
            	$array = $this->getRequest()->getPost()->toArray();
            	 
            	if ($array['customer-fieldset']['password'] == '')
            	{
            		$record->setPassword($holdPassword);
            	}
            	
                $this->customerService->editCustomer($record, $this->identity());

                $this->flashMessenger()->setNamespace('success')
                     ->addMessage('You have successfully edited a Customer.');

                return $this->redirect()->toRoute('rocket-admin/accounts/customer');
            } else {
                $form->getData();
                $this->flashMessenger()->setNamespace('error')
                     ->addMessage('There was an error trying to edit an existing Customer.');
            }
        }

        $uri = $this->getRequest()->getUri();
        $base = sprintf('%s://%s', $uri->getScheme(), $uri->getHost());
        $this->viewHelperManager->get('HeadScript')
             ->appendFile($base . '/assets/rocket-admin/ckeditor/ckeditor.js');
        $this->viewHelperManager->get('InlineScript')
             ->appendScript("$(function () {CKEDITOR.replace('customer-fieldset[html]');});", 'text/javascript');

        return new ViewModel(array(
            'record'   => $record,
            'form'     => $form,
            'recordId' => $recordId,
        ));
    }

    /**
     * Delete an existing customer record (toggle deleted boolean)
     *
     * @return void
     */
    public function deleteAction()
    {
        $recordId = (int) $this->params('id', null);

        if (null === $recordId) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/accounts/customer');
        }

        $record = $this->customerService->getCustomer($recordId);

        if (null === $record) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/accounts/customer');
        }

        $this->customerService->deleteCustomer($record, $this->identity());
        
        $this->flashMessenger()->setNamespace('success')
             ->addMessage('You have successfully deleted a Customer.');

        return $this->redirect()->toRoute('rocket-admin/accounts/customer');
    }
}
