<?php
namespace Test\TestComponent\Controller;

use Velox\Framework\Mvc\BaseController;
use Velox\Framework\Registry\Registry;

class TestController extends BaseController {
    public function helloAction() {
        $authenticationManager = Registry::get('Velox.Security.AuthenticationManager');
        //_dump($authenticationManager);

        //_dump($authenticationManager->isAuthenticated());
        //_dump($authenticationManager->getUser());

        $request = Registry::get('Velox.Http.Request');
        return $this->render('Test/hello.php', ['name' => $request->route->getString('name')]);
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
