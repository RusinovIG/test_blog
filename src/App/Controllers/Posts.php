<?php

namespace TestBlog\App\Controllers;

use TestBlog\App\Models\Post;
use TestBlog\App\Providers\CommentsProvider;
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
     * @var CommentsProvider
     */
    private $commentsProvider;

    /**
     * Posts constructor.
     * @param IViewRenderer $viewRenderer
     * @param PostsProvider $postsProvider
     * @param CommentsProvider $commentsProvider
     */
    public function __construct(
        IViewRenderer $viewRenderer,
        PostsProvider $postsProvider,
        CommentsProvider $commentsProvider
    ) {
        parent::__construct($viewRenderer);
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
        $this->view('posts/add');
    }

    /**
     * Saving post
     * @param Request $request
     */
    public function save(Request $request)
    {
        $post = Post::buildFromArray([
            'title' => $request->post('title'),
            'content' => $request->post('content'),
            'created_at' => date('Y-m-d H:i:s')
        ]);
        $this->postsProvider->save($post);
        $this->redirect('/');
    }
}