<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * PHP version 5.5
 *
 * @category   Zend
 * @package    SmartRestServices
 * @subpackage Controller
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace SmartRestServices\Controller;

use Zend\Mvc\Controller\AbstractRestfulController;
use Zend\View\Model\JsonModel;
use SmartAccounts\Form\CustomerForm;
use SmartAccounts\Service\CustomerService;
use SmartAccounts\Service\CustomerProductCategoryService;
use SmartQuestions\Form\QuestionForm;
use SmartQuestions\Service\QuestionsService;
use SmartQuestions\Form\ResultForm;
use SmartQuestions\Service\ResultsService;

/**
 * Customer controller for SmartRestServices module
 *
 * @category   Zend
 * @package    SmartRestServices
 * @subpackage Controller
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 */
class CustomerController extends AbstractRestfulController
{
    /**
     * @var CustomerService
     */
    protected $customerService;
    /**
     * @var ResultService
     */
    protected $resultService;
    /**
     * @var QuestionService
     */
    protected $questionService;
    
    
    const USERNAME = 'raven';
    const PASSWORD = '123234';
    

    /**
     * @param CustomerService  $customerService
     * @param HelperPluginManager $viewHelperManager
     */
    public function __construct(
    		CustomerService  $customerService,
    		ResultsService  $resultService,
    		QuestionsService  $questionService
    )
    {
    	$this->customerService  = $customerService;
    	$this->resultService  = $resultService;
    	$this->questionService  = $questionService;
    }
    
    public function indexAction()
    {
    	$this->methodNotAllowed();
    }
    
    public function editAction()
    {
    	if ($this->request->isPost())
    	{	
    		$json = $this->params()->fromPost();

    		$data = json_decode($json['data'], true);

    		//print_r($data['smartdata']);exit;
    		if($data['smartdata']['authentication']['username'] == self::USERNAME && $data['smartdata']['authentication']['password'] == self::PASSWORD)
    		{
    			if(isset($data['smartdata']['editCustomer']))
    			{
    				$record = new \SmartAccounts\Entity\Customer();
    				$user = new \RocketUser\Entity\User();
    				 
    				$editCustomer = $data['smartdata']['editCustomer'];
    				
    				$record = $this->customerService->getCustomerByEmail($editCustomer['email']);
    				 
    				$record->setFirstName($editCustomer['firstname']);
    				$record->setLastName($editCustomer['lastname']);
    				$record->setParentFirstName($editCustomer['parentFirstName']);
    				$record->setParentLastName($editCustomer['parentLastName']);
    				$record->setParentEmail($editCustomer['parentEmail']);
    				$record->setAddress($editCustomer['address']);
    				$record->setCity($editCustomer['city']);
    				$record->setState($editCustomer['state']);
    				$record->setZip($editCustomer['zip']);
    				 
    				$user->setUsername('android');
    				 
    				$this->customerService->editCustomer($record, $user);
    				 
    				$result = new JsonModel(array(
    						'status'	=> 'success'
    				));
    				 
    			}
    			else if(isset($data['smartdata']['editNotification']))
    			{
    				$record = new \SmartAccounts\Entity\Customer();
    				$user = new \RocketUser\Entity\User();
    				 
    				$editNotification = $data['smartdata']['editNotification'];
    				
    				$record = $this->customerService->getCustomerByEmail($editNotification['email']);
    				 
    				$record->setNotificationFree($editNotification['notificationFree']);
    				$record->setNotificationGrade($editNotification['notificationGrade']);
    				 
    				$user->setUsername('android');
    				 
    				$this->customerService->editCustomer($record, $user);
    				 
    				$result = new JsonModel(array(
    						'status'	=> 'success'
    				));
    				 
    			}
    			else if(isset($data['smartdata']['editPassword']))
    			{
    				$record = new \SmartAccounts\Entity\Customer();
    				$user = new \RocketUser\Entity\User();
    				 
    				$editPassword = $data['smartdata']['editPassword'];
    				
    				$record = $this->customerService->getCustomerByEmail($editPassword['email']);
    				 
    				$record->setPassword($editPassword['password']);
    				 
    				$user->setUsername('android');
    				 
    				$this->customerService->editCustomer($record, $user);
    				 
    				$result = new JsonModel(array(
    						'status'	=> 'success'
    				));
    				 
    			}
    			else if(isset($data['smartdata']['forgotPassword']))
    			{
    				$to = '';
    				$record = new \SmartAccounts\Entity\Customer();
    				$user = new \RocketUser\Entity\User();
    				 
    				$editNotification = $data['smartdata']['forgotPassword'];
    				
    				$record = $this->customerService->getCustomerByEmail($editNotification['email']);
    				 
    				if(!empty($record->getParentEmail()))
    				{
    					$to = $record->getParentEmail();
    				}
    				else
    				{
    					$to = $record->getEmail();
    				}
    				$to = 'raven3419@gmail.com';
    				
    				$from = 'admin@learningapplock.com';
    						
    				$subject = 'Learning App Lock Forgot Password';

                	$message = '<p><b>' . $record->getFirstName() .' ' . $record->getLastName() . '</b></br> You have requested your password.  Your password is '. $record->getPassword() .'</p>';
     
    				$this->sendEmail($from, $to, $subject, $message);
    				 
    				$result = new JsonModel(array(
    						'status'	=> 'success'
    				));
    				 
    			}
	    		else 
	    		{
	    			$result = new JsonModel(array(
	    				'status'	=> 'error',
			    		'message' 	=> 'Invalid Method!!.'
	        		));
	
	    		}
    		}
    		else 
    		{
    			$result = new JsonModel(array(
    				'status'	=> 'error',
		    		'message' 	=> 'You have attempted to HACK! email has been sent to admin.'
        		));

    		}
    		
    		return $result;
    	}
    	else 
    	{
    		return $this->redirect()->toUrl('http://www.thesmartdata.com');
    	}
    }
    
