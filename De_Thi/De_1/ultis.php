<?php 
 function randompass(){
    $character = '0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
    $password  = '';
    for ($i = 0; $i < 8; $i++) {
        $index = rand(0,strlen($character) -1);
        $password.= $character[$index];
    } 
    return $password;
 }
?>