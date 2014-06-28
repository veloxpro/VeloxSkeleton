<?php
namespace Test\TestComponent\Controller;

use Velox\Framework\Mvc\BaseController;
use Velox\Framework\Registry\Registry;

class TestController extends BaseController {
    public function helloAction() {
        $request = Registry::get('Velox.Request');
        return $this->render('Test/hello.php', ['name' => $request->route->getString('name')]);
    }
}
