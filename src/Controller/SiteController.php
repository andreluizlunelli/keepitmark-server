<?php
namespace LL\Controller;

use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Message\ResponseInterface;
use League\Plates\Engine;

class SiteController {

	/**
	 * @var Engine
	 */
	private $templates;
	
	function __construct() {
//		$this->templates = new Engine(getcwd() . "/pages");
	}
		
	public function getIndex(ServerRequestInterface $request, ResponseInterface $response) {
//		$varIndex = [
//				'topName' => 'Freelancer'
//				,'name' => 'André Luiz Lunelli'
//		];
//		$response->getBody()->write($this->templates->render('index', $varIndex));
        exit('index');
	}

}