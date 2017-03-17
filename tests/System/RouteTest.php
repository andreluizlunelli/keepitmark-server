<?php

declare(strict_types=1);

namespace TestsLL\System;

use LL\System\ContainerHttp;
use LL\System\Route;
//use PHPUnit\Framework\TestCase;

//class RouteTest extends \PHPUnit_Framework_TestCase
final class RouteTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var Route
     */
    private $routes;

    protected function setUp()
    {
        $this->routes = new Route(ContainerHttp::getInstance()); // rotas na função mapRoutes
    }

    public function testMapRouteWithFunction()
    {
        $this->routes->map('GET', '/', function () { return 'controller'; });
        $data = $this->routes->getRoute()->getData();
        $route = $data[0];
        self::assertTrue(is_callable($data[0]['GET']['/']), "Aqui deveria retornar uma função");
    }

    public function testMapRouteWithString()
    {
        $_callback = 'MeuController::MinhaAction';
        $this->routes->map('GET', '/', $_callback);
        $data = $this->routes->getRoute()->getData();
        $route = $data[0];
        self::assertTrue(is_string($data[0]['GET']['/']), $_callback);
    }



}