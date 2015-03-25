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
use SmartQuestions\Form\GradeForm;
use SmartQuestions\Service\GradesService;
use SmartQuestions\Service\GradeProductCategoryService;
use RocketAdmin\Service\MessageService;

/**
 * Grades controller for SmartQuestions module
 *
 * @category   Zend
 * @package    SmartQuestions
 * @subpackage Controller
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 */
class GradesController extends AbstractActionController
{
    /**
     * @var GradesService
     */
    protected $gradesService;

    /**
     * @var HelperPluginManager
     */
    protected $viewHelperManager;

    /**
     * @param GradesService  $gradesService
     * @param HelperPluginManager $viewHelperManager
     */
    public function __construct(
        GradesService  $gradesService,
        ViewHelperManager $viewHelperManager
    )
    {
        $this->gradesService  = $gradesService;
        $this->viewHelperManager = $viewHelperManager;
    }

    /**
     * Display a table of grades
     *
     * @return Zend\View\Model\ViewModel|array
     */
    public function indexAction()
    {
        return new ViewModel(array(
            'records' => $this->gradesService->getCurrentGrades(),
        ));
    }

    /**
     * View a single grade record
     *
     * @return ViewModel|array
     */
    public function viewAction()
    {
        $recordId = (int) $this->params('id', null);

        if (null === $recordId) {
            $this->flashMessenger()->setNamespace('error')
                                   ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/education/grades');
        }

        $record = $this->gradesService->getGrade($recordId);

        if (null === $record) {
            $this->flashMessenger()->setNamespace('error')
                                   ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/education/grades');
        }

        $form = $this->gradesService->getEditGradeForm($recordId);

        return new ViewModel(array(
            'record'   => $record,
            'form'     => $form,
            'recordId' => $recordId,
            'productCategories' => '',
        ));
    }

    /**
     * Create a new grade record
     *
     * @return ViewModel|array
     */
    public function createAction()
    {
        $record = new \SmartQuestions\Entity\Grades();

        $form = $this->gradesService->getCreateGradeForm();

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());
            if ($form->isValid()) {
            	$data = $form->getData();
            	
            	$record->setName($data->getName());
            	$record->setDisabled($data->getDisabled());
            	
                $this->gradesService->createGrade($record, $this->identity());

                $this->flashMessenger()->setNamespace('success')
                                       ->addMessage('You have successfullly created a new Grade.');

                return $this->redirect()->toRoute('rocket-admin/education/grades');
            } else {
                $this->flashMessenger()->setNamespace('error')
                                       ->addMessage('There was an error trying to create a new Grade.');
            }
        }

        $uri = $this->getRequest()->getUri();
        $base = sprintf('%s://%s', $uri->getScheme(), $uri->getHost());
        $this->viewHelperManager->get('HeadScript')
             ->appendFile($base . '/assets/rocket-admin/ckeditor/ckeditor.js');
        $this->viewHelperManager->get('InlineScript')
             ->appendScript("$(function () {CKEDITOR.replace('grade-fieldset[html]');});", 'text/javascript');

        return new ViewModel(array(
            'record' => $record,
            'form'   => $form,
        ));
    }

    /**
     * Edit an existing grade record
     *
     * @return ViewModel|array
     */
    public function editAction()
    {
        $recordId = (int) $this->params('id', null);

        if (null === $recordId) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/education/grades');
        }

        $record = $this->gradesService->getGrade($recordId);

        if (null === $record) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/education/grades');
        }

        $form = $this->gradesService->getEditGradeForm($recordId);

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                $this->gradesService->editGrade($record, $this->identity());

                $this->flashMessenger()->setNamespace('success')
                     ->addMessage('You have successfully edited a Grade.');

                return $this->redirect()->toRoute('rocket-admin/education/grades');
            } else {
                $form->getData();
                $this->flashMessenger()->setNamespace('error')
                     ->addMessage('There was an error trying to edit an existing Grade.');
            }
        }

        $uri = $this->getRequest()->getUri();
        $base = sprintf('%s://%s', $uri->getScheme(), $uri->getHost());
        $this->viewHelperManager->get('HeadScript')
             ->appendFile($base . '/assets/rocket-admin/ckeditor/ckeditor.js');
        $this->viewHelperManager->get('InlineScript')
             ->appendScript("$(function () {CKEDITOR.replace('grade-fieldset[html]');});", 'text/javascript');

        return new ViewModel(array(
            'record'   => $record,
            'form'     => $form,
            'recordId' => $recordId,
        ));
    }

    /**
     * Delete an existing grade record (toggle deleted boolean)
     *
     * @return void
     */
    public function deleteAction()
    {
        $recordId = (int) $this->params('id', null);

        if (null === $recordId) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/education/grades');
        }

        $record = $this->gradesService->getGrade($recordId);

        if (null === $record) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/education/grades');
        }

        $this->gradesService->deleteGrade($record, $this->identity());
        //$this->gradesService->deleteGrade($record, $this->identity());

        $this->flashMessenger()->setNamespace('success')
             ->addMessage('You have successfully deleted a Grade.');

        return $this->redirect()->toRoute('rocket-admin/education/grades');
    }
}
