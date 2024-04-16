<?php
require_once './model/Database.php';

class Model {
    protected $db;
    protected $table;
    protected $columns = [];

    public function __construct(){
        $this->db = new Database();
    }

    public function getTable(){
        return $this->table;
    }

    public function getColumns(){
        return $this->columns;
    }

    public function all(){
        $query = "SELECT * FROM $this->table";
        $result = $this->db->conn->query($query);
        $data = [];
        $data = $result->fetch_all(MYSQLI_ASSOC);
        // while($row = $result->fetch_assoc()){
        //     $data[] = $row;
        // }
        return $data;
    }


    public function find( $id){
        $query = "SELECT * FROM $this->table WHERE id = $id";
        $result = $this->db->conn->query($query);
        return $result->fetch_assoc();
    }


    public function create($data){
        $keys = implode(',', array_keys($data));
        $values = implode("','", array_values($data));
        $query = "INSERT INTO $this->table($keys) VALUES('$values')";
        return $this->db->conn->query($query);
    }


    public function update( $data, $id){
        $set = '';
        foreach($data as $key => $value){
            $set .= "$key = '$value',";
        }
        $set = rtrim($set, ',');
        $query = "UPDATE  $this->table SET $set WHERE id = $id";
        return $this->db->conn->query($query);
    }


    public function delete( $id){
        try{
            $query = "DELETE FROM  $this->table WHERE id = $id";
            $res = $this->db->conn->query($query);
            return $res ;
        }
        catch(Exception $e){
            return false;
        }
     
        
    }

    public function where( $column, $value){
        $query = "SELECT * FROM  $this->table WHERE $column = '$value'";
        $result = $this->db->conn->query($query);
        $data = [];
        while($row = $result->fetch_assoc()){
            $data[] = $row;
        }
        return $data;
    }
}

$model = new Model();