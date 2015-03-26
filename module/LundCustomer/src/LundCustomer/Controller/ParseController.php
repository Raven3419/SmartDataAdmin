<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */
/**
 * PHP version 5.5
 *
 * @category   Zend
 * @package    LundCustomer
 * @subpackage Controller
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * @version    GIT: $Id$
 * @since      File available since Release 1.0.0
 */

namespace LundCustomer\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Zend\Stdlib\Parameters;
use Zend\Console\Request as ConsoleRequest;
use SPLFileInfo;
use SPLFileObject;
use Zend\Mail;
use LundCustomer\Service\ParseCustomerService;
use LundCustomer\Service\CustomerService;
use RocketUser\Service\UserService;
use RocketAdmin\Service\AuditService;
use RocketDam\Service\AssetService;

/**
 * Parse master/customer controller for LundCustomer module
 *
 * @category   Zend
 * @package    LundCustomer
 * @subpackage Controller
 * @author     Raven Sampson <rsampson@thesmartdata.com>
 * @license    http://framework.zend.com/license/new-bsd New BSD License
 * k
 * @version    GIT: $Id$
 */
class ParseController extends AbstractActionController
{
    /**
     * @var ParseCustomerService
     */
    protected $parseCustomerService = null;

    /**
     * @var CustomerService
     */
    protected $customerService = null;

    /**
     * @var UserService
     */
    protected $userService = null;

    /**
     * @var AuditService
     */
    protected $auditService = null;

    /**
     * @var AssetService
     */
    protected $assetService = null;

    /**
     * @param ParseCustomerService $parseCustomerService
     * @param CustomerService      $customerService
     * @param UserService          $userService
     * @param AuditService         $auditService
     * @param AssetService         $assetService
     */
    public function __construct(
        ParseCustomerService $parseCustomerService,
        CustomerService $customerService,
        UserService $userService,
        AuditService $auditService,
        AssetService $assetService
    )
    {
        $this->parseCustomerService = $parseCustomerService;
        $this->customerService      = $customerService;
        $this->userService          = $userService;
        $this->auditService         = $auditService;
        $this->assetService         = $assetService;
    }

