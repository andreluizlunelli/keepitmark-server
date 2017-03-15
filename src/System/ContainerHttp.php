<?php
namespace LL\System;

use League\Container\Container;
use Zend\Diactoros\Response\SapiEmitter;

class ContainerHttp {
	
	/**
	 * @var \League\Container\Container
	 */
	private $container;
	
	/**
	 * @var ContainerHttp
	 */
	private static $_SELF;
	
	function __construct() {
		$this->container = new \League\Container\Container();
        $this->container->share('response', \Zend\Diactoros\Response::class);
        $this->container->share('request', function () {
            return \Zend\Diactoros\ServerRequestFactory::fromGlobals(
                $_SERVER, $_GET, $_POST, $_COOKIE, $_FILES
            );
        });
        $this->container->share('emitter', \Zend\Diactoros\Response\SapiEmitter::class);
    }
	
	function getLeagueContainer(): \League\Container\Container {
		return $this->container;
	}

	static function getInstance() {
		if (is_null(self::$_SELF)) {
			self::$_SELF = new ContainerHttp();
		}
		return self::$_SELF;
	}
	
}