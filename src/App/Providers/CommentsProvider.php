<?php

namespace TestBlog\App\Providers;

use TestBlog\App\Models\Comment;
use TestBlog\Core\DB\EntityProvider;

/**
 * Post comments provider
 */
class CommentsProvider extends EntityProvider
{
    /**
     * Return current model table
     * @return string
     */
    protected function table()
    {
        return 'comments';
    }

    /**
     * Model class name
     * @return string
     */
    protected function modelClass()
    {
        return Comment::class;
    }

}