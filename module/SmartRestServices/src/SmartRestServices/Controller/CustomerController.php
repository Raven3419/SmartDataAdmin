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
     * @param CustomerService  $customerService
     * @param HelperPluginManager $viewHelperManager
     */
    public function __construct(
    		CustomerService  $customerService
    )
    {
    	$this->customerService  = $customerService;
    }
    
    public function indexAction()
    {
    	$this->methodNotAllowed();
    }
    
    public function editAction()
    {
    	$this->methodNotAllowed();
    }
    
    public function createAction()
    {
    	if ($this->request->isPost())
    	{	
    		$json = $this->params()->fromPost();

    		$data = json_decode($json['data'], true);

    		if($data['profile']['authentication']['username'] == 'raven' && $data['profile']['authentication']['password'] == '123234')
    		{
    			$record = new \SmartAccounts\Entity\Customer();
    			$user = new \RocketUser\Entity\User();
    			
    			$newCustomer = $data['profile']['newCustomer'];
    			
    			$record->setEmail($newCustomer['email']);
    			$record->setPassword($newCustomer['password']);
    			
    			$user->setUsername('android');
    			
    			$this->customerService->createCustomer($record, $user);
    			
    			$result = new JsonModel(array(
    					'status'	=> 'success'
    			));
    			
    			return $result;
    			
    		}
    		else 
    		{
    			$result = new JsonModel(array(
    				'status'	=> 'error',
		    		'message' 	=> 'You have attempted to HACK! email has been sent to admin.'
        		));

        		return $result;
    		}
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
}
