<?php
class ProductModel extends Model{

    public function __construct (){
        parent::__construct();
        $this->table = 'products';
        $this->columns = ['name', 'price', 'description', 'image', 'category_id'];
    }



    
}