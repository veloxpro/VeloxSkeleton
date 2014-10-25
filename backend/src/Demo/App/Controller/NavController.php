<?php
namespace Demo\App\Controller;

use Velox\Framework\Mvc\BaseController;
use Velox\Framework\Registry\Registry;

class NavController extends BaseController {
    public function mainAction() {
        $projectName = 'VeloxStack';
        $user = Registry::get('Velox.Security.AuthenticationManager')->getUser();
        $isAdmin = $user && $user->getId() == 1;

        $navItems = [];
        $navItems[] = ['title' => 'Home', 'route' => 'home'];
        $navItems[] = ['title' => 'Greet', 'route' => 'home', 'routeParams' => ['name' => 'world']];

        if (Registry::get('Velox.Security.AuthenticationManager')->isAuthenticated()) {
            $navItems[] = ['title' => 'Logout', 'route' => 'account', 'routeParams' => ['action' => 'logout']];
            if ($isAdmin)
                $navItems[] = ['title' => 'Admin', 'route' => 'admin_home'];
        } else {
            $navItems[] = ['title' => 'Login', 'route' => 'account', 'routeParams' => ['action' => 'login']];
            $navItems[] = ['title' => 'Register', 'route' => 'account', 'routeParams' => ['action' => 'register']];
        }

        $external = ['title' => 'External', 'children' => []];
        $external['children'][]= ['title' => 'Google', 'href' => 'http://google.com'];
        $external['children'][] = ['title' => 'Yahoo', 'href' => 'http://yahoo.com'];
        $navItems[] = $external;

        return $this->render('Nav/main.php', ['navItems' => $navItems, 'projectName' => $projectName]);
    }
}