    public function createAction()
    {
    	if ($this->request->isPost())
    	{	
    		$json = $this->params()->fromPost();

    		$data = json_decode($json['data'], true);

    		if($data['smartdata']['authentication']['username'] == self::USERNAME && $data['smartdata']['authentication']['password'] == self::PASSWORD)
    		{
    			if(isset($data['smartdata']['newCustomer']))
    			{
	    			$record = new \SmartAccounts\Entity\Customer();
	    			$user = new \RocketUser\Entity\User();
	    			
	    			$newCustomer = $data['smartdata']['newCustomer'];
	    			
	    			$record->setEmail($newCustomer['email']);
	    			$record->setPassword($newCustomer['password']);
	    			$record->setNotificationFree('1');
	    			$record->setNotificationGrade('1');
	    			
	    			$user->setUsername('android');
	    			
	    			$this->customerService->createCustomer($record, $user);
	    			
	    			$result = new JsonModel(array(
	    					'status'	=> 'success'
	    			));
	    		}
	    		else if(isset($data['smartdata']['newGrade']))
	    		{
	    			$record = new \SmartQuestions\Entity\Results();
	    			$user = new \RocketUser\Entity\User();
	    			
	    			$newGrade = $data['smartdata']['newGrade'];

	    			$customer = $this->customerService->getCustomerByEmail($newGrade['email']);
	    			$question = $this->questionService->getQuestion($newGrade['questionId']);
	    			
	    			//$customerRecord->set
	    			$record->setCustomerId($customer);
	    			$record->setStatus($newGrade['status']);
	    			$record->setQuestionId($question);
	    			$user->setUsername('android');
	    			
	    			$this->resultService->createResult($record, $user);
	    		
	    			$result = new JsonModel(array(
	    					'status'	=> 'success'
	    			));
	    		}
	    		else 
	    		{
	    			$result = new JsonModel(array(
	    				'status'	=> 'error',
			    		'message' 	=> 'Invalid Method!!.'
	        		));
	
	    		}
    		}
    		else 
    		{
    			$result = new JsonModel(array(
    				'status'	=> 'error',
		    		'message' 	=> 'You have attempted to HACK! email has been sent to admin.'
        		));

    		}
    		
    		return $result;
    	}
    	else 
    	{
    		return $this->redirect()->toUrl('http://www.thesmartdata.com');
    	}
    }
    
    public function methodNotAllowed()
    {
    	$this->response->setStatusCode(\Zend\Http\PhpEnvironment\Response::STATUS_CODE_405);
    }
    


    protected function sendEmail($from = null, $to = array(), $subject = null, $message = null)
    {
    	$mail = new Mail\Message();
    	$html = new \Zend\Mime\Part($message);
    	$html->type = 'text/html';
    	$body = new \Zend\Mime\Message();
    	$body->setParts(array($html));
    	$mail->setBody($body);
    	$mail->setFrom($from);
    	foreach ($to as $recipient) {
    		$mail->addTo($recipient);
    	}
    	$mail->setSubject($subject);
    	$transport = new Mail\Transport\Sendmail();
    	$transport->send($mail);
    
    	return true;
    }
    
}
