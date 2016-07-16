<?php

namespace TestBlog\Core\DI;

/**
 * Simple DI container
 */
class Container implements \ArrayAccess
{
    /**
     * @var array
     */
    private $items = [];

    /**
     * @param string $offset
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->items[$offset]);
    }

    /**
     * @param string $offset
     * @return mixed
     */
    public function offsetGet($offset)
    {
        if (!isset($this->items[$offset])) {
            throw new \InvalidArgumentException('Item "' . $offset . '" is not defined');
        }

        // If callable, pass container as argument
        if (is_callable($this->items[$offset])) {
            return $this->items[$offset]($this);
        }

        return $this->items[$offset];
    }

    /**
     * @param string $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        $this->items[$offset] = $value;
    }

    /**
     * @param string $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->items[$offset]);
    }

}