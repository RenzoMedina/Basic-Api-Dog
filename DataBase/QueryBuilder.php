<?php

namespace DataBase;

use DataBase\Connection;

class QueryBuilder
{

    protected $conn;

    public function __construct()
    {
        $this->conn = Connection::start();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM dog";

        try {
            $query = $this->conn->prepare($sql);
            $query->execute();
            $resul = $query->fetchAll(\PDO::FETCH_OBJ);
            return $resul;
        } catch (\PDOException $poe) {
            echo "Error : " . $poe->getMessage();
        }
    }

    public function getId($id)
    {
        $sql = "SELECT * FROM dog WHERE id = ?";

        try {
            $query = $this->conn->prepare($sql);
            $query->bindParam(1, $id);
            $query->execute();
            $resul = $query->fetch(\PDO::FETCH_OBJ);
            return $resul;
        } catch (\PDOException $poe) {
            echo "Error : " . $poe->getMessage();
        }
    }

    public function create($data)
    {
        $values = json_decode($data, true);
        $sql = "INSERT INTO dog (breed,origin,max_age,description) VALUES (?,?,?,?)";
        try {
            $query = $this->conn->prepare($sql);
            $query->bindParam(1, $values['breed']);
            $query->bindParam(2, $values['origin']);
            $query->bindParam(3, $values['max_age']);
            $query->bindParam(4, $values['description']);
            $query->execute();
        } catch (\PDOException $poe) {
            echo "Error : " . $poe->getMessage();
        }

    }
    public function update($id, $data)
    {
        $values = json_decode($data, true);
        $sql = "UPDATE dog set breed = ?, origin = ?, max_age =?, description = ?, update_at = CURRENT_TIMESTAMP WHERE id = ?";
        try {
            $query = $this->conn->prepare($sql);
            $query->bindParam(1, $values['breed']);
            $query->bindParam(2, $values['origin']);
            $query->bindParam(3, $values['max_age']);
            $query->bindParam(4, $values['description']);
            $query->bindParam(5, $id);
            $query->execute();
        } catch (\PDOException $poe) {
            echo "Error : " . $poe->getMessage();
        }
    }
    public function delete($id)
    {
        $sql = "DELETE FROM dog WHERE id = ?";
        try {
            $query = $this->conn->prepare($sql);
            $query->bindParam(1, $id);
            $query->execute();
            $resul = $query->fetch(\PDO::FETCH_OBJ);
            return $resul;
        } catch (\PDOException $poe) {
            echo "Error : " . $poe->getMessage();
        }
    }
}