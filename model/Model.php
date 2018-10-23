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

    public function getAll( $columns = [] , $order = '' )
    {
        $columnsToRetrieve = '*';

        if(count($columns > 0))
        {
            foreach($columns as $key => $element)
            {
                reset($columns);
                if ($key === key($columns))
                    $columnsToRetrieve = $element;
                else
                    $columnsToRetrieve .= ', ' . $element;
            }
        }
       
        $sql = 'SELECT ' . $columnsToRetrieve . ' FROM ' . $this->table;

        if($order != '')
        $sql .= ' ORDER BY `' . $order . '`';

        $sth = $this->dbConnec->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
        $sth->execute();
        return $sth->fetchAll();
    }

    public function getOne($column, $value)
    {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE ' . $column . ' = :value LIMIT 1';
        $sth = $this->dbConnec->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
        $sth->execute(['value' => $value]);
        $result = $sth->fetch();

        if($result !== NULL)
            return $result;
        else
            return false;
    }

    public function getOneById($id)
    {
        $sql = 'SELECT * FROM ' . $this->table . ' WHERE id = ' . $id . ' LIMIT 1';
        $sth = $this->dbConnec->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));
        $sth->execute();
        return $sth->fetch();
    }

    public function update($data)
    {
        $return = FALSE;
        $querySet = '';

        foreach($data as $key => $value)
        {
            if($key != 'id')
            {
                $querySet .= '`' . $key . '` = "' . addslashes($value) . '",';
            }
        }
        $querySet = substr($querySet, 0, -1);

        $sql = 'UPDATE ' . $this->table . ' SET ' . $querySet . '  WHERE id = ' . $data['id'] . ' LIMIT 1';
        $sth = $this->dbConnec->prepare($sql, array(\PDO::ATTR_CURSOR => \PDO::CURSOR_FWDONLY));    
        $sth->execute();
    }

}