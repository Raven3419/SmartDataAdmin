<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * This source file is part of Commander.
 *
 * PHP version 5.5
 *
 * @category   Zend
 * @package    Application
 * @subpackage Controller
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace Application\Controller;

use Zend\EventManager\EventManagerInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use RocketCms\Service\SiteService;
use RocketCms\Entity\SiteInterface;
use RocketCms\Service\LayoutService;
use RocketCms\Service\TemplateService;
use RocketCms\Service\PageService;
use RocketCms\Service\MenuService;
use RocketCms\Service\MenuElementService;
use RocketUser\Service\UserService;
use RocketUser\Service\LoginService;
use RocketDam\Service\AssetService;
use RocketEcom\Service\RocketEcomService;
use Zend\View\Model\JsonModel;
use Zend\View\HelperPluginManager as ViewHelperManager;
use Zend\Session\Container;
use Zend\Mail;
use Zend\Stdlib\Parameters;
use Zend\Session\SessionManager;
use SmartQuestions\Service\CustomerQuestionsService;

/**
 * Sites controller for admin module
 *
 * @category   Zend
 * @package    Application
 * @subpackage Controller
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 */
class IndexController extends AbstractActionController
{
    /**
     * @var \RocketCms\Service\SiteService
     */
    protected $siteService;

    /**
     * @var \RocketCms\Service\LayoutService
     */
    protected $layoutService;

    /**
     * @var \RocketCms\Service\TemplateService
     */
    protected $templateService;

    /**
     * @var \RocketCms\Service\PageService
     */
    protected $pageService;

    /**
     * @var \RocketCms\Service\MenuService
     */
    protected $menuService;

    /**
     * @var \RocketCms\Service\MenuElementService
     */
    protected $menuElementService;

    /**
     * @var UserService
     */
    protected $userService;

    /**
     * @var LoginService
     */
    protected $loginService;

    /**
     * @var CustomerService
     */
    protected $customerService;

    /**
     * @var FileLogService
     */
    protected $fileLogService;

    /**
     * @var AssetService
     */
    protected $assetService;

    /**
     * @var LundSiteService
     */
    protected $lundSiteService;

    /**
     * @var LundProductService
     */
    protected $lundProductService;

    /**
     * @var RetailerService
     */
    protected $retailerService;

    /**
     * @var RocketEcomService
     */
    protected $rocketEcomService;

    /**
     * @var CustomerQuestionService
     */
    protected $customerQuestionService;

    /**
     * @var \Zend\View\HelperPluginManager
     */
    protected $viewHelperManager;

    /**
     * @var \Zend\Session\Container
     */
    protected $sessionLogin;
    /**
     * @param SiteService         		$siteService
     * @param LayoutService       		$layoutService
     * @param TemplateService     		$templateService
     * @param PageService         		$pageService
     * @param MenuService         		$menuService
     * @param MenuElementService  		$menuElementService
     * @param UserService         		$userService
     * @param LoginService        		$loginService
     * @param CustomerService     		$customerService
     * @param FileLogService      		$fileLogService
     * @param AssetService        		$assetService
     * @param LundSiteService     		$lundSiteService
     * @param LundProductService  		$lundProductService
     * @param RetailerService     		$retailerService
     * @param RocketEcomService   		$rocketEcomService
     * @param HelperPluginManager 		$viewHelperManager
     * @param CustomerQuestionsService 	$customerQuestionService
     */
    public function __construct(
        SiteService 				$siteService,
        LayoutService 				$layoutService,
        TemplateService 			$templateService,
        PageService 				$pageService,
        MenuService 				$menuService,
        MenuElementService 			$menuElementService,
        UserService 				$userService,
        LoginService 				$loginService,
        AssetService 				$assetService,
        RocketEcomService 			$rocketEcomService,
        ViewHelperManager 			$viewHelperManager,
    	CustomerQuestionsService	$customerQuestionService
    ) {
        $this->siteService        		= $siteService;
        $this->layoutService      		= $layoutService;
        $this->templateService   		= $templateService;
        $this->pageService        		= $pageService;
        $this->menuService        		= $menuService;
        $this->menuElementService 		= $menuElementService;
        $this->userService  			= $userService;
        $this->loginService 			= $loginService;
        $this->assetService 			= $assetService;
        $this->rocketEcomService 		= $rocketEcomService;
        $this->viewHelperManager 		= $viewHelperManager;
        $this->customerQuestionService 	= $customerQuestionService;
        $this->sessionLogin 			= new Container('sessionLogin');
    }

