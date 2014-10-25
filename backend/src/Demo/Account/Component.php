<?php
namespace Demo\Account;

use Velox\Framework\Kernel\BaseComponent;
use Velox\Framework\Mvc\Dispatcher;
use Velox\Framework\Router\HttpRoute;

class Component extends BaseComponent {
    public function getServices() {
        return [];
    }

    public function getRoutes() {
        return [
            'account' => new HttpRoute(function($route) {
                    $matches = $route->getMatches();
                    return new Dispatcher('Demo\Account', 'Index', $matches['action']);
            }, '/account/[:action]/', ['action' => 'login|logout|register'])
        ];
    }

    public function getEventListeners() {
        return [];
    }
}