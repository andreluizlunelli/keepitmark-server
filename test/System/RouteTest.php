<?php
/**
 * Created by PhpStorm.
 * User: tolun
 * Date: 15/03/2017
 * Time: 00:01
 */

namespace Test\System;

use LL\System\ContainerHttp;
use LL\System\Route;
use PHPUnit\Framework\TestCase;

class RouteTest extends TestCase
{
    /**
     * @var Route
     */
    private static $routes;

    public static function setUpBeforeClass()
    {
        self::$routes = new Route(ContainerHttp::getInstance()); // rotas na função mapRoutes
    }

    public function testcase01(): void {
        self::assertTrue(true);
    }

    /*public function mapRouteTest()
    {
        self::$routes->map('GET', '/', function () { return 'controller'; });
        self::$routes->getRoute()->getData();
    }*/
}