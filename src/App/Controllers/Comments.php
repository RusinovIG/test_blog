<?php

namespace TestBlog\App\Controllers;

use TestBlog\App\Models\Comment;
use TestBlog\App\Providers\CommentsProvider;
use TestBlog\Core\Http\Controller;
use TestBlog\Core\Http\Request;
use TestBlog\Core\View\IViewRenderer;

class Comments extends Controller
{
    /**
     * @var CommentsProvider
     */
    private $commentsProvider;

    /**
     * Posts constructor.
     * @param IViewRenderer $viewRenderer
     * @param CommentsProvider $commentsProvider
     */
    public function __construct(
        IViewRenderer $viewRenderer,
        CommentsProvider $commentsProvider
    ) {
        parent::__construct($viewRenderer);
        $this->commentsProvider = $commentsProvider;
    }

    /**
     * Saving comment
     * @param Request $request
     */
    public function save(Request $request)
    {
        $comment = Comment::buildFromArray([
            'post_id' => $request->post('post_id'),
            'text' => $request->post('text'),
            'created_at' => date('Y-m-d H:i:s')
        ]);
        $this->commentsProvider->save($comment);
        $this->redirect($request->referer() ?: '/');
    }
}