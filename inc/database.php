<?php

class Database{

    public $host   = 'localhost';
    public $user   = 'root';
    public $pass   = '';
    public $dbname = 'ecomphp';
    public $conn;

    public function __construct()
    {
        $this->conn = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->dbname
        );

    }



}


?>