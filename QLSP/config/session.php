<?php
class Session{
    public static function set($key, $value){
        $_SESSION[$key] = $value;
    }

    public static function get($key){
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

    public static function delete($key){
        unset($_SESSION[$key]);
    }

    public static function destroy(){
        session_destroy();
    }

    public static function setFlash($key, $message){
        $_SESSION[$key] = $message;
    }

    public static function getFlash($key){
        $message = $_SESSION[$key];
        unset($_SESSION[$key]);
        return $message;
    }
}