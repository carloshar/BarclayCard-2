<?php
namespace PHPBackend;

class EntryPoint {
    private $routes;

    public function __construct(\PHPBackend\Routes $routes) {
        $this->routes = $routes;
    }

    public function run() {
        session_start();
        $route = ltrim(explode('?', $_SERVER['REQUEST_URI'])[0], '/'); //finds which route to load based on the URL
        $routes = $this->routes->getRoutes($route);
        $method = $_SERVER['REQUEST_METHOD'];

        if (isset($routes[$route]['login'])) {
            $this->routes->checkLogin();
        }
        if (isset($routes[$route]['admin'])) {
            $this->routes->checkAdmin();
        }


        $controller = $routes[$route][$method]['controller'];
        $functionName = $routes[$route][$method]['function'];

        $page = $controller->$functionName();

        $output = $this->loadTemplate('../templates/' . $page['template'], $page['variables']); //loads the template based on what was passed in by the route

        $title = $page['title']; //sets page title

        require '../templates/layout.html.php';
    }

    public function loadTemplate($fileName, $templateVars) {
        extract($templateVars);
        ob_start();
        require $fileName;
        $contents = ob_get_clean();
        return $contents;
    }
}
