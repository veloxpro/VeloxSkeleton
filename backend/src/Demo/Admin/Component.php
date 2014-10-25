<?php
namespace Demo\Admin;

use Velox\Framework\Kernel\BaseComponent;
use Velox\Framework\Mvc\Dispatcher;
use Velox\Framework\Router\HttpRoute;

class Component extends BaseComponent {
    public function getServices() {
        return [];
    }

    public function getRoutes() {
        return [
            'admin_home' => new HttpRoute(function() {
                    return new Dispatcher('Test\\Admin', 'Dashboard', 'index');
                }, '/admin/'),
        ];
    }

    public function getEventListeners() {
        return [];
    }
}