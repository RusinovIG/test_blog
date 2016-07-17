<?php
// Simple routes file
$routes = [
    'index' => ['GET /' => 'homepage@index'],
    'login' => ['GET /login' => 'auth@index'],
    'auth' => ['POST /' => 'auth@auth'],
    'post_add' => ['GET /posts/add' => 'posts@add'],
    'post_save' => ['POST /posts/save' => 'posts@save'],
    'post_show' => ['GET /posts/(\d+)' => 'posts@show'],
    'comment_save' => ['POST /comments/add' => 'comments@save'],
];