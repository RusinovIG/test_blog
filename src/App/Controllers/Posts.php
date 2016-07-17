<?php
/**
 * Created by PhpStorm.
 * User: garun
 * Date: 17.07.16
 * Time: 21:36
 */

namespace TestBlog\App\Controllers;

use TestBlog\App\Providers\PostsProvider;
use TestBlog\Core\Http\Controller;
use TestBlog\Core\Http\Request;
use TestBlog\Core\View\IViewRenderer;

class Posts extends Controller
{
    /**
     * @var PostsProvider
     */
    private $postsProvider;

    /**
     * Posts constructor.
     * @param IViewRenderer $viewRenderer
     * @param PostsProvider $postsProvider
     */
    public function __construct(
        IViewRenderer $viewRenderer,
        PostsProvider $postsProvider
    ) {
        parent::__construct($viewRenderer);
        $this->postsProvider = $postsProvider;
    }

    /**
     * New post form
     */
    public function add()
    {
        $this->view('posts/add');
    }

    /**
     * Saving post
     * @param Request $request
     */
    public function save(Request $request)
    {
        // Save post
        $this->redirect('/');
    }
}