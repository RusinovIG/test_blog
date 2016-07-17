<?php

namespace TestBlog\Core\DB;

/**
 * DB wrapper
 */
class Driver {
    /**
     * @var \PDO
     */
    private $pdo;
    
    /**
     * @param $dsn
     * @param $userName
     * @param $password
     * @throws \PDOException
     */
    public function __construct($dsn, $userName, $password)
    {
        $this->pdo = new \PDO($dsn, $userName, $password);
    }

    /**
     * @param $sql
     * @return \PDOStatement
     */
    public function select($sql)
    {
        $res = $this->pdo->query($sql);
        return $res;
    }

    /**
     * @param $sql
     * @param array $params
     * @return mixed
     */
    public function fetch($sql, array $params = [])
    {
        $statement = $this->execute($sql, $params);
        return $statement->fetch(\PDO::FETCH_ASSOC);
    }

    /**
     * @param $sql
     * @param array $params
     * @return array
     */
    public function fetch_all($sql, array $params = [])
    {
        $statement = $this->execute($sql, $params);
        return $statement->fetchALL(\PDO::FETCH_ASSOC);
    }

    /**
     * @param string $table
     * @param array $data
     * @return string
     */
    public function insert($table, array $data)
    {
        $fields = "";
        $fieldsValues = "";
        foreach (array_keys($data) as $key) {
            $fields .= (($fields == "") ? '' : ',') . $key;
            $fieldsValues .= (($fieldsValues == "") ? ':' : ',:') . $key;
        }
        $query = "INSERT " . $table . " (" . $fields . ") VALUES (" . $fieldsValues . ")";
        $this->execute($query, $data);
        return $this->pdo->lastInsertId();
    }

    /**
     * @param string $sql
     * @param array $params
     * @return \PDOStatement
     */
    public function execute($sql, array $params = [])
    {
        $statement = $this->pdo->prepare($sql);
        $statement->execute($params);
        return $statement;
    }
}