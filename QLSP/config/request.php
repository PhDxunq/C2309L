<?php 

class Request{
    public function __construct(){
    }
    static function get($key){
        return isset($_GET[$key]) ? $_GET[$key] : null;
    }
    static function post($key){
        return isset($_POST[$key]) ? $_POST[$key] : null;
    }
    static function isPost(){
        return $_SERVER['REQUEST_METHOD'] == 'POST';
    }

    static function isGet(){
        return $_SERVER['REQUEST_METHOD'] == 'GET';
    }


}