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
use SmartQuestions\Form\QuestionForm;
use SmartQuestions\Service\QuestionsService;
use SmartQuestions\Service\QuestionProductCategoryService;
use RocketAdmin\Service\MessageService;

/**
 * Questions controller for SmartQuestions module
 *
 * @category   Zend
 * @package    SmartQuestions
 * @subpackage Controller
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 */
class QuestionsController extends AbstractActionController
{
    /**
     * @var QuestionsService
     */
    protected $questionsService;

    /**
     * @var HelperPluginManager
     */
    protected $viewHelperManager;

    /**
     * @param QuestionsService  $questionsService
     * @param HelperPluginManager $viewHelperManager
     */
    public function __construct(
        QuestionsService  $questionsService,
        ViewHelperManager $viewHelperManager
    )
    {
        $this->questionsService  = $questionsService;
        $this->viewHelperManager = $viewHelperManager;
    }

    /**
     * Display a table of questions
     *
     * @return Zend\View\Model\ViewModel|array
     */
    public function indexAction()
    {
    	$schoolId = (int) $this->params('school_id', null);
    	
    	$records = $this->questionsService->getCurrentQuestions($schoolId);
    	
        return new ViewModel(array(
            'records' => $records,
        ));
    }

    /**
     * View a single question record
     *
     * @return ViewModel|array
     */
    public function viewAction()
    {
        $recordId = (int) $this->params('id', null);

        if (null === $recordId) {
            $this->flashMessenger()->setNamespace('error')
                                   ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/education/questions');
        }

        $record = $this->questionsService->getQuestion($recordId);

        if (null === $record) {
            $this->flashMessenger()->setNamespace('error')
                                   ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/education/questions');
        }

        $form = $this->questionsService->getEditQuestionForm($recordId);

        return new ViewModel(array(
            'record'   => $record,
            'form'     => $form,
            'recordId' => $recordId,
            'productCategories' => '',
        ));
    }

    /**
     * Create a new question record
     *
     * @return ViewModel|array
     */
    public function createAction()
    {
    	$schoolId = (int) $this->params('school_id', null);
    	
        $record = new \SmartQuestions\Entity\Questions();

        $form = $this->questionsService->getCreateQuestionForm();

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());
            if ($form->isValid()) {
            	$data = $form->getData();
            	
            	$record->setDisabled($data->getDisabled());
            	$record->setTextQuestion($data->getTextQuestion());
            	$record->setTextCorrectAnswer($data->getTextCorrectAnswer());
            	$record->setTextOptionOne($data->getTextOptionOne());
            	$record->setTextOptionTwo($data->getTextOptionTwo());
            	$record->setTextOptionThree($data->getTextOptionThree());
            	$record->setImageQuestion($data->getImageQuestion());
            	$record->setImageCorrectAnswer($data->getImageCorrectAnswer());
            	$record->setImageOptionOne($data->getImageOptionOne());
            	$record->setImageOptionTwo($data->getImageOptionTwo());
            	$record->setImageOptionThree($data->getImageOptionThree());
            	$record->setIsImage($data->getIsImage());
            	$record->setGradeId($data->getGradeId());
            	$record->setSubjectId($data->getSubjectId());
            	$record->setSchoolId($schoolId);
            	
                $this->questionsService->createQuestion($record, $this->identity());

                $this->flashMessenger()->setNamespace('success')
                                       ->addMessage('You have successfullly created a new Question.');

                return $this->redirect()->toRoute('rocket-admin/education/questions');
            } else {
                $this->flashMessenger()->setNamespace('error')
                                       ->addMessage('There was an error trying to create a new Question.');
            }
        }

        $uri = $this->getRequest()->getUri();
        $base = sprintf('%s://%s', $uri->getScheme(), $uri->getHost());
        $this->viewHelperManager->get('HeadScript')
             ->appendFile($base . '/assets/rocket-admin/ckeditor/ckeditor.js');
        $this->viewHelperManager->get('InlineScript')
             ->appendScript("$(function () {CKEDITOR.replace('question-fieldset[html]');});", 'text/javascript');

        return new ViewModel(array(
            'record' => $record,
            'form'   => $form,
        ));
    }

    /**
     * Edit an existing question record
     *
     * @return ViewModel|array
     */
    public function editAction()
    {
        $recordId = (int) $this->params('id', null);

        if (null === $recordId) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/education/questions');
        }

        $record = $this->questionsService->getQuestion($recordId);

        if (null === $record) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/education/questions');
        }

        $form = $this->questionsService->getEditQuestionForm($recordId);

        if ($this->request->isPost()) {
            $form->setData($this->request->getPost());

            if ($form->isValid()) {
                $this->questionsService->editQuestion($record, $this->identity());

                $this->flashMessenger()->setNamespace('success')
                     ->addMessage('You have successfully edited a Question.');

                return $this->redirect()->toRoute('rocket-admin/education/questions');
            } else {
                $form->getData();
                $this->flashMessenger()->setNamespace('error')
                     ->addMessage('There was an error trying to edit an existing Question.');
            }
        }

        $uri = $this->getRequest()->getUri();
        $base = sprintf('%s://%s', $uri->getScheme(), $uri->getHost());
        $this->viewHelperManager->get('HeadScript')
             ->appendFile($base . '/assets/rocket-admin/ckeditor/ckeditor.js');
        $this->viewHelperManager->get('InlineScript')
             ->appendScript("$(function () {CKEDITOR.replace('question-fieldset[html]');});", 'text/javascript');

        return new ViewModel(array(
            'record'   => $record,
            'form'     => $form,
            'recordId' => $recordId,
        ));
    }

    /**
     * Delete an existing question record (toggle deleted boolean)
     *
     * @return void
     */
    public function deleteAction()
    {
        $recordId = (int) $this->params('id', null);

        if (null === $recordId) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/education/questions');
        }

        $record = $this->questionsService->getQuestion($recordId);

        if (null === $record) {
            $this->flashMessenger()->setNamespace('error')
                 ->addMessage('You have attempted to access an invalid record.');

            return $this->redirect()->toRoute('rocket-admin/education/questions');
        }

        $this->questionsService->deleteQuestion($record, $this->identity());

        $this->flashMessenger()->setNamespace('success')
             ->addMessage('You have successfully deleted a Question.');

        return $this->redirect()->toRoute('rocket-admin/education/questions');
    }
}