    /**
     * Parse the customer file
     *
     * @return string
     */
    public function parsecustomerAction()
    {
        $filename = $this->getRequest()->getParam('filename');
        $file     = new SPLFileObject($filename);

        if (($file->isFile()) && ($file->isReadable())) {
            switch (strtolower($file->getExtension())) {
                case 'csv':
                    $file->setFlags(SplFileObject::READ_CSV);
                    $file->setCsvControl(',', '"', '\\');
                    $iterator = 0;

                    $filepath = explode('/', $filename);

                    // generate audit log entry
                    $this->auditService->create([
                        'createdBy' => 'system',
                        'object'    => 'LundCustomer',
                        'action'    => 'Customer File Ingestion',
                        'summary'   => 'Starting customer file ingestion on file \'' . $filepath[count($filepath) - 1] . '\'',
                        'result'    => 'success',
                    ]);

                    foreach ($file as $rowData) {
                        $customer = null;
                        $iterator++;

                        if (($iterator == 1) || (count($rowData) <= 1)) {
                            continue;
                        }
/*
 * Header column                   BPCS
 *                                 Fld Nam FldTyp lngth #of dec/numeric
 *                                                                         P=numeric
 * Cust                    0        ZMCUS      P      6   0
 * Custname                1        ZNME       A     30
 * Filepickup              2        ZFPCKP     A      1
 * Pushfile                3        ZPUSH      A      1
 * Ftpsite                 4        ZFTPS      A     60
 * Ftpuser                 5
 * Ftppass                 6
 * Emailaddrs              7        ZEMAL      A     60
 * Contactname             8        ZCONT      A     50
 * Updatetype              9        ZUTYP      A      1
 * Frequency               10        ZFREQ      A      1
 * Filetype1               11        ZFTY1      A     10
 * Filetype2               12        ZFTY2      A     10
 * Lund                    13        ZBR01      A      1
 * Dfmal                   14        ZBR02      A      1
 * Avs                     15        ZBR03      A      1
 * Nifty                   16        ZBR04      A      1
 * Tradesman               17        ZBR05      A      1
 * Lmp                     18        ZBR06      A      1
 * Amp                     19        ZBR07      A      1
 * Ht_am                   20        ZBR08      A      1
 * Belmor                  21        ZBR09      A      1
 * LundAll                 22                   A      1
 * Brand11                 23        ZBR11      A      1
 * Brand12                 24        ZBR12      A      1
 * Brand13                 25        ZBR13      A      1
 * Brand14                 26        ZBR14      A      1
 * Brand15                 27        ZBR15      A      1
 * Imagetyp                28        ZIMAG      A      5
 * Renameimages            29        ZRENM      A      1
 * Acceptvideo             30        ZVDEO      A      1
 * Videotype               31        ZVTYP      A     10
 */

                        $custId       = trim($rowData[0]);
                        $name         = trim($rowData[1]);
                        $filePickup   = strtoupper(trim($rowData[2])) == 'Y';
                        $filePush     = strtoupper(trim($rowData[3])) == 'Y';
                        $ftpSite      = trim($rowData[4]);
                        $ftpUser      = trim($rowData[5]);
                        $ftpPass      = trim($rowData[6]);
                        $email        = trim($rowData[7]);
                        $contactName  = trim($rowData[8]);
                        $updateType   = (strtoupper(trim($rowData[9])) == 'N' ? 'net' : 'full');
                        $frequency    = (strtoupper(trim($rowData[10])) == 'W' ? 'week' : 'month');
                        $acesVersion  = trim($rowData[11]);
                        $piesVersion  = trim($rowData[12]);
                        $lund         = strtoupper(trim($rowData[13])) == 'Y';
                        $dfmal        = strtoupper(trim($rowData[14])) == 'Y';
                        $avs          = strtoupper(trim($rowData[15])) == 'Y';
                        $nifty        = strtoupper(trim($rowData[16])) == 'Y';
                        $tradesman    = strtoupper(trim($rowData[17])) == 'Y';
                        $lmp          = strtoupper(trim($rowData[18])) == 'Y';
                        $amp          = strtoupper(trim($rowData[19])) == 'Y';
                        $htam         = strtoupper(trim($rowData[20])) == 'Y';
                        $belmor       = strtoupper(trim($rowData[21])) == 'Y';
                        $lundAll      = strtoupper(trim($rowData[22])) == 'Y';
                        //$brand11      = strtoupper(trim($rowData[23])) == 'Y'; // reserved for later
                        //$brand12      = strtoupper(trim($rowData[24])) == 'Y'; // reserved for later
                        //$brand13      = strtoupper(trim($rowData[25])) == 'Y'; // reserved for later
                        //$brand14      = strtoupper(trim($rowData[26])) == 'Y'; // reserved for later
                        //$brand15      = strtoupper(trim($rowData[27])) == 'Y'; // reserved for later
                        $imageType    = trim($rowData[28]);
                        $renameImages = strtoupper(trim($rowData[29])) == 'Y';
                        $acceptVideo  = strtoupper(trim($rowData[30])) == 'Y';
                        $videoType    = trim($rowData[31]);

                        $customer = $this->customerService->findCustomerByCustId($custId);

                        if ($contactName == '') { $contactName = 'Support Contact'; }
                        if ($email == '') { $email = 'jdrobik@lundinter.com'; }

                        // TODO: is there going to ever be a brand in the customer file that doesn't already exist?
                        if (null != $customer) {
                            $customer = $this->parseCustomerService->editCustomer($customer, $custId, $name, $filePickup, $filePush,
                                                                                  $ftpSite, $ftpUser, $ftpPass, $email, $contactName,
                                                                                  $updateType, $frequency,
                                                                                  $acesVersion, $piesVersion, $lund, $dfmal, $avs,
                                                                                  $nifty, $tradesman, $lmp, $amp, $htam, $belmor, $lundAll,
                                                                                  $imageType, $renameImages, $acceptVideo, $videoType);
                        } else {
                            $userForm = $this->userService->getCreateUserForm();

                            $systemUser = $this->userService->getUser(6);

                            $chars = 'abcdefghjkmnpqrstuvwxyzABCDEFGHJKMNPQRSTUVWXYZ123456789';
                            $newPassword = '';
                            for ($i=0; $i<7;$i++) {
                                $newPassword .= substr($chars, rand(0, 54), 1);
                            }
                            $newPassword = str_shuffle($newPassword);

                            $data = new Parameters();
                            $values = array();
                            $values['username'] = strtolower($email);
                            $values['password'] = $newPassword;
                            $values['passwordVerification'] = $newPassword;
                            $values['disabled'] = '0';
                            $values['role'] = '2';
                            $values['firstName'] = $contactName;
                            $values['lastName'] = $name;
                            $values['emailAddress'] = strtolower($email);
                            $values['companyName'] = $name;
                            $values['streetAddress'] = '4325 Hamilton Mill Road';
                            $values['locality'] = 'Buford';
                            $values['region'] = '18660';
                            $values['postCode'] = '30518';
                            $values['country']  = '240';
                            $data->set('user-fieldset', $values);

                            $user = $this->userService->create($systemUser, $data);

                            $customer = $this->parseCustomerService->insertCustomer($custId, $name, $filePickup, $filePush, $ftpSite,
                                                                                    $ftpUser, $ftpPass, $user,
                                                                                    $email, $contactName, $updateType, $frequency,
                                                                                    $acesVersion, $piesVersion, $lund, $dfmal, $avs,
                                                                                    $nifty, $tradesman, $lmp, $amp, $htam, $belmor, $lundAll,
                                                                                    $imageType, $renameImages, $acceptVideo, $videoType);

                            $customerId = $customer->getCustomerId();
                            $customerPath = realpath(__DIR__ . '/../../../../../public/assets/library/customers/accounts/' . $customerId);

                            if (!is_dir($customerPath)) {
                                mkdir($customerPath);
                                touch($customerPath . '/.gitignore');
                            }

                            /* Send email */
                            $mail = new Mail\Message();
                            $mail->setBody("An account has been created for you on www.lundinternational.com\r\n\r\n
                                Username: " . strtolower($email) . "\r\n
                                Password: " . $newPassword . "\r\n
                            ");
                            $mail->setFrom('rsampson@thesmartdata.com');
                            /* TODO: Replace email with customer file supplied email address */
                            $mail->addTo($email);
                            $mail->setSubject('Account created for lundinternational.com');
                            $transport = new Mail\Transport\Sendmail();
                            $transport->send($mail);
                        }
                    }

                    $filepath = explode('/', $filename);

                    $asset = $this->assetService->saveFile('library/customers', date('YmdHis').$filepath[count($filepath) - 1],
                        ['mime'     => 'text/csv',
                         'size'     => filesize($filename),
                         'filetype' => 'customerfile',
                         'ext'      => 'csv',
                         'width'    => null,
                         'height'   => null]);

                    shell_exec('mv ' . $filename . ' public/assets/library/customers/' . date('YmdHis').$filepath[count($filepath) - 1]);

                    $this->auditService->create(array(
                        'createdBy' => 'system',
                        'object'    => 'LundCustomer',
                        'action'    => 'Customer File Ingestion',
                        'summary'   => 'Successfully ingested customer file \'' . $filepath[count($filepath) - 1] . '\'',
                        'result'    => 'success',
                    ));

                    $baseArray = explode('/', $filename);
                    $basePathArray = array_slice($baseArray, 0, -1);
                    $basePathCleaned = implode('/', $basePathArray);
                    $basePath = $basePathCleaned . '/customer.trg';
                    shell_exec('rm ' . $basePath);
                break;
            }
        }
    }
}
