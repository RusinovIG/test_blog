<?php

namespace TestBlog\App\Models;

use TestBlog\Core\Model;

/**
 * Blog post
 */
class Post extends Model
{
    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $content;

    /**
     * @var string
     */
    private $createdAt;

    /**
     * Post constructor.
     * @param int $id
     * @param string $title
     * @param string $content
     * @param string $createdAt
     */
    public function __construct($id, $title, $content, $createdAt)
    {
        parent::__construct($id);
        $this->title = $title;
        $this->content = $content;
        $this->createdAt = $createdAt;
    }

    /**
     * @return string
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function content()
    {
        return $this->content;
    }

    /**
     * @return string
     */
    public function createdAt()
    {
        return $this->createdAt;
    }
}