<?php

namespace TestBlog\App\Models;

use TestBlog\Core\DB\Model;

/**
 * Post comment
 */
class Comment extends Model
{
    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * Comment constructor.
     * @param int $id
     * @param string $text
     * @param string $createdAt
     */
    public function __construct($id, $text, $createdAt)
    {
        parent::__construct($id);
        $this->text = $text;
        $this->createdAt = $createdAt;
    }

    /**
     * Return array of model data
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'text' => $this->text,
            'created_at' => $this->createdAt
        ];
    }
}