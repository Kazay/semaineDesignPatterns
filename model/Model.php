<?php

namespace Model;

abstract class Model {

    protected $dbConnec;

    function __construct()
    {
        try {
            $this->dbConnec = new \PDO('mysql:host=localhost;dbname=' . DBNAME, DBUSER, DBPASS, [
            \PDO::ATTR_ERRMODE  => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            ]);
        } catch(\PDOException $e) {
            throw new \PDOException($e->getMessage(), $e->getCode());
        }
    }

}