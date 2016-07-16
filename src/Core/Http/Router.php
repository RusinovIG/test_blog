<?php

namespace TestBlog\Core\Http;

/**
 * Simple router
 */
class Router
{
    /**
     * array of routes
     * @var Route[]
     */
    private $routes = [];

    /**
     * Router constructor.
     * @param array $routesArray
     */
    public function __construct(array $routesArray)
    {
        foreach ($routesArray as $key => $data) {
            $route = key($data);
            $controllerInfo = current($data);

            list($httpMethod, $pattern) = explode(' ', $route);
            $pattern = $pattern = '/^' . str_replace('/', '\/', $pattern) . '$/';
            list($controllerName, $controllerMethod) = explode('@', $controllerInfo);

            $this->routes[$key] = new Route($httpMethod, $pattern, $controllerName, $controllerMethod);
        }
    }

    /**
     * @param Request $request
     * @return Route
     */
    public function findRoute(Request $request)
    {
        foreach ($this->routes as $route) {
            if ($route->matches($request)) {
                return $route;
            }
        }
        throw new \Exception('Route not found');
    }
}