<?php

// Default autoloader
require 'autoload.php';

$container = new \TestBlog\Core\DI\Container();

// Load $config array
require  __DIR__ . '/config.php';
$container['config'] = $config;

// Load $routes array
require  __DIR__ . '/routes.php';
$container['router'] = function () use ($routes) {
    return new \TestBlog\Core\Http\Router($routes);
};

$container['view_renderer'] = function ($c) {
    return new \TestBlog\Core\View\PhpViewRenderer($c['config']['template_dir']);
};

$container['request_dispatcher'] = function ($c) {
    return new \TestBlog\Core\Http\RequestDispatcher($c, $c['router']);
};

$container['db_driver'] = function ($c) {
    $dsn = 'mysql:host=' . $c['config']['db']['server_name'] . ';dbname=' . $c['config']['db']['db_name'];
    return new \TestBlog\Core\DB\Driver($dsn, $c['config']['db']['user'], $c['config']['db']['password']);
};

$container['posts_provider'] = function ($c) {
    return new \TestBlog\App\Providers\PostsProvider($c['db_driver']);
};

/**
 * Controllers section
 * All application controllers should be registered here
 */
$container[\TestBlog\App\Controllers\Homepage::class] = function ($c) {
    return new \TestBlog\App\Controllers\Homepage($c['view_renderer']);
};

$container[\TestBlog\App\Controllers\Posts::class] = function ($c) {
    return new \TestBlog\App\Controllers\Posts($c['view_renderer'], $c['posts_provider']);
};