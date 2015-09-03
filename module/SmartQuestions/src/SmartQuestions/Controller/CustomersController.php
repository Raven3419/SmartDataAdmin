<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartQuestions
 * @subpackage Controller
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace SmartQuestions\Controller;

use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\HelperPluginManager as ViewHelperManager;
use Zend\View\Model\ViewModel;
use SmartQuestions\Form\CustomerForm;
use SmartQuestions\Service\CustomersService;
use SmartQuestions\Service\CustomerProductCategoryService;
use RocketAdmin\Service\MessageService;

/**
 * Customers controller for SmartQuestions module
 *
 * @category   Zend
 * @package    SmartQuestions
 * @subpackage Controller
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 */
class CustomersController extends AbstractActionController
{
    /**
     * @var CustomersService
     */
    protected $customersService;

    /**
     * @var HelperPluginManager
     */
    protected $viewHelperManager;

    /**
     * @param CustomersService  $customersService
     * @param HelperPluginManager $viewHelperManager
     */
    public function __construct(
        CustomersService  $customersService,
        ViewHelperManager $viewHelperManager
    )
    {
        $this->customersService  = $customersService;
        $this->viewHelperManager = $viewHelperManager;
    }

    /**
     * Display a table of customers
     *
     * @return Zend\View\Model\ViewModel|array
     */
    public function indexAction()
    {
        return new ViewModel(array(
            'records' => $this->customersService->getCurrentCustomers(),
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

            return $this->redirect()->toRoute('rocket-admin/education/customers');
        }

        $record = $this->customersService->getCustomer($recordId);

        if (null === $record) {
            $this->flashMessenger()->setNamespace('error')
                                   ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/education/customers');
        }

        $form = $this->customersService->getEditCustomerForm($recordId);

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
        $record = new \SmartQuestions\Entity\Customers();

        $form = $this->customersService->getCreateCustomerForm();

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());
            if ($form->isValid()) {
            	$data = $form->getData();
            	
            	$record->setName($data->getName());
            	$record->setDisabled($data->getDisabled());
            	
                $this->customersService->createCustomer($record, $this->identity());

                $this->flashMessenger()->setNamespace('success')
                                       ->addMessage('You have successfullly created a new Customer.');

                return $this->redirect()->toRoute('rocket-admin/education/customers');
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

            return $this->redirect()->toRoute('rocket-admin/education/customers');
        }

        $record = $this->customersService->getCustomer($recordId);

        if (null === $record) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/education/customers');
        }

        $form = $this->customersService->getEditCustomerForm($recordId);

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                $this->customersService->editCustomer($record, $this->identity());

                $this->flashMessenger()->setNamespace('success')
                     ->addMessage('You have successfully edited a Customer.');

                return $this->redirect()->toRoute('rocket-admin/education/customers');
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

            return $this->redirect()->toRoute('rocket-admin/education/customers');
        }

        $record = $this->customersService->getCustomer($recordId);

        if (null === $record) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/education/customers');
        }

        $this->customersService->deleteCustomer($record, $this->identity());
        //$this->customersService->deleteCustomer($record, $this->identity());

        $this->flashMessenger()->setNamespace('success')
             ->addMessage('You have successfully deleted a Customer.');

        return $this->redirect()->toRoute('rocket-admin/education/customers');
    }
}
