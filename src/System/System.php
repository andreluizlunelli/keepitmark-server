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
		$this->routes = new Route($this->container); // rotas na função mapRoutes
		$this->routes->dispatch();
	}
	
}
