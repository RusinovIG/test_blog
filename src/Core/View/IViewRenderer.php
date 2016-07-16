<?php

namespace TestBlog\Core\View;

/**
 * Interface for view renderers
 */
interface IViewRenderer
{
    /**
     * Render function
     * @param string $templateName
     * @param array $bindings
     * @return string
     */
    public function render($templateName, array $bindings = []);
}