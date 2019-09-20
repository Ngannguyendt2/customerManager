<?php


class DBconnect
{
    private $dsn;
    private $user;
    private $password;

    public function __construct()
    {
        $this->dsn = "mysql:host=localhost;dbname=customerManager";
        $this->user = "root";
        $this->password = '123456@Abc';
    }

    public function connect()
    {
        $conn = null;
        try {
            $conn = new PDO($this->dsn, $this->user, $this->password);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        return $conn;
    }
}