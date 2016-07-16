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

$container['request_dispatcher'] = function ($c) {
    return new \TestBlog\Core\Http\RequestDispatcher($c['router']);
};

$container['DB'] = function ($c) {
    $dsn = 'mysql:host=' . $c['config']['db']['server_name'] . ';dbname=' . $c['config']['db']['db_name'];
    return new \TestBlog\Core\DB($dsn, $c['config']['db']['user'], $c['config']['db']['password']);
};