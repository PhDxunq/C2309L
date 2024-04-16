<?php
class UserModel extends Model{
    public function __construct(){
        parent::__construct();
        $this->table = 'users';
        $this->columns = ['username', 'password_hash', 'phone', 'type'];
    }

    public function auth($username, $password){
        $password = sha1($password);
        $query = "SELECT * FROM $this->table WHERE username = ? AND password_hash = ? AND type = 'admin'";
        $stmt = $this->db->conn->prepare($query);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
        if($user){
            return $user;
        }
       
        return null;
    }
}