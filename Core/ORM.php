<?php

namespace Core;

use PDO;

class ORM extends Database
{
    public function create($table, $fields)
    {
        $executeArray = [];
        $values = '';

        $query = "INSERT INTO " . $table . "(";
        foreach ($fields as $key => $val) {
            $query .= $key . ", ";
            $values .= "?, ";
            array_push($executeArray, $val);
        }
        $query = substr($query, 0, -2) . ") VALUES (" . substr($values, 0, -2) . ")";

        $conn = $this->OpenCon();
        $req = $conn->prepare($query);
        $req->execute($executeArray);
        return $conn->lastInsertId();
    }

    public function read($table, $id)
    {
        $query = "SELECT * FROM $table WHERE id = ?";

        $req = $this->OpenCon()->prepare($query);
        $req->execute([$id]);
        return $req->fetch(PDO::FETCH_ASSOC);
    }

    public function update($table, $id, $fields)
    {
        $executeArray = [];

        $query = "UPDATE " . $table . " SET ";
        foreach ($fields as $key => $value) {
            $query .= $key . ' = ? , ';
            array_push($executeArray, $value);
        }
        $query = substr($query, 0, -2) . "WHERE id = ?";
        array_push($executeArray, $id);

        $req = $this->OpenCon()->prepare($query);
        return $req->execute($executeArray);
    }

    public function delete($table, $id)
    {
        $executeArray = [];

        $query = "DELETE FROM " . $table . " WHERE id = ?";
        array_push($executeArray, $id);

        $req = $this->OpenCon()->prepare($query);
        return $req->execute($executeArray);
    }

    public function find($table, $params = ['WHERE' => '', 'ORDER BY' => 'id ASC', 'LIMIT' => ''])
    {
        $query = "SELECT * FROM $table ";
        $executeArray = [];

        foreach($params as $key => $val){
            if(!empty($val)){
                if($key == 'WHERE'){
                    $query .= 'WHERE id = ? ';
                    $executeArray = [$val];
                }else{
                    $query .= "$key $val ";
                }
            }
        }

        $req = $this->OpenCon()->prepare($query);
        $req->execute($executeArray);
        return $req->fetchAll(PDO::FETCH_ASSOC);
    }
}
