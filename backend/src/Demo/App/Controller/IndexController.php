<?php
namespace Demo\App\Controller;

use Velox\Framework\Mvc\BaseController;
use Velox\Framework\Registry\Registry;

class IndexController extends BaseController {
    public function indexAction() {
        $request = Registry::get('Velox.Http.Request');
        return $this->render('Index/index.php', ['name' => $request->route->getString('name')]);
    }

    public function loginAction() {
        /*$request = Registry::get('Velox.Http.Request');
        if ($request->getMethod() == 'POST' && Registry::get('Velox.Security.AuthenticationManager')->isAuthenticated())
            $this->setRedirect($this->generateUrl('home_page'));*/
        return $this->render('Test/login.php');
    }

    public function logoutAction() {
        Registry::get('Velox.Security.AuthenticationManager')->logout();
        $this->setRedirect($this->generateUrl('account', ['action' => 'login']));
    }

    public function registerAction() {
        return $this->render('Test/register.php');
    }
}
