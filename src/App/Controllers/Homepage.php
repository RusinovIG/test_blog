<?php

namespace TestBlog\App\Controllers;

use TestBlog\App\Providers\PostsProvider;
use TestBlog\Core\Http\Controller;
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
     * @param PostsProvider $commentsProvider
     */
    public function __construct(IViewRenderer $viewRenderer, PostsProvider $commentsProvider)
    {
        parent::__construct($viewRenderer);
        $this->postsProvider = $commentsProvider;
    }

    /**
     * Main page
     */
    public function index()
    {
        $posts = $this->postsProvider->getAll();
        $this->view('index', compact('posts'));
    }
}