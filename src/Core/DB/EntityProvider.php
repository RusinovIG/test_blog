<?php
/**
 * Created by PhpStorm.
 * User: garun
 * Date: 17.07.16
 * Time: 20:58
 */

namespace TestBlog\Core\DB;

/**
 * Base class for entity providers
 */
abstract class EntityProvider
{
    /**
     * @var Driver
     */
    protected $dbDriver;

    /**
     * EntityProvider constructor.
     * @param Driver $dbDriver
     */
    public function __construct(Driver $dbDriver)
    {
        $this->dbDriver = $dbDriver;
    }

    /**
     * Return current model table
     * @return string
     */
    abstract protected function table();

    /**
     * Model class name
     * @return string
     */
    abstract protected function modelClass();

    /**
     * @param int $id
     * @return Model
     */
    public function getById($id)
    {
        $row = $this->dbDriver->fetch('SELECT * FROM ' . $this->table() . ' where id=:id', ['id' => (int)$id]);
        if (!$row) {
            throw new \RuntimeException('Can\'t find ' . $this->modelClass() . ' entity with id=' . $id);
        }
        return $this->buildModelFromArray($row);
    }

    public function getAll()
    {
        $dataArray = $this->dbDriver->fetchAll('SELECT * FROM ' . $this->table() . ' ORDER BY id DESC');
        $models = array_map(
            function ($row) {
                return $this->buildModelFromArray($row);
            },
            $dataArray
        );
        return $models;
    }

    /**
     * @param Model $model
     * @return Model
     */
    public function save(Model $model)
    {
        $data = $model->toArray();
        $id = $this->dbDriver->insert($this->table(), $data);
        $data['id'] = $id;
        return $this->buildModelFromArray($data);
    }

    /**
     * @param array $data
     * @return Model
     */
    protected function buildModelFromArray(array $data)
    {
        return ($this->modelClass())::buildFromArray($data);
    }
}