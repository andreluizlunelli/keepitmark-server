<?php

declare(strict_types=1);

namespace Test\System;

use LL\System\ContainerHttp;
use LL\System\Route;
use PHPUnit\Framework\TestCase;

//class RouteTest extends \PHPUnit_Framework_TestCase
class RouteTest extends TestCase
{
    /**
     * @var Route
     */
    private static $routes;

    protected function setUp()
    {
        self::$routes = new Route(ContainerHttp::getInstance()); // rotas na função mapRoutes
    }

    public function testMapRouteWithFunction()
    {
        self::$routes->map('GET', '/', function () { return 'controller'; });
        $data = self::$routes->getRoute()->getData();
        $route = $data[0];
        self::assertTrue(is_callable($data[0]['GET']['/']), "Aqui deveria retornar uma função");
    }

    public function testMapRouteWithString()
    {
        $_callback = 'MeuController::MinhaAction';
        self::$routes->map('GET', '/', $_callback);
        $data = self::$routes->getRoute()->getData();
        $route = $data[0];
        self::assertTrue(is_string($data[0]['GET']['/']), $_callback);
    }



}