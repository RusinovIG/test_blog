<?php

namespace TestBlog\Core\Http;

/**
 * Object for storing request variables
 */
class Request
{
    /**
     * @var array
     */
    private $get;

    /**
     * @var array
     */
    private $post;

    /**
     * @var array
     */
    private $cookies;

    /**
     * @var array
     */
    private $server;

    /**
     * Request constructor.
     * @param array $get
     * @param array $post
     * @param array $cookies
     * @param array $server
     */
    public function __construct($get, $post, $cookies, $server)
    {
        $this->get = $get;
        $this->post = $post;
        $this->cookies = $cookies;
        $this->server = $server;
    }

    /**
     * Create request object from global variables
     * @return Request
     */
    public static function fromGlobals()
    {
        return new self($_GET, $_POST, $_COOKIE, $_SERVER);
    }

    /**
     * Returns get variable if exists, or null
     * @param string $key
     * @return string|null
     */
    public function get($key)
    {
        return isset($this->get[$key]) ? $this->get[$key] : null;
    }

    /**
     * Returns post variable if exists, or null
     * @param string $key
     * @return string|null
     */
    public function post($key)
    {
        return isset($this->post[$key]) ? $this->post[$key] : null;
    }

    /**
     * Returns cookie variable if exists, or null
     * @param string $key
     * @return string|null
     */
    public function cookie($key)
    {
        return isset($this->cookies[$key]) ? $this->cookies[$key] : null;
    }

    /**
     * Returns server variable if exists, or null
     * @param string $key
     * @return string|null
     */
    public function server($key)
    {
        return isset($this->server[$key]) ? $this->server[$key] : null;
    }

    /**
     * Return request uri
     * @return null|string
     */
    public function uri()
    {
        return $this->server('REQUEST_URI');
    }

    /**
     * Return request method
     * @return null|string
     */
    public function method()
    {
        return $this->server('REQUEST_METHOD');
    }
}