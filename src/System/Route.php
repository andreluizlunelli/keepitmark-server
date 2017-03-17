<?php
namespace LL\System;

use League\Route\RouteCollection;

class Route {
	
	/**
	 * @var \League\Route\RouteCollection
	 */
	private $route;

	/**
	 * @var ContainerHttp
	 */
	private $container;
	
	function __construct($container) {
		$this->container = $container;
		$this->route = new RouteCollection($this->container->getLeagueContainer());
	}

    /**
     * @param string $methodHTTP metodo http: GET, POST ..
     * @param string $route rota '/algumacoisa'
     * @param $handler função utilizada ou controler utilizado 'MeuController::minhaAction'
     *                                                          ou [new \LL\Controller\SiteController, 'getIndex']
     */
    public function map(string $methodHTTP, string $route, $handler)
    {
        $this->route->addRoute($methodHTTP, $route, $handler);
    }

    /**
     * @return RouteCollection
     */
    public function getRoute(): RouteCollection
    {
        return $this->route;
    }

//    private function mapRoute(): void {
//		$this->route->get('/', 'LL\Controller\SiteController::getIndex');
//	}
	
	public function dispatch(): void {
		$leagueContainer = $this->container->getLeagueContainer(); 
		$response = $this->route->dispatch($leagueContainer->get('request'), $leagueContainer->get('response'));
		$leagueContainer->get('emitter')->emit($response);
	}
}