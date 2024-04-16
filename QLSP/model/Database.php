<?php 

class Database{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $dbname = "shopdb";
    public $conn;

    public function __construct(){
        // $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->user, $this->pass);
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
    }

}