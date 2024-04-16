<?php
// require_once './model/ProductModel.php';
class HomepageController extends Controller
{
    public function index()
    {
        $productModel = new ProductModel();
        $lstProduct = $productModel->all();

        $this->view('homepage/index',   $lstProduct );
    }

    
}