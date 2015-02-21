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
 * @author     Jason Guthery <jason@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
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
use LundCustomer\Service\CustomerService;
use LundProducts\Service\FileLogService;
use RocketDam\Service\AssetService;
use LundSite\Service\LundSiteService;
use LundProducts\Service\LundProductService;
use LundCustomer\Service\RetailerService;
use RocketEcom\Service\RocketEcomService;
use Zend\View\Model\JsonModel;
use Zend\View\HelperPluginManager as ViewHelperManager;
use Zend\Session\Container;
use Zend\Mail;
use Zend\Stdlib\Parameters;

/**
 * Sites controller for admin module
 *
 * @category   Zend
 * @package    Application
 * @subpackage Controller
 * @author     Jason Guthery <jason@rocketred.com>
 * @copyright  2013 Rocket Red (http://www.rocketred.com)
 * @license    http://opensource.org/licenses/BSD-3-Clause BSD 3-Clause
 * @version    GIT: $Id$
 * @link       https://github.com/rocketred/www-lunddigitalplatform for the canonical source repository
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
     * @var \Zend\View\HelperPluginManager
     */
    protected $viewHelperManager;

    /**
     * @var \Zend\Session\Container
     */
    protected $sessionSV;
    protected $sessionEC;

    protected $brandsService = null;
    protected $productCategoryService = null;
    protected $brandProductCategoryService = null;
    protected $productLineService = null;
    protected $productLineAssetService = null;
    protected $productLineFeatureService = null;
    protected $partService = null;
    protected $partAssetService = null;
    protected $vehCollectionService = null;
    protected $productReviewService = null;
    protected $cartService = null;
    protected $cartItemService = null;
    protected $orderService = null;
    protected $orderItemService = null;
    protected $orderAddressService = null;
    protected $shippingMethodService = null;

    /**
     * @param SiteService         $siteService
     * @param LayoutService       $layoutService
     * @param TemplateService     $templateService
     * @param PageService         $pageService
     * @param MenuService         $menuService
     * @param MenuElementService  $menuElementService
     * @param UserService         $userService
     * @param LoginService        $loginService
     * @param CustomerService     $customerService
     * @param FileLogService      $fileLogService
     * @param AssetService        $assetService
     * @param LundSiteService     $lundSiteService
     * @param LundProductService  $lundProductService
     * @param RetailerService     $retailerService
     * @param RocketEcomService   $rocketEcomService
     * @param HelperPluginManager $viewHelperManager
     */
    public function __construct(
        SiteService $siteService,
        LayoutService $layoutService,
        TemplateService $templateService,
        PageService $pageService,
        MenuService $menuService,
        MenuElementService $menuElementService,
        UserService $userService,
        LoginService $loginService,
        CustomerService $customerService,
        FileLogService $fileLogService,
        AssetService $assetService,
        LundSiteService $lundSiteService,
        LundProductService $lundProductService,
        RetailerService $retailerService,
        RocketEcomService $rocketEcomService,
        ViewHelperManager $viewHelperManager
    ) {
        $this->siteService        = $siteService;
        $this->layoutService      = $layoutService;
        $this->templateService    = $templateService;
        $this->pageService        = $pageService;
        $this->menuService        = $menuService;
        $this->menuElementService = $menuElementService;
        $this->userService  = $userService;
        $this->loginService = $loginService;
        $this->customerService = $customerService;
        $this->fileLogService = $fileLogService;
        $this->assetService = $assetService;
        $this->lundSiteService = $lundSiteService;
        $this->lundProductService = $lundProductService;
        $this->retailerService = $retailerService;
        $this->rocketEcomService = $rocketEcomService;
        $this->viewHelperManager = $viewHelperManager;
        $this->sessionSV = new Container('saved_vehicle');
        $this->sessionEC = new Container('saved_cart');
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
        
        if($slugone == 'process')
        {
        	if ($this->request->isPost())
        	{
        		$page     = $this->pageService->getPageBySlug($this->request->getPost()->shortform['page_slug'], $site->getSiteId());
        		if($page->getSendEmail())
        		{
        			$from = 'webmaster@appvault.com';
        			$to = array($site->getClientEmail());
        			$subject = 'New Short Form Submitted';
        			$message = '<table>';
        			foreach($this->request->getPost()->shortform as $key => $value)
        			{
        				if($key != 'page_slug')
        				{
        					$message .= '<tr><td>'.ucwords($key).'</td><td>'.ucwords($value).'<td></tr>';
        				}
        			}
        			
        			$message .= '</table>';
        			
        			$this->sendEmail($from, $to, $subject, $message);
        			
        			return $this->redirect()->toUrl('http://group1201.thesmartdata.com/thank-you');
        			//return $this->redirect()->toRoute('thank-you');
        		}
        	}
        }
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

        $brandsService = $this->lundProductService->getBrandsService();
        $brands        = $brandsService->getActiveBrands();

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
            'brands'             => $brands,
            'brandProductCategory' => $this->lundProductService->getBrandProductCategoryService(),
            'cart'               => ($this->sessionEC->cartId ? $this->sessionEC->cartId : null)
        ));

        if ($page->getSlug() == 'products') {
            $vm = $this->products($site, $vm, urldecode($slugtwo), urldecode($slugthree), urldecode($slugfour));
        } elseif ($page->getSlug() == 'cart') {
            $vm = $this->cart($site, $vm, $slugtwo, $slugthree);
        } elseif ($page->getSlug() == 'checkout') {
            $vm = $this->checkout($site, $vm, $slugtwo, $slugthree);
        } elseif ($page->getSlug() == 'index') {
            $vm = $this->index($site, $vm);
        } elseif ($page->getSlug() == 'login') {
            $vm = $this->login($vm);
        } elseif ($page->getSlug() == 'portal') {
            $vm = $this->portal($vm, $slugtwo);
        } elseif ($page->getSlug() == 'user-portal') {
            $vm = $this->userPortal($vm, $slugtwo);
        } elseif ($page->getSlug() == 'logout') {
            $vm = $this->logout($vm);
        } elseif ($page->getSlug() == 'about-us/news') {
            if (null != $slugthree) {
                $vm = $this->newsDetail($site, $slugthree, $vm);
            } else {
                $vm = $this->news($site, $vm);
            }
        } elseif ($page->getSlug() == 'about-us/dealers-edge') {
            $vm = $this->dealersEdge($site, $vm);
        } elseif ($page->getSlug() == 'about-us/drivers-council') {
            $vm = $this->driversCouncil($site, $vm);
        } elseif ($page->getSlug() == 'customer-care/product-registration') {
            $vm = $this->productRegistration($site, $vm);
        } elseif ($page->getSlug() == 'customer-care/product-support') {
            $vm = $this->productSupport($site, $vm);
        } elseif ($page->getSlug() == 'contact') {
            $vm = $this->contact($site, $vm);
        } elseif ($page->getSlug() == 'where-to-buy/online-retailers') {
            $vm = $this->onlineRetailer($site, $vm);
        } elseif ($page->getSlug() == 'where-to-buy/retailers') {
            $vm = $this->retailer($site, $vm);
        } elseif ($page->getSlug() == 'customer-care/installation') {
            $vm = $this->installation($site, $vm);
        } elseif ($page->getSlug() == 'showroom') {
            $vm = $this->showroom($site, $vm);
        }

        if ($page->getSlug() == 'index') {
            $sliders = $this->lundSiteService->getSliderService()->getActiveSlidersBySite($site);
            $vm->setVariable('sliders', $sliders);

            $testimonials = $this->lundSiteService->getTestimonialService()->getActiveTestimonialsBySite($site);
            $vm->setVariable('testimonials', $testimonials);
        }

        return $vm;
    }

    protected function logout(ViewModel $vm)
    {
        $this->loginService->logout();

        return $this->redirect()->toUrl('/');
    }

    protected function login(ViewModel $vm)
    {
        if ($this->identity()) {
            $role = $this->identity()->getRole()->getRoleName();

            if ($role == 'customer') {
                return $this->redirect()->toUrl('/portal');
            } else if ($role == 'user') {
                return $this->redirect()->toUrl('/user-portal');
            }
        }

        $form = $this->loginService->getLoginForm();

        $noFollow = ($this->params()->fromPost('nofollow') ? true : false);

        if ($this->request->isPost()) {
            $authResult = $this->loginService->authenticate($this->getRequest()->getPost());

            switch ($authResult['status']) {
            case 'success':
                if ($noFollow) {
                    $resultArray['data'] = array(
                        'userId' => $this->identity()->getUserId(),
                        'firstName' => $this->identity()->getFirstName());
                    echo json_encode($resultArray);
                    exit();
                } else {
                    return $this->redirect()->toUrl('/portal');
                }
                break;
            case 'error':
                if ($noFollow) {
                    echo json_encode(array('error' => 'invalid credentials'));
                    exit();
                } else {
                    $this->flashMessenger()->setNamespace('error')
                        ->addMessage($authResult['message']);

                    $form->setData($this->request->getPost());
                }
                break;
            }
        }

        $vm->setVariable('form', $form);

        return $vm;
    }

    protected function registerUser()
    {
        $systemUser = $this->userService->getUser(6);

        $user = $this->userService->create($systemUser, $this->getRequest()->getPost());

        if (null != $user) {
            $post = $this->getRequest()->getPost();
            $userFieldset = $post->get('user-fieldset');
            $data = new Parameters();
            $values = array();
            $values['username'] = $userFieldset['username'];
            $values['password'] = $userFieldset['password'];
            $values['rememberme'] = 1;
            $data->set('login-fieldset', $values);
            $authResult = $this->loginService->authenticate($data);

            $resultArray['data'] = array(
                'userId' => $user->getUserId(),
                'firstName' => $user->getFirstName());
            echo json_encode($resultArray);
            exit();
        } else {
            $resultArray['data'] = array(
                'error' => 'There was an error creating your account');
            echo json_encode($resultArray);
            exit();
        }
    }

    protected function productReview()
    {
        if ($this->identity()) {
            $identity = $this->identity();
        } else {
            $identity = $this->userService->getUser(6);
        }

        $review = $this->lundProductService->getProductReviewService()->create($identity, $this->getRequest()->getPost());

        if (null == $review) {
            $resultArray['data'] = array(
                'error' => 'There was an error submitting your review');
            echo json_encode($resultArray);
            exit();
        } else {
            $from = 'mailer@lundinternational.com';
            $subject = 'Product Review Pending';
            $to = array(/*'jason#rocketred.com',*/
                'jdrobik@lundinter.com'
                /*'info@lundinter.com'*/);
            $message = "<p>" . $review->getUser()->getFirstName() . " has submitted a product review.</p>
                <p>Please log into the PIMS administration control panel to review and approve this submission.</p>
                <p>
                    Product: " . $review->getProductLines()->getDisplayName() . "<br>
                    Reviewer: " . $review->getUser()->getFirstName() . " " . $review->getUser()->getLastName() . "<br>
                    Rating: " . $review->getRating() . "<br>
                    Review: " . $review->getReview() . "<br>
                    Submission Date: " . $review->getCreatedAt()->format('m/d/Y H:i:s') . "<br>
                </p>
            ";
                
            $this->sendEmail($from, $to, $subject, $message);

            $resultArray['data'] = array(
                'success' => true);
            echo json_encode($resultArray);
            exit();
        }
    }

    protected function vehicleSelector()
    {
        $vehCollectionService = $this->lundProductService->getVehCollectionService();

        $module = $this->params()->fromPost('module');
        $year   = $this->params()->fromPost('vehYear');
        $make   = $this->params()->fromPost('vehMake');
        $model  = $this->params()->fromPost('vehModel');
        $brand  = $this->params()->fromPost('brand');

        if ($module == 'getMake') {
            $records = $vehCollectionService->getVehMake($year);
        } elseif ($module == 'getModel') {
            $records = $vehCollectionService->getVehModel($year, $make);
        } elseif ($module == 'getSubmodel') {
            $records = $vehCollectionService->getVehSubmodel($year, $make, $model);
        } else {
	    $records = null;
	}

        if (null != $records) {
            $recordArray = array();
            $resultArray = array();

            foreach ($records as $record) {
                if ($module == 'getMake') {
                    $resultArray[] = $record->getVehMake()->getName();
                } elseif ($module == 'getModel') {
                    $resultArray[] = $record->getVehModel()->getName();
                } elseif ($module == 'getSubmodel') {
                    if ($record->getVehSubmodel()) {
                        $resultArray[] = $record->getVehSubmodel()->getName();
                    }
                }
            }

            $results = array_unique($resultArray);
            asort($results);

            foreach ($results as $key => $value) {
                $recordArray['data'][] = array('name' => $value);
            }

            echo json_encode($recordArray);
            exit();
        }
        exit();
    }

    protected function index(SiteInterface $site, ViewModel $vm)
    {
        $vehCollectionService = $this->lundProductService->getVehCollectionService();

        $years = $vehCollectionService->getVehYears();

        $vm->setVariable('years', $years);

        return $vm;
    }

    protected function userPortal(ViewModel $vm, $slugtwo = null)
    {
        if (!$this->identity()) {
            return $this->redirect()->toUrl('/login');
        } else {
            $role = $this->identity()->getRole()->getRoleName();
            if ($role != 'user') {
                return $this->redirect()->toUrl('/login');
            }
        }

        $userId = $this->identity()->getUserId();
        $user = $this->userService->getUser($userId);

        $this->orderService = $this->rocketEcomService->getOrderService();
        $orders = $this->orderService->getOrdersByUser($user);

        $this->orderItemService = $this->rocketEcomService->getOrderItemService();

        $this->partService = $this->lundProductService->getPartService();

        $vm->setVariable('user', $user);
        $vm->setVariable('orders', $orders);
        $vm->setVariable('orderItemService', $this->orderItemService);
        $vm->setVariable('partService', $this->partService);

        return $vm;
    }

    protected function portal(ViewModel $vm, $slugtwo = null)
    {
        if (!$this->identity()) {
            return $this->redirect()->toUrl('/login');
        } else {
            $role = $this->identity()->getRole()->getRoleName();
            if ($role != 'customer') {
                return $this->redirect()->toUrl('/login');
            }
        }

        $userId = $this->identity()->getUserId();
        $customer = $this->customerService->findCustomerByUserId($userId);

        if (null == $slugtwo) {

            $changesetsService = $this->lundProductService->getChangesetsService();
            $changesets = $changesetsService->getChangesetByFrequency($customer->getFrequency());

            $uri = $this->getRequest()->getUri();
            $base = sprintf('%s://%s', $uri->getScheme(), $uri->getHost());
            $this->viewHelperManager->get('HeadScript')
                ->offsetSetFile(200, $base . '/assets/rocket-admin/js/plugins/elfinder/jquery.elfinder.js')
                ->appendFile($base . '/assets/rocket-admin/js/plugins/uploader/plupload.js')
                ->appendFile($base . '/assets/rocket-admin/js/plugins/uploader/plupload.html4.js')
                ->appendFile($base . '/assets/rocket-admin/js/plugins/uploader/plupload.html5.js')
                ->appendFile($base . '/assets/rocket-admin/js/plugins/uploader/jquery.plupload.queue.js');
            $this->viewHelperManager->get('HeadLink')
                ->appendStylesheet($base . '/assets/rocket-admin/css/adm.elfinder.css')
                ->appendStylesheet($base . '/assets/rocket-admin/css/adm.elfinder.theme.css');

            $vm->setVariable('customer', $customer);
            $vm->setVariable('changesets', $changesets);
            $vm->setVariable('fileLogService', $this->fileLogService);
            $vm->setVariable('asset', $this->assetService);

            return $vm;
        } else if ($slugtwo == 'connector') {
            $isPost  = false;
            $request = null;

            if ($this->request->isPost()) {
                $isPost  = true;
                $request = $this->request->getPost();
            } elseif ($this->request->isGet()) {
                $request = $this->request->getQuery();
            }

            $cmd = ($request['cmd'] ? $request['cmd'] : null);

            $this->customerService->run($request['cmd'], $customer, $request, $isPost);
        }
    }

    protected function checkout(SiteInterface $site, ViewModel $vm, $action = null, $id = null)
    {
        $this->cartService           = $this->rocketEcomService->getCartService();
        $this->cartItemService       = $this->rocketEcomService->getCartItemService();
        $this->orderService          = $this->rocketEcomService->getOrderService();
        $this->orderItemService      = $this->rocketEcomService->getOrderItemService();
        $this->orderAddressService   = $this->rocketEcomService->getOrderAddressService();
        $this->shippingMethodService = $this->rocketEcomService->getShippingMethodService();
        $this->partService           = $this->lundProductService->getPartService();

        $systemUser = $this->userService->getUser(6);

        $cart = $this->cartService->getCartBySessionId($this->sessionEC->getManager()->getId());

        if (null == $cart) {
            return $this->redirect()->toUrl('/cart');
        }

        $vm->setVariable('cart', $cart);

        if (null == $this->sessionEC->orderId) {
            $cartItems = $this->cartItemService->getCartItemsByCart($cart);
            $total = '0.00';

            foreach ($cartItems as $item) {
                $subtotal = $item->getQuantity()*$item->getPrice();
                $total+=$subtotal;
            }

            $data = array(
                'user_id'       => $systemUser->getUserId(),
                'subtotal'      => $total,
                'total'         => $total,
            );
            $order = $this->orderService->createOrder($systemUser, $data);

            foreach ($cartItems as $item) {
                $data = array(
                    'product_id'  => $item->getProductId(),
                    'quantity'    => $item->getQuantity(),
                    'description' => $item->getDescription(),
                    'price'       => $item->getPrice(),
                    'weight'      => $item->getWEight(),
                    'length'      => $item->getLength(),
                    'height'      => $item->getHeight(),
                    'width'       => $item->getWidth(),
                    'upc_code'    => $item->getUpcCode()
                );
                $orderItem = $this->orderItemService->createOrderItem($systemUser, $order, $data);
            }

            $this->sessionEC->orderId = $order->getOrderId();
            $vm->setVariable('order', $order);
        } else {
            $order = $this->orderService->getOrder($this->sessionEC->orderId);
            $vm->setVariable('order', $order);
        }

        switch ($action) {
            case 'shipping':
                if ($this->request->isPost()) {
                    $billingAddress = $this->orderAddressService->create($systemUser, $order, $this->request->getPost());

                    if ($billingAddress instanceof \RocketEcom\Entity\OrderAddressInterface) {
                        $order = $this->orderService->associateAddress($systemUser, $order, $billingAddress, 'billing');
                        $vm->setVariable('order', $order);

                        $form = $this->orderAddressService->getCreateOrderAddressForm();
                        $vm->setVariable('form', $form);
                        $vm->setVariable('step', 'shipping');
                    } else {
                        $form = $this->orderAddressService->getCreateOrderAddressForm();
                        $form->setData($this->request->getPost());
                        $vm->setVariable('form', $form);
                        $vm->setVariable('step', 'billing');
                    }
                } else {
                    $form = $this->orderAddressService->getCreateOrderAddressForm();

                    if ($order->getShippingAddress()) {
                        $form->bind($order->getShippingAddress());
                    }
                    $vm->setVariable('form', $form);
                    $vm->setVariable('step', 'shipping');
                }
                break;
            case 'payment':
                if ($this->request->isPost()) {
                    $shippingAddress = $this->orderAddressService->create($systemUser, $order, $this->request->getPost());

                    if ($shippingAddress instanceof \RocketEcom\Entity\OrderAddressInterface) {
                        $order = $this->orderService->associateAddress($systemUser, $order, $shippingAddress, 'shipping');
                        $vm->setVariable('order', $order);

                        $form = $this->orderService->getCreateOrderForm();
                        $vm->setVariable('form', $form);
                        $vm->setVariable('step', 'payment');
                    } else {
                        $form = $this->orderAddressService->getCreateOrderAddressForm();
                        $form->setData($this->request->getPost());
                        $vm->setVariable('form', $form);
                        $vm->setVariable('step', 'shipping');
                    }
                } else {
                    $form = $this->orderService->getCreateOrderForm();
                    $form->bind($order);
                    $vm->setVariable('form', $form);
                    $vm->setVariable('step', 'payment');
                }
                break;
            case 'confirmation':
                if ($this->request->isPost()) {
                    $order = $this->orderService->edit($systemUser, $this->request->getPost(), $order);

                    if ($order instanceof \RocketEcom\Entity\OrdersInterface) {
                        $orderItems = $this->orderItemService->getOrderItemsByOrder($order);

                        $combinedWeight = null;
                        foreach ($orderItems as $item) {
                            $combinedWeight+=$item->getWeight();
                        }

                        $length = '2';
                        $width = '1';
                        $height = '1';

                        $shippingCost = $this->orderService->getUpsRate(
                            'DC43055E631A8DAC',
                            '34A921',
                            $order->getShippingMethod()->getShortCode(),
                            $combinedWeight,
                            $length,
                            $width,
                            $height,
                            '30518',
                            $order->getShippingAddress()->getPostCode());

                        if ($shippingCost) {
                            $order = $this->orderService->editShippingCost($order, $shippingCost);
                        }

                        $vm->setVariable('order', $order);
                        $vm->setVariable('orderItemService', $this->orderItemService);
                        $vm->setVariable('step', 'confirmation');
                    } else {
                        $form = $this->orderService->getCreateOrderForm();
                        $form->setData($this->request->getPost());
                        $vm->setVariable('form', $form);
                        $vm->setVariable('step', 'payment');
                    }
                } else {
                    $vm->setVariable('orderItemService', $this->orderItemService);
                    $vm->setVariable('step', 'confirmation');
                }
                break;
            case 'process':
                if ($order->getTransactionId() == null) {
                    $transaction = null;
                    $transactionId = null;

                    $sageUrl = 'https://www.sagepayments.net/cgi-bin/eftBankcard.dll?transaction';
                    $data = 'm_id=801750196732';
                    $data .= '&m_key=B8M7D7U7D7M6';
                    $data .= '&T_amt=' . urlencode($order->getTotal());
                    $data .= '&T_tax=' . urlencode($order->getTaxCost());
                    $data .= '&C_name=' . urlencode($order->getCardName());
                    $data .= '&C_address=' . urlencode($order->getBillingAddress()->getStreetAddress());
                    $data .= '&C_state=' . urlencode($order->getBillingAddress()->getRegion()->getSubdivisionName());
                    $data .= '&C_city=' . urlencode($order->getBillingAddress()->getLocality());
                    $data .= '&C_zip=' . urlencode($order->getBillingAddress()->getPostCode());
                    $data .= '&C_cardnumber=' . urlencode($order->getCardNumber());
                    $data .= '&C_cvv=' . urlencode($order->getCardCvv());
                    $data .= '&C_exp=' . urlencode($order->getCardExpMonth() . '/' . $order->getCardExpYear());
                    $data .= '&C_email=' . urlencode($order->getEmailAddress());
                    $data .= '&T_ordernum=' . urlencode($order->getOrderId());
                    $data .= '&T_code=01';

                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_URL, $sageUrl);
                    curl_setopt($ch, CURLOPT_POST, 1);
                    curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                    $result = curl_exec($ch);
                    curl_close($ch);
                    if ($result[1] == 'A') {
                        $transaction = 'success';
                        $transactionId = substr($result, 46, 10);
                    } else {
                        $transaction = 'error';
                    }
                    // TODO: Activate SAGE gateway above
                    //$transaction = 'success';
                    //$transactionId = '12345678';

                    if ($transaction == 'success') {
                        $scrubCC = str_repeat("X", strlen($order->getCardNumber()) - 4) . substr($order->getCardNumber(), -4);
                        $order = $this->orderService->scrubOrder($order, $scrubCC, $transactionId);

                        $orderItems = $this->orderItemService->getOrderItemsByOrder($order);
                        $orderItemLoop = '';
                        foreach ($orderItems as $item) {
                            $orderItemLoop .= $item->getDescription() . " (" . $item->getQuantity() . " qty) - $" . $item->getPrice() . " each<br>";
                        }

                        $from = 'mailer@lundinternational.com';
                        $to = array($order->getEmailAddress());
                        $subject = 'Lund International - Order Confirmation';
                        $message = "<p>Hello, " . $order->getBillingAddress()->getFirstName() . "!</p>
                        <p>Thank you for your order!</p>
                        <p>
                        <strong>Order Details</strong><br>
                        " . $orderItemLoop . "
                        Order Subtotal: $" . $order->getSubTotal() . "<br>
                        Tax Cost: $" . $order->getTaxCost() . "<br>
                        Shipping Cost: $" . $order->getShippingCost() . "<br>
                        Order Total: $" . $order->getTotal() . "<br>
                        </p>
                        <p>
                        <strong>Billing Address</strong><br>
                        First Name: " . $order->getBillingAddress()->getFirstName() . "<br>
                        Last Name: " . $order->getBillingAddress()->getLastName() . "<br>
                        Street Address: " . $order->getBillingAddress()->getStreetAddress() . "<br>
                        Extended Street Address: " . $order->getBillingAddress()->getExtStreetAddress() . "<br>
                        City: " . $order->getBillingAddress()->getLocality() . "<br>
                        State: " . $order->getBillingAddress()->getRegion()->getSubdivisionName() . "<br>
                        Post Code: " . $order->getBillingAddress()->getPostCode() . "<br>
                        Country: " . $order->getBillingAddress()->getCountry()->getName() . "<br>
                        Phone Number: " . $order->getBillingAddress()->getPhoneNumber() . "<br>
                        </p>
                        <p>
                        <strong>Shipping Address</strong><br>
                        First Name: " . $order->getShippingAddress()->getFirstName() . "<br>
                        Last Name: " . $order->getShippingAddress()->getLastName() . "<br>
                        Street Address: " . $order->getShippingAddress()->getStreetAddress() . "<br>
                        Extended Street Address: " . $order->getShippingAddress()->getExtStreetAddress() . "<br>
                        City: " . $order->getShippingAddress()->getLocality() . "<br>
                        State: " . $order->getShippingAddress()->getRegion()->getSubdivisionName() . "<br>
                        Post Code: " . $order->getShippingAddress()->getPostCode() . "<br>
                        Country: " . $order->getShippingAddress()->getCountry()->getName() . "<br>
                        Phone Number: " . $order->getShippingAddress()->getPhoneNumber() . "<br>
                        </p>
                        <p>
                        <strong>Shipping Method</strong><br>
                        " . $order->getShippingMethod()->getLabel() . "<br>
                        </p>";

                        $this->sendEmail($from, $to, $subject, $message);

                        $to = array(/*'jason@rocketred.com',*/
                            'jdrobik@lundinter.com');

                        $this->sendEmail($from, $to, $subject, $message);

                        $stateAbbr = preg_replace('/US-/', '', $order->getShippingAddress()->getRegion()->getSubdivisionCode());
                        /* EDI BATCH */
                        $xml = '<POHeaders>
                            <POHeader poNumber="' . $order->getOrderId() . '" poEntryDate="' . $order->getCreatedAt()->format('Ymd') . '" CurrencyCode="USD" freightCharges="0.00" handlingCharges="0.00" otherCharges="0.00" totalPOValue="' . $order->getTotal() . '" customerNumber="0" storeNumber="0" carrierCode="">
                                <ShipTo name="' . $order->getShippingAddress()->getFirstName() . ' ' . $order->getShippingAddress()->getLastName() . '" address1="' . $order->getShippingAddress()->getStreetAddress() . '" address2="' . $order->getShippingAddress()->getExtStreetAddress() . '" city="' . $order->getShippingAddress()->getLocality() . '" stateCode="' . $stateAbbr . '" stateName="' . $order->getShippingAddress()->getRegion()->getSubdivisionName() . '" postalCode="' . $order->getShippingAddress()->getPostCode() . '" countryCode="' . $order->getShippingAddress()->getCountry()->getCodeChar2() . '" telephone="' . $order->getShippingAddress()->getPhoneNumber() . '" email="' . $order->getEmailAddress() . '" attention="" />
                                <PODetails>';

                        foreach ($orderItems as $item) {
                            $part = $this->lundProductService->getPartService()->getPart($item->getProductId());
                            $xml .= '<PODetail poLineNumber="0" ItemCode="' . $part->getPartNumber() . '" UnitPrice="' . $item->getPrice() . '" LineQuantity="' . $item->getQuantity() . '" UOM="EA" LineExtendedPrice="' . ($item->getPrice()*$item->getQuantity()) . '" ItemDescription="' . $item->getDescription() . '" cancelAfterDate="" itemDueDate="" carrierDescription="">
                                        <POLineNotes />
                                    </PODetail>';
                        }

                        $xml .= '</PODetails>
                            </POHeader>
                            </POHeaders>';

                        $fileName = 'ORDER_' . $order->getOrderId() . '_' . date('YmdHis') . '.xml';
                        $file = fopen(realpath(__DIR__ . '/../../../../../data/orders') .'/'. $fileName, 'w');
                        fwrite($file, '<?xml version="1.0" ?><Message source="lundinternational.com">');
                        fwrite($file,$xml.'</Message>');
                        fclose($file);

                        $this->cartService->disableCart($cart);
                        $this->sessionEC->getManager()->getStorage()->clear('saved_cart');
                        unset($_SESSION['saved_cart']);

                        $vm->setVariable('step', 'process');
                    } elseif ($transaction == 'error') {
                        $vm->setVariable('error', 'There was a problem placing your order.');
                        $vm->setVariable('step', 'billing');
                    }
                }
                break;
            default:
                $form = $this->orderAddressService->getCreateOrderAddressForm();

                if ($order->getBillingAddress()) {
                    $form->bind($order->getBillingAddress());
                }

                $vm->setVariable('form', $form);
                $vm->setVariable('step', 'billing');
        }

        return $vm;
    }

    protected function cart(SiteInterface $site, ViewModel $vm, $action = null, $id = null)
    {
        $this->cartService           = $this->rocketEcomService->getCartService();
        $this->cartItemService       = $this->rocketEcomService->getCartItemService();
        $this->partService           = $this->lundProductService->getPartService();

        $systemUser = $this->userService->getUser(6);

        $cart = $this->cartService->getCartBySessionId($this->sessionEC->getManager()->getId());

        if (null == $cart) {
            $data = array(
                'user_id'    => $systemUser->getUserId(),
                'session_id' => $this->sessionEC->getManager()->getId());
            $cart = $this->cartService->create($systemUser, $data);
            $this->sessionEC->cartId = $cart->getCartId();
        }

        switch ($action) {
            case 'add':
                $part = $this->partService->getPart($id);

                $cartItem = $this->cartItemService->getCartItemByProductId($cart, $id);

                if (null == $cartItem) {
                    $data = array(
                        'product_id' => $part->getPartId(),
                        'quantity' => '1',
                        'description' => $part->getProductLine()->getDisplayName() . ' (Part# ' . $part->getPartNumber() . ')',
                        'price' => $part->getMsrpPrice(),
                        'weight' => $part->getWeight(),
                        'height' => $part->getHeight(),
                        'width' => $part->getWidth(),
                        'length' => $part->getLength(),
                        'upc_code' => $part->getUpcCode(),
                    );
                    $cartItem = $this->cartItemService->create($systemUser, $cart, $data);
                } else {
                    $cartItem = $this->cartItemService->incrementQuantity($systemUser, $cartItem, $cartItem->getQuantity());
                }
                break;
            case 'remove':
                $cartItem = $this->cartItemService->getCartItem($cart, $id);
                if (null != $cartItem) {
                    $this->cartItemService->delete($systemUser, $cartItem);
                    $vm->setVariable('message', $cartItem->getDescription() . ' has been removed from your cart.');
                }
                break;
            case 'reduce':
                $cartItem = $this->cartItemService->getCartItem($cart, $id);
                if (null != $cartItem) {
                    $this->cartItemService->decrementQuantity($systemUser, $cartItem, $cartItem->getQuantity());
                }
                break;
            case 'increase':
                $cartItem = $this->cartItemService->getCartItem($cart, $id);
                if (null != $cartItem) {
                    $this->cartItemService->incrementQuantity($systemUser, $cartItem, $cartItem->getQuantity());
                }
                break;
        }

        $vm->setVariable('cartItems', $this->cartItemService->getCartItemsByCart($cart));
        $vm->setVariable('cart', $cart);

        return $vm;
    }

    protected function products(SiteInterface $site, ViewModel $vm, $brand = null, $category = null, $line = null)
    {
        $this->brandsService               = $this->lundProductService->getBrandsService();
        $this->productCategoryService      = $this->lundProductService->getProductCategoryService();
        $this->brandProductCategoryService = $this->lundProductService->getBrandProductCategoryService();
        $this->productLineService          = $this->lundProductService->getProductLineService();
        $this->productLineAssetService     = $this->lundProductService->getProductLineAssetService();
        $this->productLineFeatureService   = $this->lundProductService->getProductLineFeatureService();
        $this->partService                 = $this->lundProductService->getPartService();
        $this->partAssetService            = $this->lundProductService->getPartAssetService();
        $this->vehCollectionService        = $this->lundProductService->getVehCollectionService();
        $this->productReviewService        = $this->lundProductService->getProductReviewService();

        $years = $this->vehCollectionService->getVehYears();
        $vm->setVariable('years', $years);

        $this->sessionSV->filter = ($this->sessionSV->filter ? $this->sessionSV->filter : null);
        $filtervehicle = $this->params()->fromPost('filterstatus',null);
        $this->sessionSV->filter = ($filtervehicle ? $filtervehicle : $this->sessionSV->filter);
        $vm->setVariable('filtervehicle', $this->sessionSV->filter);

        if (null != $this->sessionSV->vehicle) {
            $vm->setVariable('vehicle', $this->sessionSV->vehicle);
        }

        $queryType = $this->params()->fromPost('querytype',null);

        $selector    = null;
        $search      = null;
        $searchQuery = null;
        $globalQuery = null;

        if (null != $queryType) {
            if ($queryType == 'global') {
                $searchQuery = $this->params()->fromPost('searchquery',null);
		$vm->setVariable('tracksearch', $searchQuery);

                $part = $this->partService->getPartByPartNumber($searchQuery);

                if (null != $part) {
                    $search   = null;
                    $brand    = $part->getProductLine()->getBrand()->getName();
                    $category = $part->getProductLine()->getProductCategory()->getName();
                    $line     = $part->getProductLine()->getName();
                    $globalQuery = $part;
                } else {
                    $search = true;
                }

                $vm->setVariable('searchquery', $searchQuery);
            } elseif ($queryType == 'vehicle') {
                if (null != $filtervehicle) {
                    $selYear     = $this->params()->fromPost('vehYear',null);
                    $selMake     = $this->params()->fromPost('vehMake',null);
                    $selModel    = $this->params()->fromPost('vehModel',null);
                    $selSubmodel = $this->params()->fromPost('vehSubmodel',null);
                    $selBrand    = $this->params()->fromPost('brand',null);

                    $collections = $this->vehCollectionService->getVehCollSelector($selYear, $selMake, $selModel, $selSubmodel);

                    if (null != $collections) {
                        $this->sessionSV->vehicle = $collections;
                        $this->sessionSV->filter  = 'yes';

                        if ($selBrand == 'All' || null == $selBrand) {
                            $selector = true;
                        } else {
                            $selector = null;
                            $brand = ($brand ? $brand : $selBrand);
                        }

                        $vm->setVariable('selYear', $selYear);
                        $vm->setVariable('selMake', $selMake);
                        $vm->setVariable('selModel', $selModel);
                        $vm->setVariable('selSubmodel', $selSubmodel);
                        $vm->setVariable('selBrand', $brand);
                        $vm->setVariable('vehicle', $collections);
                    } else {
                        $vm->setVariable('selYear', $selYear);
                        $vm->setVariable('selMake', $selMake);
                        $vm->setVariable('selModel', $selModel);
                        $vm->setVariable('selSubmodel', $selSubmodel);
                        $vm->setVariable('selBrand', $brand);
                        $vm->setVariable('noVehFound', true);
                    }
                } else {
                    $selBrand = $this->params()->fromPost('brand',null);
                    if (null != $selBrand) {
                        $brand = $selBrand;
                    }
                }
            } else {
                $selBrand = $this->params()->fromPost('brand',null);
                if (null != $selBrand) {
                    $brand = $selBrand;
                }
            }

            $vm->setVariable('querytype', $queryType);
        }

        if (null != $selector) {
            $vm = $this->loadSelectorPage($vm);
        } elseif (null != $search) {
            $vm = $this->loadSearchPage($vm, $searchQuery);
        } elseif (null == $brand) {
            $vm = $this->loadProductsPage($vm);
        } elseif (null != $brand && null == $category) {
            $vm = $this->loadBrandPage($vm, $brand);
        } elseif (null != $brand && null != $category && null == $line) {
            $vm = $this->loadCategoryPage($vm, $brand, $category);
        } elseif (null != $brand && null != $category && null != $line) {
            $vm = $this->loadLinePage($vm, $brand, $category, $line, $globalQuery);
        }

        return $vm;
    }

    protected function loadProductsPage(ViewModel $vm)
    {
        $vm->setVariable('loadInclude', 'products.phtml');

        $this->layout()->setVariables(array(
            'metaTitle'       => 'Lund International',
            'metaKeywords'    => 'Need Keywords',
            'metaDescription' => 'Need Description',
        ));

        return $vm;
    }

    protected function loadSearchPage(ViewModel $vm, $searchQuery = null)
    {
        $productLines = $this->productLineService->getProductLineByQuery($searchQuery);

        if (null != $productLines) {
            $vm->setVariable('productLines', $productLines);

            $productLinesArray = array();

            foreach ($productLines as $productLine) {
                $productLinesArray[] = $productLine->getName();
            }

            if ($this->sessionSV->vehicle && $this->sessionSV->filter == 'yes') {
                $parts = $this->lundProductService->getPartVehicleCollectionsByVehColl($this->sessionSV->vehicle);

                $productLineArray = array();
                $uniqueLines = array();

                foreach ($parts as $part) {
                    if (in_array($part->getPart()->getProductLine()->getName(), $productLinesArray)) {
                        if (!in_array($part->getPart()->getProductLine()->getName(), $uniqueLines)) {
                            if (!$part->getPart()->getProductLine()->getDisabled() && !$part->getPart()->getProductLine()->getBrand()->getDisabled()) {
                                $uniqueLines[] = $part->getPart()->getProductLine()->getName();
                                $productLineArray[] = $part->getPart()->getProductLine();
                            }
                        }
                    }
                }

                $uniParts = $this->partService->getUniversalParts();

                if (null != $uniParts) {
                    foreach ($uniParts as $part) {
                        if (in_array($part->getProductLine()->getName(), $productLinesArray)) {
                            if (!in_array($part->getProductLine()->getName(), $uniqueLines)) {
                                if (!$part->getProductLine()->getDisabled() && !$part->getProductLine()->getBrand()->getDisabled()) {
                                    $uniqueLines[] = $part->getProductLine()->getName();
                                    $productLineArray[] = $part->getProductLine();
                                }
                            }
                        }
                    }
                }

                if (count($productLineArray) > 0) {
                    $vm->setVariable('productLines', $productLineArray);
                }
            }
        }

	$vm->setVariable('tracksearch', $searchQuery);
        $vm->setVariable('productLineAssetService', $this->productLineAssetService);
        $vm->setVariable('productReviewService', $this->productReviewService);
        $vm->setVariable('loadInclude', 'product-search.phtml');

        return $vm;
    }

    protected function loadSelectorPage(ViewModel $vm)
    {
        $parts = $this->lundProductService->getPartVehicleCollectionsByVehColl($this->sessionSV->vehicle);

        $productLines = array();
        $uniqueLines  = array();

        foreach ($parts as $part) {
            if (!in_array($part->getPart()->getProductLine()->getName(), $uniqueLines)) {
                if (!$part->getPart()->getProductLine()->getDisabled() && !$part->getPart()->getProductLine()->getBrand()->getDisabled()) {
                    $uniqueLines[] = $part->getPart()->getProductLine()->getName();
                    $productLines[] = $part->getPart()->getProductLine();
                }
            }
        }

        $uniParts = $this->partService->getUniversalParts();

        if (null != $uniParts) {
            foreach ($uniParts as $part) {
                if (!in_array($part->getProductLine()->getName(), $uniqueLines)) {
                    if (!$part->getProductLine()->getDisabled() && !$part->getProductLine()->getBrand()->getDisabled()) {
                        $uniqueLines[] = $part->getProductLine()->getName();
                        $productLines[] = $part->getProductLine();
                    }
                }
            }
        }

        $vm->setVariable('productLines', $productLines);
        $vm->setVariable('productLineAssetService', $this->productLineAssetService);
        $vm->setVariable('productReviewService', $this->productReviewService);
        $vm->setVariable('loadInclude', 'product-selector.phtml');

        return $vm;
    }

    protected function loadBrandPage(ViewModel $vm, $brand = null)
    {
        $brand        = $this->brandsService->getBrandByName($brand);
        $productLines = $this->productLineService->getProductLinesByBrand($brand);

        $vm->setVariable('productLines', $productLines);

        if ($this->sessionSV->vehicle && $this->sessionSV->filter == 'yes') {
            $parts = $this->lundProductService->getPartVehicleCollectionsByVehColl($this->sessionSV->vehicle);

            $productLineArray = array();
            $uniqueLines = array();

            foreach ($parts as $part) {
                if ($part->getPart()->getProductLine()->getBrand()->getBrandId() == $brand->getBrandId()) {
                    if (!in_array($part->getPart()->getProductLine()->getName(), $uniqueLines)) {
                        if (!$part->getPart()->getProductLine()->getDisabled() && !$part->getPart()->getProductLine()->getBrand()->getDisabled()) {
                            $uniqueLines[] = $part->getPart()->getProductLine()->getName();
                            $productLineArray[] = $part->getPart()->getProductLine();
                        }
                    }
                }
            }

            $uniParts = $this->partService->getUniversalParts();

            if (null != $uniParts) {
                foreach ($uniParts as $part) {
                    if ($part->getProductLine()->getBrand()->getBrandId() == $brand->getBrandId()) {
                        if (!in_array($part->getProductLine()->getName(), $uniqueLines)) {
                            if (!$part->getProductLine()->getDisabled() && !$part->getProductLine()->getBrand()->getDisabled()) {
                                $uniqueLines[] = $part->getProductLine()->getName();
                                $productLineArray[] = $part->getProductLine();
                            }
                        }
                    }
                }
            }

            $vm->setVariable('productLines', $productLineArray);
        }

        $vm->setVariable('brand', $brand);
        $vm->setVariable('selBrand', $brand->getName());
        $vm->setVariable('productLineAssetService', $this->productLineAssetService);
        $vm->setVariable('productReviewService', $this->productReviewService);
        $vm->setVariable('loadInclude', 'brand.phtml');

        $this->layout()->setVariables(array(
            'metaTitle'       => 'Lund International | ' . $brand->getName(),
            'metaKeywords'    => 'Need Keywords',
            'metaDescription' => 'Need Description',
        ));

        return $vm;
    }

    protected function loadCategoryPage(ViewModel $vm, $brand = null, $category = null)
    {
        $brand           = $this->brandsService->getBrandByName($brand);
        $productCategory = $this->productCategoryService->getProductCategoryByName($category);
        $productLines    = $this->productLineService->getProductLinesByCategory($productCategory, $brand);

        $vm->setVariable('productLines', $productLines);

        if ($this->sessionSV->vehicle && $this->sessionSV->filter == 'yes') {
            $parts = $this->lundProductService->getPartVehicleCollectionsByVehColl($this->sessionSV->vehicle);

            $productLineArray = array();
            $uniqueLines = array();

            foreach ($parts as $part) {
                if ($part->getPart()->getProductLine()->getProductCategory()->getProductCategoryId() == $productCategory->getProductCategoryId() && $part->getPart()->getProductLine()->getBrand()->getBrandId() == $brand->getBrandId()) {
                    if (!in_array($part->getPart()->getProductLine()->getName(), $uniqueLines)) {
                        if (!$part->getPart()->getProductLine()->getDisabled() && !$part->getPart()->getProductLine()->getBrand()->getDisabled()) {
                            $uniqueLines[] = $part->getPart()->getProductLine()->getName();
                            $productLineArray[] = $part->getPart()->getProductLine();
                        }
                    }
                }
            }

            $uniParts = $this->partService->getUniversalParts();

            if (null != $uniParts) {
                foreach ($uniParts as $part) {
                    if ($part->getProductLine()->getProductCategory()->getProductCategoryId() == $productCategory->getProductCategoryId() && $part->getProductLine()->getBrand()->getBrandId() == $brand->getBrandId()) {
                        if (!in_array($part->getProductLine()->getName(), $uniqueLines)) {
                            if (!$part->getProductLine()->getDisabled() && !$part->getProductLine()->getBrand()->getDisabled()) {
                                $uniqueLines[] = $part->getProductLine()->getName();
                                $productLineArray[] = $part->getProductLine();
                            }
                        }
                    }
                }
            }

            $vm->setVariable('productLines', $productLineArray);
        }

        $vm->setVariable('productCategory', $productCategory);
        $vm->setVariable('productLineAssetService', $this->productLineAssetService);
        $vm->setVariable('productReviewService', $this->productReviewService);
        $vm->setVariable('loadInclude', 'product-category.phtml');

        $brandProductCategory = $this->brandProductCategoryService->getCategoryByBrandAndCategory($brand, $productCategory);

        $vm->setVariable('brandProductCategory', $brandProductCategory);

	if (null != $brandProductCategory) {
        $this->layout()->setVariables(array(
            'metaTitle'       => $brandProductCategory->getMetaTitle(),
            'metaKeywords'    => $brandProductCategory->getMetaKeywords(),
            'metaDescription' => $brandProductCategory->getMetaDescr(),
        ));
	} else {
	$this->layout()->setVariables(array(
		'metaTitle' => 'Lund International',
		'metaKeywords' => 'Lund International',
		'metaDescription' => 'Lund International',
	));
	}

        return $vm;
    }

    protected function loadLinePage(ViewModel $vm, $brand = null, $category = null, $line = null, $globalQuery = null)
    {
        $productLine         = $this->productLineService->getProductLineByName($line);
        $productLineAssets   = $this->productLineAssetService->getProductLineAssetsByProductLine($productLine);
        $productLineFeatures = $this->productLineFeatureService->getProductLineFeaturesByProductLine($productLine);
        $productReviews      = $this->productReviewService->getProductReviewsByProductLine($productLine);
        $parts               = $this->partService->getPartsByProductLine($productLine);

        $vm->setVariable('parts', $parts);

        if ($globalQuery) {
            $vehicles = $this->lundProductService->getPartVehicleCollectionsByPart($globalQuery->getPartId());

            $vehicleArray = array();

            foreach ($vehicles as $vehicle) {
                $thisHash = (STRING)(($vehicle->getVehCollection()->getVehMake()) ? $vehicle->getVehCollection()->getVehMake()->getVehMakeId() : '') .
                    (($vehicle->getVehCollection()->getVehModel()) ? '-' . $vehicle->getVehCollection()->getVehModel()->getVehModelId() : '') .
                    (($vehicle->getVehCollection()->getVehSubmodel()) ? '-' . $vehicle->getVehCollection()->getVehSubmodel()->getVehSubmodelId() : '');

                $vehicleArray[$thisHash]['subdetail'] = $vehicle->getSubdetail();
                $vehicleArray[$thisHash]['years'][]    = $vehicle->getVehCollection()->getVehYear()->getName();
                $vehicleArray[$thisHash]['make']       = $vehicle->getVehCollection()->getVehMake()->getName();
                if ($vehicle->getVehCollection()->getVehModel()) {
                    $vehicleArray[$thisHash]['model'] = $vehicle->getVehCollection()->getVehModel()->getName();
                }
                if ($vehicle->getVehCollection()->getVehSubmodel()) {
                    $vehicleArray[$thisHash]['submodel'] = $vehicle->getVehCollection()->getVehSubmodel()->getName();
                }

                foreach ($vehicleArray as $veh) {
                    $years = [];
                    foreach ($veh['years'] as $year) {
                        $years[] = $year;
                    }
                    $fromYear = min($years);
                    $toYear = max($years);
                }

                $vehicleArray[$thisHash]['fromYear'] = $fromYear;
                $vehicleArray[$thisHash]['toYear'] = $toYear;
            }

            $vm->setVariable('vehicles', $vehicleArray);
            $vm->setVariable('queryPart', $globalQuery);
            $vm->setVariable('globalQuery', true);
        } else {
            if ($this->sessionSV->vehicle && $this->sessionSV->filter == 'yes') {
                $fitParts = $this->lundProductService->getPartVehicleCollectionsByVehColl($this->sessionSV->vehicle);
                $partArray = array();

                foreach ($fitParts as $fitPart) {
                    if ($fitPart->getPart()->getProductLine()->getProductLineId() == $productLine->getProductLineId()) {
                        $partArray[] = $fitPart;
                    }
                }

                $uniParts = $this->partService->getUniversalParts();

                if (null != $uniParts) {
                    foreach ($uniParts as $part) {
                        if ($part->getProductLine()->getProductLineId() == $productLine->getProductLineId()) {
                            if (strtolower($part->getProductLine()->getBrand()->getName()) == strtolower($brand)) {
                                if (!$part->getProductLine()->getDisabled() && !$part->getProductLine()->getBrand()->getDisabled()) {
                                    $partArray[] = $part;
                                }
                            }
                        }
                    }
                }

                $vm->setVariable('parts', $partArray);
            }
        }

        $universal = null;
        $uniParts = $this->partService->getUniversalParts();

        $partCount = count($parts);
        $uniPartCount = 0;

        if (null != $uniParts) {
            foreach ($uniParts as $part) {
                if ($part->getProductLine()->getProductLineId() == $productLine->getProductLineId()) {
                    $uniPartCount++;
                }
            }
        }

        if ($partCount == $uniPartCount) {
            $universal = true;
        }

        $vm->setVariable('universal', $universal);

        $vm->setVariable('productLine', $productLine);
        $vm->setVariable('productLineAssets', $productLineAssets);
        $vm->setVariable('productLineFeatures', $productLineFeatures);
        $vm->setVariable('productReviews', $productReviews);
        $vm->setVariable('loadInclude', 'product-line.phtml');

        $loginForm = $this->loginService->getLoginForm();
        $registerForm = $this->userService->getCreateUserForm();
        $reviewForm = $this->productReviewService->getCreateProductReviewForm();

        $vm->setVariable('loginForm', $loginForm);
        $vm->setVariable('registerForm', $registerForm);
        $vm->setVariable('reviewForm', $reviewForm);

        $this->layout()->setVariables(array(
            'metaTitle'       => $productLine->getMetaTitle(),
            'metaKeywords'    => $productLine->getMetaKeywords(),
            'metaDescription' => $productLine->getMetaDescr(),
        ));

        return $vm;
    }

    protected function news(SiteInterface $site, ViewModel $vm)
    {
        $news = $this->lundSiteService->getNewsReleaseService()->getActiveNewsReleasesBySite($site);

        $vm->setVariable('type', 'list');
        $vm->setVariable('news', $news);

        return $vm;
    }

    protected function onlineRetailer(SiteInterface $site, ViewModel $vm)
    {
        $retailers = $this->retailerService->getActiveOnlineRetailers();

        $vm->setVariable('retailers', $retailers);

        return $vm;
    }

    protected function retailer(SiteInterface $site, ViewModel $vm)
    {
        //$retailers = $this->retailerService->getActivePhysicalRetailers();
        //$vm->setVariable('retailers', $retailers);

        $postCode = $this->params()->fromPost('postCode',null);
        $radius   = $this->params()->fromPost('radius', '5');

        if ($this->request->isPost()) {
            $config['zoom'] = 11;
            if (null != $radius) {
                $distance = $radius;
                if ($distance == 20) {
                    $config['zoom'] = 10;
                }
            } else {
                $distance = 5;
            }

            $geo = $this->retailerService->getGeo($postCode);

            $config['lat'] = $geo['lat'];
            $config['lon'] = $geo['lon'];

            $zips = $this->retailerService->getZipsInRange($postCode, $distance, _ZIPS_SORT_BY_DISTANCE_ASC, true);

            if (is_array($zips)) {
                $zipstring = "'".implode("','",array_keys($zips))."'";
                $retailers = $this->retailerService->getZipRetailers($zipstring, $zips);

                $vm->setVariable('retailers', $retailers);
                $vm->setVariable('config', $config);
                $this->layout()->setVariable('retailers', $retailers);
            }

            $vm->setVariable('searchRetailer', true);
        }

        $this->layout()->setVariable('retailerSearch', true);
        $this->layout()->setVariable('rsPostCode', $postCode);
        $this->layout()->setVariable('rsRadius', $radius);

        $testimonials = $this->lundSiteService->getTestimonialService()->getActiveTestimonialsBySite($site);
        $vm->setVariable('testimonials', $testimonials);

        return $vm;
    }

    protected function newsDetail(SiteInterface $site, $url = null, ViewModel $vm)
    {
        $newsReleaseService = $this->lundSiteService->getNewsReleaseService();

        $news = $newsReleaseService->getNewsReleaseByUrl($site, $url);

        $vm->setVariable('type', 'detail');
        $vm->setVariable('news', $news);

        return $vm;
    }

    protected function productRegistration(SiteInterface $site, ViewModel $vm)
    {
        $productRegistrationService = $this->lundSiteService->getProductRegistrationService();

        $form = $productRegistrationService->getCreateProductRegistrationForm();

        if ($this->request->isPost()) {
            $systemUser = $this->userService->getUser(6);
            $productRegistration = $productRegistrationService->create($systemUser, $this->request->getPost());

            if ($productRegistration instanceof \LundSite\Entity\ProductRegistrationInterface) {
                $vm->setVariable('result', 'success');

                $from = 'mailer@lundinternational.com';
                $to = array($productRegistration->getEmailAddress());
                $subject = 'Product Registration';
                $message = "<p>Hello, " . $productRegistration->getFirstName() . "!</p>
                    <p>Thank you for registering your " . $productRegistration->getProductCategory()->getDisplayName() . " to protect against any defects.</p>
                    <p>With the information you provided, Lund International can confirm the date of purchase of your product. This confirmation is beneficial to you, especially if your original proof of purchase is lost.</p>
                    <p>For questions regarding your warranty, please contact our Customer Service department at <a href=\"mailto:info@lundinter.com\">info@lundinter.com</a>.</p>";
                $this->sendEmail($from, $to, $subject, $message);

                $to = array(/*'jason#rocketred.com',
                    'jdrobik@lundinter.com',*/
                    'info@lundinter.com');
                $message = "<p>" . $productRegistration->getFirstName() . " has submitted a product registration request.</p>
                    <p>Please log into the PIMS administration control panel to review this submission.</p>";
                $this->sendEmail($from, $to, $subject, $message);
            } else {
                $vm->setVariable('result', 'error');
                $form->setData($this->request->getPost());
            }
        }

        $vm->setVariable('form', $form);
        $vm->setVariable('site', $site);

        return $vm;
    }

    protected function installation(SiteInterface $site, ViewModel $vm)
    {
        $partRecord = null;
        $plRecords = null;
        $multiple = null;

        if ($this->request->isPost()) {
            $query = $this->params()->fromPost('searchquery');

            if (null != $query) {
                $plParts = null;

                $partService        = $this->lundProductService->getPartService();
                $productLineService = $this->lundProductService->getProductLineService();

                $part = $partService->getPartByPartNumber($query);

                if (null != $part) {
                    $partRecord = $part;
                }

                $productLines = $productLineService->getProductLineByQuery($query);

                if (null != $productLines) {
                    if (count($productLines) > 1) {
                        $multiple = true;
                    }

                    $plRecords = array();

                    foreach ($productLines as $productLine) {
                        $plRecords[] = array(
                            'productLine' => $productLine,
                            'parts'       => $partService->getPartsByProductLine($productLine),
                        );
                    }
                }
            }
        }

        $vm->setVariable('multiple', $multiple);
        $vm->setVariable('partRecord', $partRecord);
        $vm->setVariable('plRecords', $plRecords);
        $vm->setVariable('site', $site);

        return $vm;
    }

    protected function productSupport(SiteInterface $site, ViewModel $vm)
    {
        $supportRequestService = $this->lundSiteService->getSupportRequestService();

        $form = $supportRequestService->getCreateSupportRequestForm();

        if ($this->request->isPost()) {
            $systemUser = $this->userService->getUser(6);
            $supportRequest = $supportRequestService->create($systemUser, $this->request->getPost());

            if ($supportRequest instanceof \LundSite\Entity\SupportRequestInterface) {
                $vm->setVariable('result', 'success');

                $from = 'mailer@lundinternational.com';
                $to = array(/*'jason@rocketred.com',
                    'jdrobik@lundinter.com',*/
                    'info@lundinter.com');
                $subject = 'Product Contact Form Submission';

                $message = '<p><b>' . $supportRequest->getFirstName() . '</b> has submitted a contact request.</p><p><b>Information:</b><br><br>First Name: ' . $supportRequest->getFirstName() . '<br>Last Name: ' . $supportRequest->getLastName() . '<br>Email Address: ' . $supportRequest->getEmailAddress() . '<br>Address: ' . $supportRequest->getStreetAddress() . '<br>City: ' . $supportRequest->getLocality() . '<br>State: ' . $supportRequest->getRegion()->getSubDivisionname() . '<br>Postal Code: ' . $supportRequest->getPostCode() . '<br>Country: ' . $supportRequest->getCountry()->getName() . '<br>Phone Number: ' . $supportRequest->getPhoneNumber() . '<br>Vehicle: ' . $supportRequest->getVehicle() . '<br>Part Number: ' . $supportRequest->getPartNumber() . '<br>Purchased At: ' . $supportRequest->getWherePurchase() . '<br>Comments: ' . $supportRequest->getComments() . '</p>';

                $this->sendEmail($from, $to, $subject, $message);

            } else {
                $vm->setVariable('result', 'error');
                $form->setData($this->request->getPost());
            }
        }

        $vm->setVariable('form', $form);
        $vm->setVariable('site', $site);

        return $vm;
    }

    protected function contact(SiteInterface $site, ViewModel $vm)
    {
        $contactSubmissionService = $this->lundSiteService->getContactSubmissionService();

        $form = $contactSubmissionService->getCreateContactSubmissionForm();

        if ($this->request->isPost()) {
            $systemUser = $this->userService->getUser(6);
            $contactSubmission = $contactSubmissionService->create($systemUser, $this->request->getPost());

            if ($contactSubmission instanceof \LundSite\Entity\ContactSubmissionInterface) {
                $vm->setVariable('result', 'success');

                $from = 'mailer@lundinternational.com';
                $to = array(/*'jason@rocketred.com',
                    'jdrobik@lundinter.com',*/
                    'info@lundinter.com');
                $subject = 'Contact Form Submission';

                $message = '<p><b>' . $contactSubmission->getFirstName() . '</b> has submitted a contact request.</p><p><b>Information:</b><br><br>First Name: ' . $contactSubmission->getFirstName() . '<br>Last Name: ' . $contactSubmission->getLastName() . '<br>Email Address: ' . $contactSubmission->getEmailAddress() . '<br>Address: ' . $contactSubmission->getStreetAddress() . '<br>City: ' . $contactSubmission->getLocality() . '<br>State: ' . $contactSubmission->getRegion()->getSubDivisionname() . '<br>Postal Code: ' . $contactSubmission->getPostCode() . '<br>Country: ' . $contactSubmission->getCountry()->getName() . '<br>Phone Number: ' . $contactSubmission->getPhoneNumber() . '<br>Comments: ' . $contactSubmission->getComments() . '</p>';

                $this->sendEmail($from, $to, $subject, $message);

            } else {
                $vm->setVariable('result', 'error');
                $form->setData($this->request->getPost());
            }
        }

        $vm->setVariable('form', $form);
        $vm->setVariable('site', $site);

        return $vm;
    }

    protected function showroom(SiteInterface $site, ViewModel $vm)
    {
        $showroomService = $this->lundSiteService->getShowroomService();

        $form = $showroomService->getCreateShowroomForm();

        if ($this->request->isPost()) {
            $systemUser = $this->userService->getUser(6);

            $showroom = $showroomService->createFront($systemUser, $this->request->getPost(), $this->request->getFiles()->toArray(), $site);

            if ($showroom instanceof \LundSite\Entity\ShowroomInterface) {
                $vm->setVariable('result', 'success');

                $from = 'mailer@lundinternational.com';
                $to = array(/*'jason@rocketred.com',
                    'jdrobik@lundinter.com',*/
                    'info@lundinter.com');
                $subject = 'ShowroomSubmission';

                $message = '<p><b>' . $showroom->getFirstName() . '</b> has submitted a showroom request.</p><p><b>Information:</b><br><br>First Name: ' . $showroom->getFirstName() . '<br>Last Name: ' . $showroom->getLastName() . '<br>Email Address: ' . $showroom->getEmailAddress() . '<br>Comments: ' . $showroom->getComments() . '</p>';

                $this->sendEmail($from, $to, $subject, $message);
            } else {
                $vm->setVariable('result', 'error');
                $form->setData($this->request->getPost());
            }
        }

        $showrooms = $showroomService->getActiveShowroomsBySite($site);

        $vm->setVariable('showrooms', $showrooms);
        $vm->setVariable('form', $form);
        $vm->setVariable('site', $site);

        return $vm;
    }

    protected function driversCouncil(SiteInterface $site, ViewModel $vm)
    {
        $driversCouncilService = $this->lundSiteService->getDriversCouncilService();

        $form = $driversCouncilService->getCreateDriversCouncilForm();

        if ($this->request->isPost()) {
            $systemUser = $this->userService->getUser(6);
            $driversCouncil = $driversCouncilService->create($systemUser, $this->request->getPost());

            if ($driversCouncil instanceof \LundSite\Entity\DriversCouncilInterface) {
                $vm->setVariable('result', 'success');

                $from = 'mailer@lundinternational.com';
                $to = array($driversCouncil->getEmailAddress());
                $subject = 'Drivers Council Request';
                $message = "<p>Hello, " . $driversCouncil->getFirstName() . "!</p>
                            <p>Congratulations!</p>
                            <p>We are so excited you've joined the Lund International Drivers Council! Through the remainder of the year, our marketing team will be reaching out and asking your opinion on new products and concepts as well as asking you to review products already on the market. Your opinions will be used to direct our efforts in product development and marketing campaigns.</p>
                            <p>As a member of the council, you will receive sample accessories and AVS and LUND promotional items. Your welcome gift will be mailed to you in the next 5-7 days. We will also be sending out email alerts on product specials, promotional opportunities and news about both AVS and LUND. As promised, we will strive to make this fun for the members of the council, and we will be respectful of your time and privacy.</p>
                            <p>We want to learn more about your passion for AVS and LUND products as well as your \"ride\". We encourage you to visit the \"Show & Tell\" section of our website to add a photo of your AVS or LUND product on your vehicle along with a story about your \"ride\".</p>
                            <p>Stay tuned for your opportunity to provide feedback, participate in surveys and more! If you are interested in learning more about our Brand Ambassador program, where sharing your passion for AVS and LUND within your social network gives you even more chances to win FREE prizes and recognition, please visit our <a href=http://www.lundinternational.com/about-us/drivers-council/>Drivers Council</a> page to sign up through our Brand Ambassador program portal.</p>
                            <p>Thanks for your time and interest. We look forward to having you on board!</p>";

                $this->sendEmail($from, $to, $subject, $message);

                $to = array(/*'jason@rocketred.com',
                    'jdrobik@lundinter.com',*/
                    'info@lundinter.com',
                    'jmaguire@lundinter.com');

                $message = '<p><b>' . $driversCouncil->getFirstName() . '</b> has submitted a request to become a Council Member for the Drivers Council.</p><p><b>Information:</b><br><br>First Name: ' . $driversCouncil->getFirstName() . '<br>Last Name: ' . $driversCouncil->getLastName() . '<br>Email Address: ' . $driversCouncil->getEmailAddress() . '<br>Address: ' . $driversCouncil->getStreetAddress() . '<br>City: ' . $driversCouncil->getLocality() . '<br>State: ' . $driversCouncil->getRegion()->getSubDivisionname() . '<br>Postal Code: ' . $driversCouncil->getPostCode() . '<br>Country: ' . $driversCouncil->getCountry()->getName() . '<br>TOS Agreement: ' . ($driversCouncil->getOptin() ? 'Yes' : 'No') . '</p>';

                $this->sendEmail($from, $to, $subject, $message);

            } else {
                $vm->setVariable('result', 'error');
                $form->setData($this->request->getPost());
            }
        }

        $vm->setVariable('form', $form);
        $vm->setVariable('site', $site);

        return $vm;
    }

    protected function dealersEdge(SiteInterface $site, ViewModel $vm)
    {
        $dealersEdgeService = $this->lundSiteService->getDealersEdgeService();

        $form = $dealersEdgeService->getCreateDealersEdgeForm();

        if ($this->request->isPost()) {
            $systemUser = $this->userService->getUser(6);
            $dealersEdge = $dealersEdgeService->create($systemUser, $this->request->getPost());

            if ($dealersEdge instanceof \LundSite\Entity\DealersEdgeInterface) {
                // FIRE OFF EMAIL
                $vm->setVariable('result', 'success');

                $from = 'mailer@lundinternational.com';
                $to = array($dealersEdge->getEmailAddress());
                $subject = 'Dealers Edge Request';

                if ($dealersEdge->getExistingDealer() == true) {
                    $message = "<p>Hello, " . $dealersEdge->getFirstName() . " " . $dealersEdge->getLastName() . "!</p>
                        <p>Thank you for your interest in Lund International's Dealers Edge program! Through communication with participating dealers like you, AVS and LUND continue to deliver products on the cutting edge of style, function and high performance! After all, no one knows better what your customer wants than you!</p>
                        <p>Our Dealers Edge program has been refreshed and re-launched with your business in mind. We want to make sure you have the sales and marketing support you need to increase your business through our comprehensive product lines offered by AVS and LUND. From ventvisors&traade;/side window deflectors, hood protection running boards and nerf bars to tonneaus and premium floor coverings, our brands provide your customers outstanding value along with industry-leading warranties.</p>
                        <p>As a member of Dealers Edge, you will have access to:<br />
                        <ul>
                            <li>Monthly and quarterly communications keep you up to date</li>
                            <li>Application guides</li>
                            <li>Store locations featured in our Retail Locator within the Where to Buy section of the website</li>
                            <li>Exposure to millions of annual website visitors</li>
                            <li>Access to FREE POP displays (based upon qualifying with a minimum purchase)</li>
                            <li>Monthly promotions (free prize drawings)</li>
                            <li>Marketing support</li>
                            <li>Product Installation videos you can link to or post on your website</li>
                        </ul></p>
                        <p>Throughout this year, you'll be receiving information about new products, promotions and marketing support for both AVS and LUND brands and their products. As always, Lund International will strive to be the easiest company to do business with offering you and your customers' comprehensive product lines supported by great customer service.</p>
                        <p><b>Earn your FREE Point of Purchase Displays</b><br>
                        As part of the Dealers Edge Program, you have the chance to select from an array of displays to merchandise products and market more effectively to your customer. You can qualify by purchasing a minimum amount of product, specified on the Dealers Edge page, and submitting the Marketing Materials Order Form.</p>
                        <p>We have placed a secured PDF on the Dealers Edge web page for you to download, complete and mail to Lund International. When you click on the PDF icon, you will be prompted to enter a username and password, provided below. Once you submit this information, you will be able to download the order form.</p>
                        <p><b>POP ORDER FORM:</b><br />
                        Username: DealersEdge<br>
                        Password: n5Mf4</p>
                        <p>For questions, please e-mail us at <a href=mailto:dealersedgeadmin@lundinter.com>dealersedgeadmin@lundinter.com</a>.</p>
                        <p>Stay tuned for more and more great news for AVS and LUND.<br />
                        The Lund International Marketing Team</p>";
                } else {
                    $message = "<p>Hello, " . $dealersEdge->getFirstName() . " " . $dealersEdge->getLastName() . "!</p>
                    <p>Thank you for your interest in becoming a Dealer for Lund International's market-leading brands, AVS and LUND. Our goal at Lund International is to be the easiest company to do business with offering you and your customers' comprehensive product lines supported by great customer service.</p>
                    <p>We want to make sure you have the sales and marketing support you need to increase your business through our comprehensive product lines offered by AVS and LUND. From ventvisors&trade;/side window deflectors, hood protection running boards and nerf bars to tonneaus and premium floor coverings, our brands provide your customers outstanding value along with industry-leading warranties.</p>
                    <p>As a member of Dealers Edge, you will have access to:<br />
                    <ul>
                    <li>Monthly and quarterly communications keep you up to date</li>
                    <li>Application guides</li>
                    <li>Store locations featured in our Retail Locator within the Where to Buy section of the website</li>
                    <li>Exposure to millions of annual website visitors</i>
                    <li>Access to FREE POP displays (based upon qualifying with a minimum purchase)</li>
                    <li>Monthly promotions (free prize drawings)</li>
                    <li>Marketing support</li>
                    <li>Product Installation videos you can link to or post on your website</li>
                    </ul>
                    <p>Throughout this year, you'll be receiving information about new products, promotions and marketing support for both AVS and LUND brands and their products. As always, Lund International will strive to be the easiest company to do business with offering you and your customers' comprehensive product lines supported by great customer service.</p>
        `           <p>Your request to become a Lund International Dealer will be reviewed by our Customer Service department, and your information will be saved in our database, upon validation.</p>
                    <p><b>Earn your FREE Point of Purchase Displays</b><br>
                    As part of the Dealers Edge Program, you have the chance to select from an array of displays to merchandise products and market more effectively to your customer. You can qualify by purchasing a minimum amount of product, specified on the Dealers Edge page, and submitting the Marketing Materials Order Form.</p>
                    <p>We have placed a secured PDF on the Dealers Edge web page for you to download, complete and mail to Lund International. When you click on the PDF icon, you will be prompted to enter a username and password, provided below. Once you submit this information, you will be able to download the order form.</p>
                    <p><b>POP ORDER FORM:</b><br />
                    Username: DealersEdge<br>
                    Password: n5Mf4</p>
                    <p>For questions, please e-mail us at <a href=mailto:dealersedgeadmin@lundinter.com>dealersedgeadmin@lundinter.com</a>.</p>
                    <p>Thank you for your continued support of AVS and LUND!<br />
                    The Lund International Marketing Team</p>";
                }

                $this->sendEmail($from, $to, $subject, $message);

                $to = array(/*'jason@rocketred.com',
                    'jdrobik@lundinter.com',*/
                    'info@lundinter.com',
                    'jmaguire@lundinter.com');

                $message = '<p><b>' . $dealersEdge->getFirstName() . '</b> has submitted a request for the Dealers Edge program.</p><p><b>Information:</b><br><br>Existing Dealer: ' . ($dealersEdge->getExistingDealer() ? 'Yes' : 'No') . '<br>First Name: ' . $dealersEdge->getFirstName() . '<br>Last Name: ' . $dealersEdge->getLastName() . '<br>Email Address: ' . $dealersEdge->getEmailAddress() . '<Br>Company: ' . $dealersEdge->getCompanyName() . '<br>Address: ' . $dealersEdge->getStreetAddress() . '<br>Ext Address: ' . $dealersEdge->getExtStreetAddress() . '<br>City: ' . $dealersEdge->getLocality() . '<br>State: ' . $dealersEdge->getRegion()->getSubDivisionname() . '<br>Postal Code: ' . $dealersEdge->getPostCode() . '<br>Country: ' . $dealersEdge->getCountry()->getName() . '<br>Phone: ' . $dealersEdge->getPhoneNumber() . '<br>Fax: ' . $dealersEdge->getFaxNumber() . '<br>Warehouse Distributor: ' . $dealersEdge->getDistributor() . '<br>Brands: ' . $dealersEdge->getBrands() . '</p>';

                $this->sendEmail($from, $to, $subject, $message);
            } else {
                $vm->setVariable('result', 'error');
                $form->setData($this->request->getPost());
            }
        }

        $vm->setVariable('form', $form);
        $vm->setVariable('site', $site);

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
