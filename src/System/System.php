<?php
namespace LL\System;

class System {
	
	/**
	 * @var ContainerHttp
	 */
	private $container;
	
	/**
	 * 
	 * @var Route
	 */
	private $routes;
	
	public function start() {
		$this->container = ContainerHttp::getInstance();
		$this->routes = new Route($this->container);
        $this->routes->map('GET', '/', [new \LL\Controller\SiteController, 'getIndex']);
		$this->routes->dispatch();
	}
	
}
