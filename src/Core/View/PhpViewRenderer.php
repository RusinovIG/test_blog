<?php

namespace TestBlog\Core\View;

/**
 * Renderer of php Templates
 */
class PhpViewRenderer implements IViewRenderer
{
    /**
     * Path to directory with Templates
     * @var string
     */
    private $templateDir;

    /**
     * PhpViewRenderer constructor.
     * @param $templateDir
     */
    public function __construct($templateDir)
    {
        $this->templateDir = $templateDir;
    }

    /**
     * @param string $templateName
     * @param array $bindings
     * @return string
     */
    public function render($templateName, array $bindings = [])
    {
        extract($bindings);

        ob_start();

        $templatePath = $this->getTemplatePath($templateName);
        if (is_readable($templatePath)) {
            require $templatePath;
        } else {
            throw new \InvalidArgumentException('Template "' . $templateName . '" is not found.');
        }

        $content = ob_get_contents();
        ob_end_clean();

        return $content;
    }

    private function getTemplatePath($templateName)
    {
        return $this->templateDir . '/' . $templateName . '.php';
    }
}