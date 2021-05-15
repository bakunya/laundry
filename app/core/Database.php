<?php

class Database {
    private $host = HOST;
    private $user = USER;
    private $password = PASSWORD;
    private $db_name = DB_NAME;

    private $db_handle;
    private $statement;

    public function __construct() {
        // database source name
        $dsn = "mysql:host=" . $this->host . ";dbname=" . $this->db_name;

        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->db_handle = new PDO($dsn, $this->user, $this->password, $options);
        } catch (PDOException $err) {
            die($err->getMessage());
        }
    }

    public function query($query) {
        $this->statement = $this->db_handle->prepare($query);
    }

    public function bind($param, $value, $type = null) {
        if (is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;            
                default:
                    $type = PDO::PARAM_STR;
                    break;
            }
        }

        $this->statement->bindValue($param, htmlspecialchars($value), $type);
    }

    public function execute() {
        $this->statement->execute();
    }
    
    public function resultSet() {
        $this->execute();
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function result() {
        $this->execute();
        return $this->statement->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * counting changes row during update or insert sql
     */
    public function rowCount() {
        return $this->statement->rowCount();
    }
}