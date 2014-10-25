<?php
namespace Demo\App;

use Velox\Framework\Kernel\BaseComponent;
use Velox\Framework\Mvc\Dispatcher;
use Velox\Framework\Router\HttpRoute;

class Component extends BaseComponent {
    public function getServices() {
        return [];
    }

    public function getRoutes() {
        return [
            'home' => new HttpRoute(function() {
                    return new Dispatcher('Demo\App', 'Index', 'index');
                }, '/[?]hello/[:name][?]/', ['name' => '[a-zA-Z]+([0-9]{1})?']),
        ];
    }

    public function getEventListeners() {
        return [];
    }
}