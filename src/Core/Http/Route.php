<?php

namespace TestBlog\Core\Http;

/**
 * Route data object
 */
class Route
{
    /**
     * Http method
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $pattern;

    /**
     * @var string
     */
    private $controller;

    /**
     * @var string
     */
    private $action;

    /**
     * Route constructor.
     * @param string $method
     * @param string $pattern
     * @param string $controller
     * @param string $action
     */
    public function __construct($method, $pattern, $controller, $action)
    {
        $this->method = $method;
        $this->pattern = $pattern;
        $this->controller = $controller;
        $this->action = $action;
    }

    /**
     * @return string
     */
    public function controller()
    {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function action()
    {
        return $this->action;
    }

    /**
     * @return string
     */
    public function method()
    {
        return $this->method;
    }

    /**
     * Check if route matches request
     * @param Request $request
     * @return bool
     */
    public function matches(Request $request)
    {
        return preg_match($this->pattern, $request->uri()) &&
            $this->method() == $request->method();
    }

    /**
     * Returns array of route parameters values
     * @param Request $request
     * @return array
     */
    public function getRouteParameters(Request $request)
    {
        if (preg_match($this->pattern, $request->uri(), $arguments)) {
            array_shift($arguments);
            return $arguments;
        }
        return [];
    }
}