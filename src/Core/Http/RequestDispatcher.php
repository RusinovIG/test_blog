<?php

namespace TestBlog\Core\Http;

class RequestDispatcher
{
    /**
     * @var Router
     */
    private $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function dispatch(Request $request)
    {
        $route = $this->router->findRoute($request);
        $controller = $this->getController($route);
    }

    private function getController(Route $route)
    {
        $controllerClass = ucfirst($route->controllerName());
    }
}