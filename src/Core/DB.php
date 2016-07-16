<?php

namespace TestBlog\Core;

/**
 * DB wrapper
 */
class DB {
    /**
     * @var \PDO
     */
    private $pdo;
    
    /**
     * @param $dsn
     * @param $userName
     * @param $password
     */
    public function __construct($dsn, $userName, $password) {
        try {
            $this->pdo = new \PDO($dsn, $userName, $password);
        } catch (\PDOException $e) {
            die($e->getMessage());
        }
    }
    
}