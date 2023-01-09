<?php

namespace App\Controllers;

use App\Models\CategorieModel;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Config\Encryption;
use Config\Services;
use Psr\Log\LoggerInterface;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    protected $data = [];

    protected $ajax_response = array(
        'success' => false,
        'message' => null,
        'data' => null
    );
    protected $user;

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);
        $this->initEncryption();

        // Preload any models, libraries, etc, here.
        $this->session = Services::session();
        $this->user = $this->session->get('user');
        $connected = $this->user != null;
        $categorieModel = new CategorieModel();
        $basket = $this->getBasket();
        $this->data = array(
            'title' => "F comme Fleurs",
            'page' => "home",
            'content' => null,
            'connected' => $connected,
            'admin' => false,
            'itemBasket' => count($basket->getProductList()),
            'shopCategorie' => $categorieModel->getData(null, null, "*", null, array("name" => "DESC"))
        );
        if ($connected) {
            $this->data['admin'] = $this->user->getPrivilege() != null && $this->user->getPrivilege()->getId() >= 3;
            if (!empty($this->user->getResetPassword())) {
                return redirect()->to('/connection/reset_password');
            }
        }
    }

    /**
     * Check if an administrator is connected
     * @return bool
     */
    protected function isAdminConnected() {
        return !is_null($this->user) && $this->user->getPrivilege() != null && $this->user->getPrivilege()->getId() >= 3;
    }

    /**
     * Get the basket
     * @return \App\Entities\Basket|array|mixed|null
     */
    protected function getBasket() {
        $basket = $this->session->get('basket');
        if (is_null($basket)){
            $basket = new \App\Entities\Basket();
            $basket->setShipPrice(9.95);
        }
        return $basket;
    }

    /**
     * Encrypt data and encode into base64 string
     * @param string $str
     * @return string
     */
    protected function encrypt($str) {
        $encryption = $this->initEncryption();
        return base64_encode($encryption->encrypt($str));
    }

    /**
     * Decode base64 string and decrypt data
     * @param $str
     * @return string
     */
    protected function decrypt($str) {
        $encryption = $this->initEncryption();
        return $encryption->decrypt(base64_decode($str));
    }

    /**
     * Initialize encryption service
     * @return \CodeIgniter\Encryption\EncrypterInterface
     */
    private function initEncryption() {
        $config         = new Encryption();
        $config->key    = ENCRYPTION_KEY;
        $config->driver = ENCRYPTION_DRIVER;
        return Services::encrypter($config);
    }
}
