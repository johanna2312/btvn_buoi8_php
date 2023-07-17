<?php

class Connection
{
    protected $host = 'localhost';
    protected $dbname = 'test';
    protected $username = 'root';
    protected $password = '';
    protected $db;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->dbname = 'test';
        $this->username = 'root';
        $this->password = '';

        try {
            $dsn = "mysql:host=$this->host;dbname=$this->dbname";
            $this->db = new PDO($dsn, $this->username, $this->password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            die();
        }
    }

    public function prepare($sql)
    {
        return $this->db->prepare($sql);
    }

    public function getDb()
    {
        return $this->db;
    }
}

class CategoryFunction extends Connection
{
    public function getData()
    {
        $sql = "SELECT * FROM category";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getOneData($data)
    {
        $sql = "SELECT * FROM category WHERE id = :id";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute($data);
        return $stmt->fetchAll();
    }

    public function createNewData($data)
    {
        $sql = "INSERT INTO category (name) VALUES (:name)";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute($data);
    }

    public function updateData($data)
    {
        $sql = "UPDATE category SET name = :name WHERE id = :id";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute($data);
    }

    public function deleteData($data)
    {
        $sql = "DELETE FROM category WHERE id = :id";
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute($data);
    }
}
?>