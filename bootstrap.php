<?php

// Default autoloader
require 'autoload.php';

$container = new \TestBlog\Core\DI\Container();

$container['DB'] = function ($c) {
    $dsn = 'mysql:host=' . $c['db']['server_name'] . ';dbname=' . $c['db']['db_name'];
    return new \TestBlog\Core\DB($dsn, $c['db']['user'], $c['db']['password']);
};