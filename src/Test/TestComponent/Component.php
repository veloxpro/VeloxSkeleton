<?php
namespace Test\TestComponent;

use Velox\Framework\Kernel\BaseComponent;
use Velox\Framework\Mvc\Dispatcher;
use Velox\Framework\Router\HttpRoute;

class Component extends BaseComponent {
    public function getServices() {
        return [];
    }

    public function getRoutes() {
        return [
            'home_page' => new HttpRoute(function() {
                    return new Dispatcher('Test\\TestComponent', 'Test', 'hello');
                }, '/[?]hello/[:name][?]/', ['name' => '[a-zA-Z]+([0-9]{1})?']),
            'account' => new HttpRoute(function($route) {
                    $matches = $route->getMatches();
                    return new Dispatcher('Test\\TestComponent', 'Test', $matches['action']);
            }, '/account/[:action]/', ['action' => 'login|logout|register'])
        ];
    }

    public function getEventListeners() {
        return [];
    }
}