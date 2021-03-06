<?php
Library::import('recess.framework.routing.RtNode');
Library::import('recess.framework.routing.Route');

Library::import('recess.http.Request');
Library::import('recess.http.Methods');

class RtNodeTest extends PHPUnit_Framework_TestCase {
	/** @property array(Route) */
	protected $routes;
	/** @property RtNode */
	protected $node;
	
	function setUp() {
		$this->node = new RtNode();
		$this->routes = array(
			'MethodA' => new Route('Controller','MethodA','GET','/controller/methoda/'),
			'MethodB_POST' => new Route('Controller','MethodB_POST','POST','/controller/methodb/1'),
			'MethodB_GET' => new Route('Controller','MethodB_GET','GET','/controller/methodb/1'),
			'MethodB_PUT' => new Route('Controller','MethodB_PUT','PUT','/controller/methodb/1'),
			'MethodC_PARAM' => new Route('Controller','MethodC_PARAM','GET','/controller/methodc/:id')		
		);
	}
	
	function testFindOnNoRoutes() {
		$request = new Request();
		$request->method = Methods::GET;
		$request->setResource('/home');
		$routeResult = $this->node->findRouteFor($request);
		$this->assertFalse($routeResult->routeExists);
	}
	
	function testFindOnSingleRoute() {
		$this->node->addRoute('test', $this->routes['MethodA'], '');
		$request = new Request();
		$request->method = Methods::GET;
		$request->setResource('/controller/methoda/');
		$routeResult = $this->node->findRouteFor($request);
		$this->assertTrue($routeResult->routeExists);
	}
	
	function testFindFailOnSingleRoute() {
		$this->node->addRoute('test', $this->routes['MethodA'], '');
		$request = new Request();
		$request->method = Methods::GET;
		$request->setResource('/controller/methodb/');
		$routeResult = $this->node->findRouteFor($request);
		$this->assertFalse($routeResult->routeExists);
		
		$request->setResource('/controller/');
		$routeResult = $this->node->findRouteFor($request);
		$this->assertFalse($routeResult->routeExists);
		
		$request->setResource('/controller/methodb/1');
		$routeResult = $this->node->findRouteFor($request);
		$this->assertFalse($routeResult->routeExists);
	}
	
	function testFindFailOnMethodSingleRoute() {
		$this->node->addRoute('test', $this->routes['MethodA'], '');
		$request = new Request();
		$request->method = Methods::POST;
		$request->setResource('/controller/methoda/');
		$routeResult = $this->node->findRouteFor($request);
		$this->assertTrue($routeResult->routeExists);
		$this->assertFalse($routeResult->methodIsSupported);
		$this->assertEquals($routeResult->acceptableMethods, $this->routes['MethodA']->methods);
	}
	
	// TODO: Tests for find success on multiple routes,
	// 		 Tests for parametric routes,
	//		 Tests for precedence
	//		 Refactor common test code.
	
	function tearDown() {
		unset($node);
	}
	
}

?>