<?php

namespace TestBlog\Core\Http;

use TestBlog\Core\DI\Container;

class RequestDispatcher
{
    /**
     * @var Container
     */
    private $container;

    /**
     * @var Router
     */
    private $router;

    public function __construct(Container $container, Router $router)
    {
        $this->container = $container;
        $this->router = $router;
    }

    public function dispatch(Request $request)
    {
        $route = $this->router->findRoute($request);
        $controller = $this->getController($route);

        $action = $route->action();
        $arguments = $route->getRouteParameters($request);
        $arguments[] = $request;
        $this->runControllerAction($controller, $action, $arguments);
    }

    /**
     * @param Route $route
     * @return Controller
     */
    private function getController(Route $route)
    {
        $controllerClass = '\\TestBlog\\App\\Controllers\\' . ucfirst($route->controller());
        $class = new \ReflectionClass($controllerClass);
        if (!$class->isSubclassOf(Controller::class)) {
            throw new \InvalidArgumentException($class->getName() . ' is not a Controller instance');
        }

        if (!isset($this->container[$class->getName()])) {
            throw new \RuntimeException($class->getName() . ' is not found in DI container');
        }

        return $this->container[$class->getName()];
    }

    /**
     * @param Controller $controller
     * @param string $action
     * @param string $arguments
     */
    private function runControllerAction(Controller $controller, $action, $arguments)
    {
        call_user_func_array([$controller, $action], $arguments);
    }
}