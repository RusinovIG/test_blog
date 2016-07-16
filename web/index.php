<?php

require __DIR__ . '/../bootstrap.php';

$request = \TestBlog\Core\Http\Request::fromGlobals();
/** @var \TestBlog\Core\Http\RequestDispatcher $requestDispatcher */
$requestDispatcher = $container['request_dispatcher'];
$requestDispatcher->dispatch($request);