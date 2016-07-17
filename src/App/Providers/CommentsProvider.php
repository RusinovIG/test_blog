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

    public function getByPostId($id)
    {
        $dataArray = $this->dbDriver->fetchAll(
            'SELECT * FROM ' . $this->table() . ' WHERE post_id=:post_id ORDER BY id DESC',
            ['post_id' => $id]
        );
        $models = array_map(
            function ($row) {
                return $this->buildModelFromArray($row);
            },
            $dataArray
        );
        return $models;
    }

}