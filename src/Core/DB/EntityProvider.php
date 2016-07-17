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
        $row = $this->dbDriver->fetch('SELECT * from ' . $this->table() . ' where id=?', ['id' => $id]);
        if (!$row) {
            throw new \RuntimeException('Can\'t find ' . $this->modelClass() . ' entity with id=' . $id);
        }
        return ($this->modelClass())::buildFromArray($row);
    }

    public function getAll()
    {
        $dataArray = $this->dbDriver->fetch_all('SELECT * from ' . $this->table() . ' ORDER BY id');
        $models = array_map(
            function ($row) {
                return ($this->modelClass())::buildFromArray($row);
            },
            $dataArray
        );
        return $models;
    }

    public function insert(Model $model)
    {
        $this->dbDriver->insert($this->table(), $model->toArray());
    }
}