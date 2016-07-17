<?php
/**
 * Created by PhpStorm.
 * User: garun
 * Date: 16.07.16
 * Time: 23:41
 */

namespace TestBlog\Core\DB;

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
     * @return static
     */
    public static function buildFromArray(array $data)
    {
        $class = new \ReflectionClass(static::class);
        $arguments = [];
        foreach ($class->getConstructor()->getParameters() as $parameter) {
            $parameterName = $parameter->getName();
            $dataAttr = self::camelCaseToUnderscore($parameterName);
            $arguments[] = isset($data[$dataAttr]) ? $data[$dataAttr] : null;
        }
        return $class->newInstanceArgs($arguments);
    }

    /**
     * Convert camel case string to underscored
     * @param string $string
     * @return string
     */
    private static function camelCaseToUnderscore($string)
    {
        return ltrim(strtolower(preg_replace('/[A-Z]/', '_$0', $string)), '_');
    }

    /**
     * @return int
     */
    public function id()
    {
        return $this->id;
    }

    /**
     * Return array of model data
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->id
        ];
    }
}