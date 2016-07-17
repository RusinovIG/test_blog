<?php

namespace TestBlog\App\Controllers;

use TestBlog\App\Providers\PostsProvider;
use TestBlog\Core\Http\Controller;
use TestBlog\Core\Http\IAuth;
use TestBlog\Core\View\IViewRenderer;

/**
 * Main page controller
 */
class Homepage extends Controller
{
    /**
     * @var PostsProvider
     */
    private $postsProvider;

    /**
     * Homepage constructor.
     * @param IViewRenderer $viewRenderer
     * @param IAuth $authService
     * @param PostsProvider $commentsProvider
     */
    public function __construct(IViewRenderer $viewRenderer, IAuth $authService, PostsProvider $commentsProvider)
    {
        parent::__construct($viewRenderer, $authService);
        $this->postsProvider = $commentsProvider;
    }

    /**
     * Main page
     */
    public function index()
    {
        $posts = $this->postsProvider->getAll();
        $isLoggedIn = $this->authService->isLoggedIn();
        $this->view('index', compact('posts', 'isLoggedIn'));
    }
}