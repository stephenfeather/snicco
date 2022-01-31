<?php

declare(strict_types=1);

use Snicco\Component\HttpRouting\Tests\Routing\RouteLoaderTest;
use Snicco\Component\HttpRouting\Tests\fixtures\Controller\RoutingTestController;
use Snicco\Component\HttpRouting\Routing\RoutingConfigurator\WebRoutingConfigurator;

return function (WebRoutingConfigurator $router) {
    $router->get(
        'web1',
        RouteLoaderTest::WEB_PATH,
        RoutingTestController::class
    );
    
    if (true === RouteLoaderTest::$web_include_partial) {
        $router->include(__DIR__.'/_partial.php');
    }
    
    $router->fallback([RoutingTestController::class, 'fallback']);
};