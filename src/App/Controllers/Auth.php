<?php

namespace TestBlog\App\Controllers;

use TestBlog\Core\Http\Controller;
use TestBlog\Core\Http\Request;

/**
 * Auth controller
 */
class Auth extends Controller
{

    public function index()
    {
        $this->view('login');
    }

    public function auth(Request $request)
    {
        $login = $request->post('login');
        $password = $request->post('password');
        if ($this->authService->login($login, $password)) {
            $this->redirect('/');
        } else {
            $this->redirect($request->referer() ?: '/');
        }
    }

    public function logout()
    {
        $this->authService->logout();
        $this->redirect('/');
    }
}