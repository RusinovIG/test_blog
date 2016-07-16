<?php

$sourceDir = __DIR__ . '/src/';
$rootNamespace = 'TestBlog';

/**
 * @param string $class The fully qualified class name.
 * @return void
 */
spl_autoload_register(
    function ($className) use ($sourceDir, $rootNamespace) {
        $className = str_replace($rootNamespace . '\\', '\\', $className);
        $pathToClass = $sourceDir . '/' . str_replace('\\', '/', $className).'.php';
        if (file_exists($pathToClass)) {
            require $pathToClass;
            return;
        }
    }
);