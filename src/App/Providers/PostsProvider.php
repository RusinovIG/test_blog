<?php

namespace TestBlog\App\Providers;

use TestBlog\App\Models\Post;
use TestBlog\Core\DB\EntityProvider;

/**
 * Blog posts provider
 */
class PostsProvider extends EntityProvider
{
    /**
     * Return current model table
     * @return string
     */
    protected function table()
    {
        return 'posts';
    }

    /**
     * Model class name
     * @return string
     */
    protected function modelClass()
    {
        return Post::class;
    }

}