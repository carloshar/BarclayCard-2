<?php
namespace Backend;
class EntryPoint {
	private $routes;

	public function __construct(Routes $routes) {
		$this->routes = $routes;
	}

	public function run() {
		$route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/');

		$routes = $this->routes->getRoutes(); // this gets the array of routes from the Routes.php
		$method = $_SERVER['REQUEST_METHOD']; //This collects the method used by the server GET/POST

		if (isset($routes[$route]['login'])) { //If needs to be logged in  
			$this->routes->checkLogin();			
		}
		   
		$controller = $routes[$route][$method]['controller']; //This finds the controller stated for the route and method previously described
		$functionName = $routes[$route][$method]['function']; //This finds the function stated for the route and method previously described
		$page = $controller->$functionName();
		

		$output = $this->loadTemplate('../templates/' . $page['template'], $page['variables']);

		$title = $page['title'];

		require  '../templates/layout.html.php';
	}

	public function loadTemplate($fileName, $templateVars) {
		extract($templateVars);
		ob_start();
		require $fileName;
		$contents = ob_get_clean();
		return $contents;
	}
}