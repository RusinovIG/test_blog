<?php

namespace TestBlog\Core\Http;

use TestBlog\Core\View\IViewRenderer;

/**
 * Base controller class
 */
abstract class Controller
{
    /**
     * @var IViewRenderer
     */
    private $viewRenderer;

    /**
     * Controller constructor.
     * @param IViewRenderer $viewRenderer
     */
    public function __construct(IViewRenderer $viewRenderer)
    {
        $this->viewRenderer = $viewRenderer;
    }

    /**
     * @param string $template
     * @param array $bindings
     */
    protected function view($template, $bindings = [])
    {
        echo $this->viewRenderer->render($template, $bindings);
    }

    /**
     * Redirect to url
     * @param string $url
     * @param int $status
     */
    protected function redirect($url, $status = 301)
    {
        header('Location: ' . $url, true, $status);
        return;
    }
}