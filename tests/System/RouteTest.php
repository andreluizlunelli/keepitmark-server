<?php

declare(strict_types=1);

namespace TestsLL\System;

use LL\System\ContainerHttp;
use LL\System\Route;
use PHPUnit\Framework\TestCase;

final class RouteTest extends TestCase
{
    /**
     * @var Route
     */
    private $routes;

    protected function setUp()
    {
        $this->routes = new Route(ContainerHttp::getInstance());
    }

    public function testMapRouteWithFunction()
    {
        $this->routes->map('GET', '/', function () { return 'controller'; });
        $data = $this->routes->getRoute()->getData();
        $route = $data[0];
        self::assertTrue(is_callable($data[0]['GET']['/']) && $route['GET']['/']() == 'controller', "Aqui deveria retornar uma função");
    }


}