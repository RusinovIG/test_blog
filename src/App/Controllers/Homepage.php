<?php

namespace TestBlog\App\Controllers;

use TestBlog\Core\Http\Controller;

/**
 * Main page controller
 */
class Homepage extends Controller
{

    /**
     * Main page
     */
    public function index()
    {
        $this->view('index', ['username' => 'Igor']);
    }
}