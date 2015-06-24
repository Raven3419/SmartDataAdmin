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
use SmartAccounts\Form\AccountsForm;
use SmartAccounts\Service\AccountsService;
use SmartAccounts\Service\AccountsProductCategoryService;
use RocketAdmin\Service\MessageService;

/**
 * Accounts controller for SmartAccounts module
 *
 * @category   Zend
 * @package    SmartAccounts
 * @subpackage Controller
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 */
class AccountsController extends AbstractActionController
{
    /**
     * @var AccountsService
     */
    protected $accountsService;

    /**
     * @var HelperPluginManager
     */
    protected $viewHelperManager;

    /**
     * @param AccountsService  $accountsService
     * @param HelperPluginManager $viewHelperManager
     */
    public function __construct(
        AccountsService  $accountsService,
        ViewHelperManager $viewHelperManager
    )
    {
        $this->accountsService  = $accountsService;
        $this->viewHelperManager = $viewHelperManager;
    }

    /**
     * Display a table of accounts
     *
     * @return Zend\View\Model\ViewModel|array
     */
    public function indexAction()
    {
        return new ViewModel(array(
            'records' => $this->accountsService->getCurrentAccounts(),
        ));
    }

    /**
     * View a single accounts record
     *
     * @return ViewModel|array
     */
    public function viewAction()
    {
        $recordId = (int) $this->params('id', null);

        if (null === $recordId) {
            $this->flashMessenger()->setNamespace('error')
                                   ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/accounts/accounts');
        }

        $record = $this->accountsService->getAccounts($recordId);

        if (null === $record) {
            $this->flashMessenger()->setNamespace('error')
                                   ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/accounts/accounts');
        }

        $form = $this->accountsService->getEditAccountsForm($recordId);

        return new ViewModel(array(
            'record'   => $record,
            'form'     => $form,
            'recordId' => $recordId,
            'productCategories' => '',
        ));
    }

    /**
     * Create a new accounts record
     *
     * @return ViewModel|array
     */
    public function createAction()
    {
        $record = new \SmartAccounts\Entity\Accounts();

        $form = $this->accountsService->getCreateAccountsForm();

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());
            if ($form->isValid()) {
            	$data = $form->getData();
            	
                $this->accountsService->createAccounts($record, $this->identity());

                $this->flashMessenger()->setNamespace('success')
                                       ->addMessage('You have successfullly created a new Accounts.');

                return $this->redirect()->toRoute('rocket-admin/accounts/accounts');
            } else {
                $this->flashMessenger()->setNamespace('error')
                                       ->addMessage('There was an error trying to create a new Accounts.');
            }
        }

        $uri = $this->getRequest()->getUri();
        $base = sprintf('%s://%s', $uri->getScheme(), $uri->getHost());
        $this->viewHelperManager->get('HeadScript')
             ->appendFile($base . '/assets/rocket-admin/ckeditor/ckeditor.js');
        $this->viewHelperManager->get('InlineScript')
             ->appendScript("$(function () {CKEDITOR.replace('accounts-fieldset[html]');});", 'text/javascript');

        return new ViewModel(array(
            'record' => $record,
            'form'   => $form,
        ));
    }

    /**
     * Edit an existing accounts record
     *
     * @return ViewModel|array
     */
    public function editAction()
    {
        $recordId = (int) $this->params('id', null);

        if (null === $recordId) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/accounts/accounts');
        }

        //$record = $this->accountsService->getAccountsByEmailId($recordId);
        $record = $this->accountsService->getAccounts($recordId);
        
        //$recordId = $record->getAccountId();

        if (null === $record) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/accounts/accounts');
        }

        $form = $this->accountsService->getEditAccountsForm($recordId);
        
        if ($this->request->isPost()) {
        	
            $form->setData($this->request->getPost());
            
            if ($form->isValid()) {
            	
                $this->accountsService->editAccounts($record, $this->identity());

                $this->flashMessenger()->setNamespace('success')
                     ->addMessage('You have successfully edited a Accounts.');

                //return $this->redirect()->toRoute('rocket-admin/accounts/accounts');
            } else {
                print_r($form->getData());exit;
                $this->flashMessenger()->setNamespace('error')
                     ->addMessage('There was an error trying to edit an existing Accounts.');
            }
        }

        $uri = $this->getRequest()->getUri();
        $base = sprintf('%s://%s', $uri->getScheme(), $uri->getHost());
        $this->viewHelperManager->get('HeadScript')
             ->appendFile($base . '/assets/rocket-admin/ckeditor/ckeditor.js');
        $this->viewHelperManager->get('InlineScript')
             ->appendScript("$(function () {CKEDITOR.replace('accounts-fieldset[html]');});", 'text/javascript');

        return new ViewModel(array(
            'record'   => $record,
            'form'     => $form,
            'recordId' => $recordId,
        ));
    }

    /**
     * Delete an existing accounts record (toggle deleted boolean)
     *
     * @return void
     */
    public function deleteAction()
    {
        $recordId = (int) $this->params('id', null);

        if (null === $recordId) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/accounts/accounts');
        }

        $record = $this->accountsService->getAccounts($recordId);

        if (null === $record) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/accounts/accounts');
        }

        $this->accountsService->deleteAccounts($record, $this->identity());
        
        $this->flashMessenger()->setNamespace('success')
             ->addMessage('You have successfully deleted a Accounts.');

        return $this->redirect()->toRoute('rocket-admin/accounts/accounts');
    }
}
