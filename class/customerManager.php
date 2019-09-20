<?php


class customerManager
{
    protected $conn;

    public function __construct()
    {
        $db = new DBconnect();
        $this->conn = $db->connect();
    }

    public function getAll($table)
    {
        $sql = "SELECT * FROM $table";
        $stmt = $this->conn->query($sql);
        $result = $stmt->fetchAll();
        return $result;
    }

    public function getEach($table, $id)
    {
        $sql = "SELECT * FROM $table WHERE id=$id";
        $stmt = $this->conn->query($sql);
        $result = [];
        foreach ($stmt->fetchAll() as $row) {
            array_push($result, $row);
        }
        return $result;
    }

    public function convertArraytoObject($arr)
    {
        $customers = [];
        foreach ($arr as $item) {
            $customer = new Customer($item['name'], $item['email'], $item['address']);
            $customer->setId($item['id']);
            array_push($customers, $customer);
        }
        return $customers;
    }

    public function delete($table, $id)
    {
        $sql = "DELETE FROM $table WHERE id=$id";
        $this->conn->exec($sql);
    }

    public function update($table, $data, $id)
    {
        $sql = "UPDATE $table SET $data WHERE id=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array_values($data));

    }

    public function insert($table, $data)
    {
        $fiels = [];
        $placehoder = [];
        foreach ($data as $key => $value) {
            array_push($fiels, $key);
            array_push($placehoder, '?');
        }
        $fiels = implode(',', $fiels);
        $placehoder = implode(',', $placehoder);
        $sql = "INSERT INTO $table ($fiels) values ($placehoder)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(array_values($data));

    }
}