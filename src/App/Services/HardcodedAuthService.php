<?php

namespace TestBlog\App\Services;

use TestBlog\Core\Http\IAuth;
use TestBlog\Core\Http\Request;

/**
 * Simple auth logic
 * TODO: something more clear
 */
class HardcodedAuthService implements IAuth
{
    /**
     * @var string
     */
    private $correctLogin = 'user';

    /**
     * @var string
     */
    private $correctPassword = 'pass';

    public function __construct()
    {
        session_start();
    }

    public function login($login, $password)
    {
        if ($login == $this->correctLogin && $password == $this->correctPassword) {
            $_SESSION['login'] = $login;
            $_SESSION['login_status'] = 1;
            return true;
        }
        return false;
    }

    /**
     * @return void
     */
    public function logout()
    {
        unset($_SESSION['login']);
        unset($_SESSION['login_status']);
    }

    /**
     * Check, if user logged in
     * @return bool
     */
    public function isLoggedIn()
    {
        return isset($_SESSION['login_status']) && $_SESSION['login_status'] == 1;
    }

}