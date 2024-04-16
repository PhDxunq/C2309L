<?php

class Controller{

    public function view($view, $data = []){
        // if(file_exists('./view/'.$view.'.php')){
        //     require_once './view/'.$view.'.php';
        // }else{
        //     echo '404 - Not found';
        // }

        if(!file_exists('./view/'.$view.'.php')){
            die('404 - Not found'. $view);
        }
        require_once './view/'.$view.'.php';

        // file_exists('./view/'.$view.'.php') ? require_once './view/'.$view.'.php' : die('404 - Not found');
    }
}