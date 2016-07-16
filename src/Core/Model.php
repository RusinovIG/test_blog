<?php
/**
 * Created by PhpStorm.
 * User: garun
 * Date: 16.07.16
 * Time: 23:41
 */

namespace TestBlog\Core;

/**
 * Base model class
 */
abstract class Model
{
    /**
     * @var int
     */
    protected $id;

    /**
     * Model constructor.
     * @param int $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @param array $data
     * @return object
     */
    public static function buildFromArray(array $data)
    {
        $class = new \ReflectionClass(static::class);
        $arguments = [];
        foreach ($class->getConstructor()->getParameters() as $parameter) {
            $parameterName = $parameter->getName();
            $arguments[] = isset($data[$parameterName]) ? $data[$parameterName] : null;
        }
        return $class->newInstanceArgs($arguments);
    }

    /**
     * @return int
     */
    public function id()
    {
        return $this->id;
    }
}