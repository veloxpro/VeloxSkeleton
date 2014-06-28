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
                }, '/[?]hello/[:name][?]/', ['name' => '[a-zA-Z]+'])
        ];
    }

    public function getEventListeners() {
        return [];
    }
}