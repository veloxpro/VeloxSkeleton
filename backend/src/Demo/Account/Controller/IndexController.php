<?php
namespace Demo\Account\Controller;

use Velox\Framework\Mvc\BaseController;
use Velox\Framework\Registry\Registry;

class IndexController extends BaseController {
    public function loginAction() {
        return $this->render('Index/login.php');
    }

    public function logoutAction() {
        Registry::get('Velox.Security.AuthenticationManager')->logout();
        $this->setRedirect($this->generateUrl('account', ['action' => 'login']));
    }

    public function registerAction() {
        return $this->render('Index/register.php');
    }
}
