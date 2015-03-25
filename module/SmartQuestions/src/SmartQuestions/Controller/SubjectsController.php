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
use SmartQuestions\Form\SubjectForm;
use SmartQuestions\Service\SubjectsService;
use SmartQuestions\Service\SubjectProductCategoryService;
use RocketAdmin\Service\MessageService;

/**
 * Subjects controller for SmartQuestions module
 *
 * @category   Zend
 * @package    SmartQuestions
 * @subpackage Controller
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 */
class SubjectsController extends AbstractActionController
{
    /**
     * @var SubjectsService
     */
    protected $subjectsService;

    /**
     * @var HelperPluginManager
     */
    protected $viewHelperManager;

    /**
     * @param SubjectsService  $subjectsService
     * @param HelperPluginManager $viewHelperManager
     */
    public function __construct(
        SubjectsService  $subjectsService,
        ViewHelperManager $viewHelperManager
    )
    {
        $this->subjectsService  = $subjectsService;
        $this->viewHelperManager = $viewHelperManager;
    }

    /**
     * Display a table of subjects
     *
     * @return Zend\View\Model\ViewModel|array
     */
    public function indexAction()
    {
        return new ViewModel(array(
            'records' => $this->subjectsService->getCurrentSubjects(),
        ));
    }

    /**
     * View a single subject record
     *
     * @return ViewModel|array
     */
    public function viewAction()
    {
        $recordId = (int) $this->params('id', null);

        if (null === $recordId) {
            $this->flashMessenger()->setNamespace('error')
                                   ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/education/subjects');
        }

        $record = $this->subjectsService->getSubject($recordId);

        if (null === $record) {
            $this->flashMessenger()->setNamespace('error')
                                   ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/education/subjects');
        }

        $form = $this->subjectsService->getEditSubjectForm($recordId);

        return new ViewModel(array(
            'record'   => $record,
            'form'     => $form,
            'recordId' => $recordId,
            'productCategories' => '',
        ));
    }

    /**
     * Create a new subject record
     *
     * @return ViewModel|array
     */
    public function createAction()
    {
        $record = new \SmartQuestions\Entity\Subjects();

        $form = $this->subjectsService->getCreateSubjectForm();

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());
            if ($form->isValid()) {
            	$data = $form->getData();
            	
            	$record->setName($data->getName());
            	$record->setDisabled($data->getDisabled());
            	
                $this->subjectsService->createSubject($record, $this->identity());

                $this->flashMessenger()->setNamespace('success')
                                       ->addMessage('You have successfullly created a new Subject.');

                return $this->redirect()->toRoute('rocket-admin/education/subjects');
            } else {
                $this->flashMessenger()->setNamespace('error')
                                       ->addMessage('There was an error trying to create a new Subject.');
            }
        }

        $uri = $this->getRequest()->getUri();
        $base = sprintf('%s://%s', $uri->getScheme(), $uri->getHost());
        $this->viewHelperManager->get('HeadScript')
             ->appendFile($base . '/assets/rocket-admin/ckeditor/ckeditor.js');
        $this->viewHelperManager->get('InlineScript')
             ->appendScript("$(function () {CKEDITOR.replace('subject-fieldset[html]');});", 'text/javascript');

        return new ViewModel(array(
            'record' => $record,
            'form'   => $form,
        ));
    }

    /**
     * Edit an existing subject record
     *
     * @return ViewModel|array
     */
    public function editAction()
    {
        $recordId = (int) $this->params('id', null);

        if (null === $recordId) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/education/subjects');
        }

        $record = $this->subjectsService->getSubject($recordId);

        if (null === $record) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/education/subjects');
        }

        $form = $this->subjectsService->getEditSubjectForm($recordId);

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                $this->subjectsService->editSubject($record, $this->identity());

                $this->flashMessenger()->setNamespace('success')
                     ->addMessage('You have successfully edited a Subject.');

                return $this->redirect()->toRoute('rocket-admin/education/subjects');
            } else {
                $form->getData();
                $this->flashMessenger()->setNamespace('error')
                     ->addMessage('There was an error trying to edit an existing Subject.');
            }
        }

        $uri = $this->getRequest()->getUri();
        $base = sprintf('%s://%s', $uri->getScheme(), $uri->getHost());
        $this->viewHelperManager->get('HeadScript')
             ->appendFile($base . '/assets/rocket-admin/ckeditor/ckeditor.js');
        $this->viewHelperManager->get('InlineScript')
             ->appendScript("$(function () {CKEDITOR.replace('subject-fieldset[html]');});", 'text/javascript');

        return new ViewModel(array(
            'record'   => $record,
            'form'     => $form,
            'recordId' => $recordId,
        ));
    }

    /**
     * Delete an existing subject record (toggle deleted boolean)
     *
     * @return void
     */
    public function deleteAction()
    {
        $recordId = (int) $this->params('id', null);

        if (null === $recordId) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/education/subjects');
        }

        $record = $this->subjectsService->getSubject($recordId);

        if (null === $record) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/education/subjects');
        }

        $this->subjectsService->deleteSubject($record, $this->identity());

        $this->flashMessenger()->setNamespace('success')
             ->addMessage('You have successfully deleted a Subject.');

        return $this->redirect()->toRoute('rocket-admin/education/subjects');
    }
}
