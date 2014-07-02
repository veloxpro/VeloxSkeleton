<?php
namespace Test\Admin\Controller;

use Velox\Framework\Mvc\BaseController;
use Velox\Framework\Registry\Registry;

class DashboardController extends BaseController {
    public function __construct() {
        parent::__construct();
        $user = Registry::get('Velox.Security.AuthenticationManager')->getUser();
        if (!$user || $user->getId() != 1) {
            $this->setRedirect($this->generateUrl('account', ['action' => 'login']));
            //exit;
        }
    }

    public function indexAction() {
        return $this->render('Dashboard/index.php');
    }
}
