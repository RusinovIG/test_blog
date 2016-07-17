<?php

namespace TestBlog\App\Controllers;

use TestBlog\App\Models\Post;
use TestBlog\App\Providers\CommentsProvider;
use TestBlog\App\Providers\PostsProvider;
use TestBlog\Core\Http\Controller;
use TestBlog\Core\Http\IAuth;
use TestBlog\Core\Http\Request;
use TestBlog\Core\View\IViewRenderer;

class Posts extends Controller
{
    /**
     * @var PostsProvider
     */
    private $postsProvider;

    /**
     * @var CommentsProvider
     */
    private $commentsProvider;

    /**
     * Posts constructor.
     * @param IViewRenderer $viewRenderer
     * @param IAuth $authService
     * @param PostsProvider $postsProvider
     * @param CommentsProvider $commentsProvider
     */
    public function __construct(
        IViewRenderer $viewRenderer,
        IAuth $authService,
        PostsProvider $postsProvider,
        CommentsProvider $commentsProvider
    ) {
        parent::__construct($viewRenderer, $authService);
        $this->postsProvider = $postsProvider;
        $this->commentsProvider = $commentsProvider;
    }

    /**
     * @param int $id
     */
    public function show($id)
    {
        $post = $this->postsProvider->getById($id);
        $comments = $this->commentsProvider->getByPostId($post->id());
        $this->view('posts/show', compact('post', 'comments'));
    }

    /**
     * New post form
     */
    public function add()
    {
        $isLoggedIn = $this->authService->isLoggedIn();
        $this->view('posts/add', compact('isLoggedIn'));
    }

    /**
     * Saving post
     * @param Request $request
     */
    public function save(Request $request)
    {
        if (!$this->authService->isLoggedIn()) {
            $this->redirect('/');
            return;
        }
        $post = Post::buildFromArray([
            'title' => $request->post('title'),
            'content' => $request->post('content'),
            'created_at' => date('Y-m-d H:i:s')
        ]);
        $this->postsProvider->save($post);
        $this->redirect('/');
    }
}