    /**
     * Construct CMS Page
     *
     * @return \Zend\View\Model\ViewModel|array
     */
    public function indexAction()
    {
        $slugone   = $this->params()->fromRoute('slugone', null);
        $slugtwo   = $this->params()->fromRoute('slugtwo', null);
        $slugthree = $this->params()->fromRoute('slugthree', null);
        $slugfour  = $this->params()->fromRoute('slugfour', null);
        $slugfive  = $this->params()->fromRoute('slugfive', null);
        
        if (null === $slugone) {
            /* NO PAGE FOUND IN ROUTE */
        }

        if (null != $slugtwo) {
            if ($slugone != 'user-portal' && $slugone != 'portal' && $slugone != 'products' && $slugone != 'vehicles' && $slugone != 'cart' && $slugone != 'checkout') {
                $slug = $slugone . '/' . $slugtwo;
            } else {
                $slug = $slugone;
            }
        } else {
            $slug = $slugone;
        }

        $envVariable = $_SERVER['APP_SITE'];

        $site     = $this->siteService->getSiteByEnvVariable($envVariable);
        if (null == $site) {
            return $this->redirect()->toRoute('rocket-admin');
        }
        
        $layout   = $this->layoutService->getLayoutBySite($site->getSiteId());
        $page     = $this->pageService->getPageBySlug($slug, $site->getSiteId());
        
	if (null != $page) {
        $template = $this->templateService->getTemplate($page->getTemplate()->getTemplateId());
	} else {
	return new ViewModel();
	}

        $this->layout($layout->getDirectory(). '/layout');

        if ($page->getLoadInclude()) {
            $vm = new ViewModel(array(
                'templateContent' => false,
                'loadInclude'     => $page->getLoadInclude(),
            ));
        } elseif ($page->getContent()) {
        	$string = $page->getContent();
        	
        	$newstring =str_replace('[[page_slug]]', $page->getSlug(), $string);
        	
        	$page->setContent($newstring);
        	
            $vm = new ViewModel(array(
                'templateContent' => $page->getContent(),
                'loadInclude'     => false,
            ));
        } else {
            $vm = new ViewModel();
        }

        $vm->setTemplate($template->getFilename());

        $menu = $this->menuService;
        
	        $this->layout()->setVariables(array(
	            'menuService'        => $this->menuService,
	            'menuElementService' => $this->menuElementService,
	            'site'               => $site,
	            'page'               => $page,
	            'metaTitle'          => $page->getMetaTitle(),
	            'metaKeywords'       => $page->getMetaKeywords(),
	            'metaDescription'    => $page->getMetaDescription(),
	            'slugtwo'            => $slugtwo,
	            'slugthree'          => $slugthree,
	            'slugfour'           => $slugfour,
	        ));
      

        if ($page->getSlug() == 'index') {
            $vm = $this->index($site, $vm);
        } elseif ($page->getSlug() == 'login') {
            $vm = $this->login($vm);
        } elseif ($page->getSlug() == 'portal') {
            $vm = $this->portal($vm);
        } elseif ($page->getSlug() == 'logout') {
            $vm = $this->logout($vm);
        } 

        return $vm;
    }

    protected function logout(ViewModel $vm)
    {
        $this->loginService->logout();
        unset ($this->sessionLogin->id);

        return $this->redirect()->toUrl('/login');
    }

    protected function login(ViewModel $vm)
    {
    	
        if ($this->request->isPost()) {
        	
	            $authResult = $this->loginService->customerAuthenticate($this->getRequest()->getPost('login-fieldset')['username'], $this->getRequest()->getPost('login-fieldset')['password'], $this->getRequest()->getPost('login-fieldset')['rememberme']);
	
	            //print_r($authResult);exit;
	            switch ($authResult['status']) {
	            case 'success':

	            	
	            	$this->sessionLogin->id = $authResult['id'];
	            	$this->sessionLogin->name = $this->getRequest()->getPost('login-fieldset')['username'];
	            	   
                    return $this->redirect()->toUrl('/portal');
	                    exit();
	           
	                break;
	            case 'error':
	                	
	                    echo json_encode(array('error' => 'invalid credentials'));
	                    exit();
	                break;
	            }
        }


        return $vm;
    }
    
    protected function portal(ViewModel $vm)
    {
    	if($this->sessionLogin->id)
    	{
    		echo $this->sessionLogin->id;exit;
    		
    		$records = $this->customerQuestionService->getCurrentQuestions($schoolId);
    		 
    		return new ViewModel(array(
    				'records' => $records,
    		));
    	}
    	else
    	{
    		return $this->redirect()->toUrl('/login');
    	}
    	
    }

    protected function index(SiteInterface $site, ViewModel $vm)
    {
    	return $vm;
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
