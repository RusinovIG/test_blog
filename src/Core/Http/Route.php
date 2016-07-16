<?php

namespace TestBlog\Core\Http;

/**
 * Route data object
 */
class Route
{
    /**
     * @var string
     */
    private $httpMethod;

    /**
     * @var string
     */
    private $pattern;

    /**
     * @var string
     */
    private $controllerName;

    /**
     * @var string
     */
    private $controllerMethod;

    /**
     * Route constructor.
     * @param string $httpMethod
     * @param string $pattern
     * @param string $controllerName
     * @param string $controllerMethod
     */
    public function __construct($httpMethod, $pattern, $controllerName, $controllerMethod)
    {
        $this->httpMethod = $httpMethod;
        $this->pattern = $pattern;
        $this->controllerName = $controllerName;
        $this->controllerMethod = $controllerMethod;
    }

    /**
     * @return string
     */
    public function controllerName()
    {
        return $this->controllerName;
    }

    /**
     * @return string
     */
    public function controllerMethod()
    {
        return $this->controllerMethod;
    }

    /**
     * Check if route matches request
     * @param Request $request
     * @return bool
     */
    public function matches(Request $request)
    {
        return preg_match($this->pattern, $request->uri()) &&
            $this->httpMethod == $request->method();
    }
}