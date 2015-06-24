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
use SmartAccounts\Form\PlansForm;
use SmartAccounts\Service\PlansService;
use SmartAccounts\Service\PlansProductCategoryService;
use RocketAdmin\Service\MessageService;

/**
 * Plans controller for SmartAccounts module
 *
 * @category   Zend
 * @package    SmartAccounts
 * @subpackage Controller
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 */
class PlansController extends AbstractActionController
{
    /**
     * @var PlansService
     */
    protected $plansService;

    /**
     * @var HelperPluginManager
     */
    protected $viewHelperManager;

    /**
     * @param PlansService  $plansService
     * @param HelperPluginManager $viewHelperManager
     */
    public function __construct(
        PlansService  $plansService,
        ViewHelperManager $viewHelperManager
    )
    {
        $this->plansService  = $plansService;
        $this->viewHelperManager = $viewHelperManager;
    }

    /**
     * Display a table of plans
     *
     * @return Zend\View\Model\ViewModel|array
     */
    public function indexAction()
    {
        return new ViewModel(array(
            'records' => $this->plansService->getCurrentPlans(),
        ));
    }

    /**
     * View a single plans record
     *
     * @return ViewModel|array
     */
    public function viewAction()
    {
        $recordId = (int) $this->params('id', null);

        if (null === $recordId) {
            $this->flashMessenger()->setNamespace('error')
            	->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/accounts/plans');
        }

        $record = $this->plansService->getPlans($recordId);

        if (null === $record) {
            $this->flashMessenger()->setNamespace('error')
            	->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/accounts/plans');
        }

        $form = $this->plansService->getEditPlansForm($recordId);

        return new ViewModel(array(
            'record'   => $record,
            'form'     => $form,
            'recordId' => $recordId,
        ));
    }

    /**
     * Create a new plans record
     *
     * @return ViewModel|array
     */
    public function createAction()
    {
        $record = new \SmartAccounts\Entity\Plans();

        $form = $this->plansService->getCreatePlansForm();

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());
            if ($form->isValid()) {
            	$data = $form->getData();
            	
            	$record->setDisabled($data->getDisabled());
            	$record->setPlanName($data->getPlanName());
            	$record->setPlanDescription($data->getPlanDescription());
            	
                $this->plansService->createPlans($record, $this->identity());

                $this->flashMessenger()->setNamespace('success')
                                       ->addMessage('You have successfullly created a new Plans.');

                return $this->redirect()->toRoute('rocket-admin/accounts/plans');
            } else {
                $this->flashMessenger()->setNamespace('error')
                                       ->addMessage('There was an error trying to create a new Plans.');
            }
        }

        $uri = $this->getRequest()->getUri();
        $base = sprintf('%s://%s', $uri->getScheme(), $uri->getHost());
        $this->viewHelperManager->get('HeadScript')
             ->appendFile($base . '/assets/rocket-admin/ckeditor/ckeditor.js');
        $this->viewHelperManager->get('InlineScript')
             ->appendScript("$(function () {CKEDITOR.replace('plans-fieldset[html]');});", 'text/javascript');

        return new ViewModel(array(
            'record' => $record,
            'form'   => $form,
        ));
    }

    /**
     * Edit an existing plans record
     *
     * @return ViewModel|array
     */
    public function editAction()
    {
        $recordId = (int) $this->params('id', null);

        if (null === $recordId) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/accounts/plans');
        }

        $record = $this->plansService->getPlans($recordId);

        if (null === $record) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/accounts/plans');
        }

        $form = $this->plansService->getEditPlansForm($recordId);

        if ($this->request->isPost()) {
        	
        	$form->setData($this->request->getPost());
            
            if ($form->isValid()) {
            	
                $this->plansService->editPlans($record, $this->identity());

                $this->flashMessenger()->setNamespace('success')
                     ->addMessage('You have successfully edited a Plans.');

                return $this->redirect()->toRoute('rocket-admin/accounts/plans');
            } else {
                $form->getData();
                $this->flashMessenger()->setNamespace('error')
                     ->addMessage('There was an error trying to edit an existing Plans.');
            }
        }
        
        $uri = $this->getRequest()->getUri();
        $base = sprintf('%s://%s', $uri->getScheme(), $uri->getHost());
        $this->viewHelperManager->get('HeadScript')
             ->appendFile($base . '/assets/rocket-admin/ckeditor/ckeditor.js');
        $this->viewHelperManager->get('InlineScript')
             ->appendScript("$(function () {CKEDITOR.replace('plans-fieldset[html]');});", 'text/javascript');

        return new ViewModel(array(
            'record'   => $record,
            'form'     => $form,
            'recordId' => $recordId
        ));
    }

    /**
     * Delete an existing plans record (toggle deleted boolean)
     *
     * @return void
     */
    public function deleteAction()
    {
        $recordId = (int) $this->params('id', null);

        if (null === $recordId) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/accounts/plans');
        }

        $record = $this->plansService->getPlans($recordId);

        if (null === $record) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/accounts/plans');
        }

        $this->plansService->deletePlans($record, $this->identity());
        
        $this->flashMessenger()->setNamespace('success')
             ->addMessage('You have successfully deleted a Plans.');

        return $this->redirect()->toRoute('rocket-admin/accounts/plans');
    }
}
