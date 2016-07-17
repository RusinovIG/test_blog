<?php

namespace TestBlog\Core\Http;

/**
 * Interface for auth service
 */
interface IAuth
{
    /**
     * @param string $login
     * @param string $password
     * @return bool
     */
    public function login($login, $password);

    /**
     * @return void
     */
    public function logout();

    /**
     * Check, if user logged in
     * @return bool
     */
    public function isLoggedIn();
}