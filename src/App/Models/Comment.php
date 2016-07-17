<?php

namespace TestBlog\App\Models;

use TestBlog\Core\DB\Model;

/**
 * Post comment
 */
class Comment extends Model
{
    /**
     * @var int
     */
    private $postId;

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
    public function __construct($id, $postId, $text, $createdAt)
    {
        parent::__construct($id);
        $this->postId = $postId;
        $this->text = $text;
        $this->createdAt = $createdAt;
    }

    /**
     * @return int
     */
    public function postId()
    {
        return $this->postId;
    }

    /**
     * @return string
     */
    public function text()
    {
        return $this->text;
    }

    /**
     * @return string
     */
    public function createdAt()
    {
        return $this->createdAt;
    }

    /**
     * Return array of model data
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->id,
            'post_id' => $this->postId,
            'text' => $this->text,
            'created_at' => $this->createdAt
        ];
    }
}