<?php

namespace Core;

class ORM
{
    public static function create($table, $fields)
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

        $conn = Database::OpenCon();
        $req = $conn->prepare($query);
        $req->execute($executeArray);
        return $conn->lastInsertId();
    }

    public static function read($table, $id)
    {
        $query = "SELECT * FROM $table WHERE id = ?";

        $req = Database::OpenCon()->prepare($query);
        $req->execute([$id]);
        return $req->fetch(\PDO::FETCH_ASSOC);
    }

    public static function update($table, $id, $fields)
    {
        $executeArray = [];

        $query = "UPDATE " . $table . " SET ";
        foreach ($fields as $key => $value) {
            $query .= $key . ' = ? , ';
            array_push($executeArray, $value);
        }
        $query = substr($query, 0, -2) . "WHERE id = ?";
        array_push($executeArray, $id);

        $req = Database::OpenCon()->prepare($query);
        return $req->execute($executeArray);
    }

    public static function delete($table, $id)
    {
        $query = "DELETE FROM " . $table . " WHERE id = ?";
        $executeArray = [$id];
        $req = Database::OpenCon()->prepare($query);
        return $req->execute($executeArray);
    }

    //ORM::find('users', ['email' => 'golf@epitech.eu', 'id' => [9, 'AND'], ['ORDER BY' => 'id ASC', 'LIMIT' => '']);
    public static function find($table, $conditions = null, $params = ['ORDER BY' => 'id ASC', 'LIMIT' => ''])
    {
        $executeArray = [];
        $query = "SELECT * FROM $table ";

        if ($conditions != null) {
            $query .= "WHERE ";
            foreach ($conditions as $key => $value) {
                if (!is_array($value)) {
                    $query .= $key . ' = ? ';
                    array_push($executeArray, $value);
                } else {
                    $query .=  $value[1] . ' ' . $key . ' = ? ';
                    array_push($executeArray, $value[0]);
                }
            }
        }

        foreach ($params as $key => $val) {
            if (!empty($val)) {
                $query .= "$key $val ";
            }
        }

        echo $query;
        $req = Database::OpenCon()->prepare($query);
        $req->execute($executeArray);
        return $req->fetchAll(\PDO::FETCH_ASSOC);
    }
}
