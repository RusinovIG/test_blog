<?php
// Simple routes file
$routes = [
    'index' => ['GET /' => 'homepage@index'],
    'login' => ['GET /login' => 'auth@index'],
    'auth' => ['POST /' => 'auth@auth'],
    'post_add' => ['GET /posts/add' => 'posts@add'],
    'post_show' => ['GET /posts/(\d+)' => 'posts@show'],
    'post_save' => ['POST /posts/(\d+)' => 'posts@save'],
    'comment_save' => ['POST /comments/add' => 'comments@save'],
];