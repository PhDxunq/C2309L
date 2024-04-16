<?php
class CategoryModel extends Model{
    public function __construct (){
        parent::__construct();
        $this->table = 'categories';
        $this->columns = ['name'];
    }
}