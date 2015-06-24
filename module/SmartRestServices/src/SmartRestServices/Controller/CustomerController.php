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
use SmartAccounts\Form\AccountsForm;
use SmartAccounts\Service\AccountsService;
use SmartAccounts\Form\EmailsForm;
use SmartAccounts\Service\EmailsService;
use SmartAccounts\Form\PlansForm;
use SmartAccounts\Service\PlansService;
use SmartQuestions\Form\QuestionForm;
use SmartQuestions\Service\QuestionsService;
use SmartQuestions\Form\ResultForm;
use SmartQuestions\Service\ResultsService;
use Zend\Mail;

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
     * @var AccountsService
     */
    protected $accountsService;
    
    /**
     * @var ResultService
     */
    protected $resultService;
    
    /**
     * @var QuestionService
     */
    protected $questionService;
    
    /**
     * @var EmailsService
     */
    protected $emailsService;
    
    /**
     * @var PlansService
     */
    protected $plansService;
    
    
    const USERNAME = 'raven';
    const PASSWORD = '123234';
    

    /**
     * @param CustomerService  $customerService
     * @param HelperPluginManager $viewHelperManager
     */
    public function __construct(
    		CustomerService  	$customerService,
    		AccountsService  	$accountsService,
    		ResultsService  	$resultService,
    		QuestionsService  	$questionService,
    		EmailsService  		$emailsService,
    		PlansService  		$plansService
    )
    {
    	$this->customerService  = $customerService;
    	$this->accountsService  = $accountsService;
    	$this->resultService  	= $resultService;
    	$this->questionService  = $questionService;
    	$this->emailsService  	= $emailsService;
    	$this->plansService  	= $plansService;
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

    		if($data['smartdata']['authentication']['username'] == self::USERNAME && $data['smartdata']['authentication']['password'] == self::PASSWORD)
    		{
    			if(isset($data['smartdata']['editCustomer']))
    			{
    				$record = new \SmartAccounts\Entity\Customer();
    				$user = new \RocketUser\Entity\User();
    				 
    				$editCustomer = $data['smartdata']['editCustomer'];
    				
    				$record = $this->customerService->getCustomerByLoginPassword($editCustomer['login'], $editCustomer['password']);
    				$email2 = $this->emailsService->getEmailsByName($editCustomer['email']);
 
    				if(empty($record))
    				{
    					$result = new JsonModel(array(
    						'status'	=> 'error',
    						'message'	=> 'Login or password is invalid'
    					));
    				}
    				elseif(empty($email2))
    				{
    					$result = new JsonModel(array(
    						'status'	=> 'error',
    						'message'	=> 'Email is invalid'
    					));
    				}
    				else
	    			{
	    				
	    				$record->setName($editCustomer['name']);
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
    			}
    			else if(isset($data['smartdata']['editNotification']))
    			{
    				$record = new \SmartAccounts\Entity\Customer();
    				$user = new \RocketUser\Entity\User();
    				 
    				$editNotification = $data['smartdata']['editNotification'];
    				
    				$record = $this->customerService->getCustomerByLoginPassword($editNotification['login'], $editNotification['password']);

    				if(empty($record))
    				{
    					$result = new JsonModel(array(
    							'status'	=> 'error',
    							'message'	=> 'Login or password is invalid'
    					));
    				}
    				else 
    				{
	    				$record->setNotificationFree($editNotification['notificationFree']);
	    				$record->setNotificationGrade($editNotification['notificationGrade']);
	    				 
	    				$user->setUsername('android');
	    				 
	    				$this->customerService->editCustomer($record, $user);
	    				 
	    				$result = new JsonModel(array(
	    						'status'	=> 'success'
	    				));
    				}
    			}
    			else if(isset($data['smartdata']['editPassword']))
    			{
    				$record = new \SmartAccounts\Entity\Customer();
    				$user = new \RocketUser\Entity\User();
    				 
    				$editPassword = $data['smartdata']['editPassword'];
    				
    				$record = $this->customerService->getCustomerByLoginPassword($editPassword['login'], $editPassword['oldPassword']);
    				$email2 = $this->emailsService->getEmailsByName($editCustomer['email']);
    				
    				if(empty($record))
    				{
    					$result = new JsonModel(array(
    							'status'	=> 'error',
    							'message'	=> 'Login or password is invalid'
    					));
    				}
    				else
    				{
	    				$record->setPassword($editPassword['newPassword']);
	    				 
	    				$user->setUsername('android');
	    				 
	    				$this->customerService->editCustomer($record, $user);
	    				 
	    				$result = new JsonModel(array(
	    						'status'	=> 'success'
	    				));
    				}
    				 
    			}
    			else if(isset($data['smartdata']['forgotPassword']))
    			{
    				$record = new \SmartAccounts\Entity\Customer();
    				$user = new \RocketUser\Entity\User();
    				 
    				$editForgotPassword = $data['smartdata']['forgotPassword'];
    				
    				$record = $this->customerService->getCustomerByLoginPassword($editForgotPassword['login'], $editForgotPassword['password']);
    				$email2 = $this->emailsService->getEmailsByName($editForgotPassword['email']);
    				
    				if(empty($record))
    				{
    					$result = new JsonModel(array(
    							'status'	=> 'error',
    							'message'	=> 'Login or password is invalid'
    					));
    				}
    				elseif(empty($email2))
    				{
    					$result = new JsonModel(array(
    						'status'	=> 'error',
    						'message'	=> 'Email is invalid'
    					));
    				}
    				else 
    				{ 
	    				$to = array($email2->getEmail());
	    				
	    				$from = 'admin@learningapplock.com';
	    						
	    				$subject = 'Learning App Lock Forgot Password';
	
	                	$message = '<p><b>' . $record->getName() . '</b></br> You have requested your password.  Your password is '. $record->getPassword() .'</p>';
	     
	    				$this->sendEmail($from, $to, $subject, $message);
	    				 
	    				$result = new JsonModel(array(
	    						'status'	=> 'success'
	    				));
    				}
    				 
    			}
    			else if(isset($data['smartdata']['login']))
    			{

    				$record = new \SmartAccounts\Entity\Customer();
    				$email = new \SmartAccounts\Entity\Emails();
    				$account = new \SmartAccounts\Entity\Accounts();
    				$user = new \RocketUser\Entity\User();
    					
    				$editLogin = $data['smartdata']['login'];
    				
    				$record = $this->customerService->getCustomerByLoginPassword($editLogin['login'], $editLogin['password']);
    				$email2 = $this->emailsService->getEmailsByName($editLogin['email']);
    				
    				if(empty($record))
    				{
    					$result = new JsonModel(array(
    							'status'	=> 'error',
    							'message' 	=> 'Login or password is invalid'
    					));
    				}
    				else
    				{
    					$customer = $this->customerService->getCustomerByLogin($editLogin['login']);
    					
	    				if(empty($email2))
	    				{
	    					$email->setEmail($editLogin['email']);
	    					$email->setCustomerId($customer);
	    					 
	    					$this->emailsService->createEmails($email, $user);
	    				}

	    				//echo $customer->getCustomerId();exit;
	    				$account = $this->accountsService->getAccounts($customer);
	    				
    					$result = new JsonModel(array(
    						'status'	=> 'success',
    						'message'	=> $account->getPlanId()->getPlanDescription()
    					));
    					
    				}
    				
    			}
    			else if(isset($data['smartdata']['checkDownload']))
    			{
    				$record = new \SmartAccounts\Entity\Customer();
    				 
    				$checkDownload = $data['smartdata']['checkDownload'];
    				
    				$record = $this->customerService->getCustomerByLoginPassword($checkDownload['login'], $checkDownload['password']);

    				if(empty($record))
    				{
    					$result = new JsonModel(array(
    							'status'	=> 'error',
    							'message'	=> 'Login or password is invalid'
    					));
    				}
    				else 
    				{
	    				
    					$download = $record->getDownloadReady();
    					 
    					if($download)
    					{
    						$result = new JsonModel(array(
    								'status'	=> 'success',
    								'message' 	=> 'Download_Ready'
    						));
    					}
    					else {
    						$result = new JsonModel(array(
    								'status'	=> 'success',
    								'message' 	=> 'No_Download'
    						));
    					}
    				}
    			}
    			else if(isset($data['smartdata']['downloadUrl']))
    			{
    				$domain = $_SERVER['HTTP_HOST'];
    				
    				$record = new \SmartAccounts\Entity\Customer();
    				 
    				$downloadURL = $data['smartdata']['downloadUrl'];
    				
    				$record = $this->customerService->getCustomerByLoginPassword($downloadURL['login'], $downloadURL['password']);

    				if(empty($record))
    				{
    					$result = new JsonModel(array(
    							'status'	=> 'error',
    							'message'	=> 'Login or password is invalid'
    					));
    				}
    				else
    				{
	    				$downloadReady = $record->getDownloadReady();
	    				
	    				if($downloadReady)
	    				{
		    				$download = $record->getDownloadUrl();
		    				$id = $record->getCustomerId();
		
		    				$url = 'http://' . $domain.'/assets/customer/'.$id.'/'.$download;
	
		    				$result = new JsonModel(array(
		    					'status'	=> 'success',
					    		'message' 	=> urlencode($url)
		    				));
	    				}
	    				else {
	    					$result = new JsonModel(array(
	    							'status'	=> 'success',
				    				'message' 	=> 'No_Download'
	    					));
	    				}
    				}
    			}
    			else if(isset($data['smartdata']['updatePlan']))
    			{
    				$record = new \SmartAccounts\Entity\Customer();
    				$account = new \SmartAccounts\Entity\Accounts();
    				$user = new \RocketUser\Entity\User();
    				$plan = new \SmartAccounts\Entity\Plans();
    				 
    				$user->setUsername('android');
    				
    				$updateProcess = $data['smartdata']['updatePlan'];
    				
    				$record = $this->customerService->getCustomerByLoginPassword($updateProcess['login'], $updateProcess['password']);

    				if(empty($record))
    				{
    					$result = new JsonModel(array(
    							'status'	=> 'error',
    							'message'	=> 'Login or password is invalid'
    					));
    				}
    				else
    				{
    					switch($updateProcess['payment_status'])
    					{
    						case 'none' :
    							$status = 0;
    							break;
    						case 'processing' :
    							$status = 1;
    							break;
    						case 'cancelled' :
    							$status = 2;
    							break;
    						case 'success' :
    							$status = 3;
    							break;
    					}
    					$recordAccount = $this->accountsService->getAccountsByCustomerId($record->getCustomerId());

    					//echo $recordAccount->getAccountId();exit;
    					$plans = $this->plansService->getPlansByDescription($updateProcess['product_id']);
    					
    					if($updateProcess['payment_status'] == 'success')
    					{
    						$recordAccount->setStatus('0');
    						$recordAccount->setPlanId($plans);
    						$this->accountsService->editAccounts($recordAccount, $user);
    					}
    					else
    					{
    						$recordAccount->setStatus($status);
    						$recordAccount->setProcessingPlanId($plans);
    						$this->accountsService->editAccounts($recordAccount, $user);
    					}
    					
    					$result = new JsonModel(array(
	    					'status'	=> 'success'
    					));
    					
    				}
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
	    			$email = new \SmartAccounts\Entity\Emails();
	    			$user = new \RocketUser\Entity\User();
	    			
	    			$newCustomer = $data['smartdata']['newCustomer'];
	    			
	    			$record2 = $this->customerService->getCustomerByLogin($newCustomer['login']);
	    			$email2 = $this->emailsService->getEmailsByName($newCustomer['email']);
	    			
	    			if(!empty($record2))
	    			{
		    			$result = new JsonModel(array(
		    					'status'	=> 'error',
		    					'message'	=> 'Login is invalid or in use please create a different one'
		    			));
	    			}
	    			elseif(!empty($email2))
	    			{
		    			$result = new JsonModel(array(
		    					'status'	=> 'error',
		    					'message'	=> 'Email is in use please reset your password'
		    			));
	    			}
	    			else
	    			{
	    			
		    			//$record->setEmail($newCustomer['email']);
		    			$record->setPassword($newCustomer['password']);
		    			$record->setLogin($newCustomer['login']);
		    			$record->setName($newCustomer['name']);
		    			
		    			$user->setUsername('android');
		    			
		    			$this->customerService->createCustomer($record, $user);
		    			
		    			$customer = $this->customerService->getCustomerByLogin($newCustomer['login']);
		    			
		    			$email->setEmail($newCustomer['email']);
		    			$email->setCustomerId($customer);
		    			
		    			$this->emailsService->createEmails($email, $user);
		    			
		    			$result = new JsonModel(array(
		    					'status'	=> 'success'
		    			));
	    			}
	    		}
	    		else if(isset($data['smartdata']['newGrade']))
	    		{

	    			$record = new \SmartAccounts\Entity\Customer();
	    			$results = new \SmartQuestions\Entity\Results();
	    			$user = new \RocketUser\Entity\User();
	    			
	    			$newGrade = $data['smartdata']['newGrade'];

    				$customer = $this->customerService->getCustomerByLoginPassword($newGrade['login'], $newGrade['password']);
	    				    			
	    			if(empty($customer))
	    			{
	    				$result = new JsonModel(array(
	    						'status'	=> 'error',
	    						'message'	=> 'Login is invalid or in use please create a different one'
	    				));
	    			}
	    			else
	    			{
		    			$question = $this->questionService->getQuestion($newGrade['questionId']);
		    			
		    			if(empty($question))
		    			{
		    				$result = new JsonModel(array(
		    						'status'	=> 'error',
		    						'message'	=> 'The Question you scored does not exist'
		    				));
		    			}
		    			else
		    			{
			    			//$customerRecord->set
			    			$results->setCustomerId($customer);
			    			$results->setStatus($newGrade['status']);
			    			$results->setQuestionId($question);
			    			$user->setUsername('android');
			    			
			    			$this->resultService->createResult($results, $user);
			    		
			    			$result = new JsonModel(array(
			    					'status'	=> 'success'
			    			));
		    			}
	    			}
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
