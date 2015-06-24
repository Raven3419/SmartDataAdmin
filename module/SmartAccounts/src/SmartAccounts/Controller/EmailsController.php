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
use SmartAccounts\Form\EmailsForm;
use SmartAccounts\Service\EmailsService;
use SmartAccounts\Service\EmailsProductCategoryService;
use RocketAdmin\Service\MessageService;

/**
 * Emails controller for SmartAccounts module
 *
 * @category   Zend
 * @package    SmartAccounts
 * @subpackage Controller
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 */
class EmailsController extends AbstractActionController
{
    /**
     * @var EmailsService
     */
    protected $emailsService;

    /**
     * @var HelperPluginManager
     */
    protected $viewHelperManager;

    /**
     * @param EmailsService  $emailsService
     * @param HelperPluginManager $viewHelperManager
     */
    public function __construct(
        EmailsService  $emailsService,
        ViewHelperManager $viewHelperManager
    )
    {
        $this->emailsService  = $emailsService;
        $this->viewHelperManager = $viewHelperManager;
    }

    /**
     * Display a table of emails
     *
     * @return Zend\View\Model\ViewModel|array
     */
    public function indexAction()
    {
        return new ViewModel(array(
            'records' => $this->emailsService->getCurrentEmails(),
        ));
    }

    /**
     * View a single emails record
     *
     * @return ViewModel|array
     */
    public function viewAction()
    {
        $recordId = (int) $this->params('id', null);

        if (null === $recordId) {
            $this->flashMessenger()->setNamespace('error')
            	->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/accounts/emails');
        }

        $record = $this->emailsService->getEmails($recordId);

        if (null === $record) {
            $this->flashMessenger()->setNamespace('error')
            	->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/accounts/emails');
        }

        $form = $this->emailsService->getEditEmailsForm($recordId);

        return new ViewModel(array(
            'record'   => $record,
            'form'     => $form,
            'recordId' => $recordId,
        ));
    }

    /**
     * Create a new emails record
     *
     * @return ViewModel|array
     */
    public function createAction()
    {
        $record = new \SmartAccounts\Entity\Emails();

        $form = $this->emailsService->getCreateEmailsForm();

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());
            if ($form->isValid()) {
            	$data = $form->getData();
            	
            	$record->setDisabled($data->getDisabled());
            	$record->setEmail($data->getEmail());
            	$record->setCustomerId($data->getCustomerId());
            	
                $this->emailsService->createEmails($record, $this->identity());

                $this->flashMessenger()->setNamespace('success')
                                       ->addMessage('You have successfullly created a new Emails.');

                return $this->redirect()->toRoute('rocket-admin/accounts/emails');
            } else {
                $this->flashMessenger()->setNamespace('error')
                                       ->addMessage('There was an error trying to create a new Emails.');
            }
        }

        $uri = $this->getRequest()->getUri();
        $base = sprintf('%s://%s', $uri->getScheme(), $uri->getHost());
        $this->viewHelperManager->get('HeadScript')
             ->appendFile($base . '/assets/rocket-admin/ckeditor/ckeditor.js');
        $this->viewHelperManager->get('InlineScript')
             ->appendScript("$(function () {CKEDITOR.replace('emails-fieldset[html]');});", 'text/javascript');

        return new ViewModel(array(
            'record' => $record,
            'form'   => $form,
        ));
    }

    /**
     * Edit an existing emails record
     *
     * @return ViewModel|array
     */
    public function editAction()
    {
        $recordId = (int) $this->params('id', null);

        if (null === $recordId) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/accounts/emails');
        }

        $record = $this->emailsService->getEmails($recordId);

        if (null === $record) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/accounts/emails');
        }

        $form = $this->emailsService->getEditEmailsForm($recordId);

        if ($this->request->isPost()) {
        	
        	$form->setData($this->request->getPost());
            
            if ($form->isValid()) {
            	
                $this->emailsService->editEmails($record, $this->identity());

                $this->flashMessenger()->setNamespace('success')
                     ->addMessage('You have successfully edited a Emails.');

                return $this->redirect()->toRoute('rocket-admin/accounts/emails');
            } else {
                $form->getData();
                $this->flashMessenger()->setNamespace('error')
                     ->addMessage('There was an error trying to edit an existing Emails.');
            }
        }
        
        $uri = $this->getRequest()->getUri();
        $base = sprintf('%s://%s', $uri->getScheme(), $uri->getHost());
        $this->viewHelperManager->get('HeadScript')
             ->appendFile($base . '/assets/rocket-admin/ckeditor/ckeditor.js');
        $this->viewHelperManager->get('InlineScript')
             ->appendScript("$(function () {CKEDITOR.replace('emails-fieldset[html]');});", 'text/javascript');

        return new ViewModel(array(
            'record'   => $record,
            'form'     => $form,
            'recordId' => $recordId
        ));
    }

    /**
     * Delete an existing emails record (toggle deleted boolean)
     *
     * @return void
     */
    public function deleteAction()
    {
        $recordId = (int) $this->params('id', null);

        if (null === $recordId) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/accounts/emails');
        }

        $record = $this->emailsService->getEmails($recordId);

        if (null === $record) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/accounts/emails');
        }

        $this->emailsService->deleteEmails($record, $this->identity());
        
        $this->flashMessenger()->setNamespace('success')
             ->addMessage('You have successfully deleted a Emails.');

        return $this->redirect()->toRoute('rocket-admin/accounts/emails');
    }
}
