<?php
class CategoryController extends Controller
{
    public function __construct()
    {
        $user = Session::get('user');
        if ($user == null) {
            $this->view('admin/login');
            exit;
        }
    }

    public function index()
    {
        $categoryModel = new CategoryModel();
        $lstCategory = $categoryModel->all();
   
        $this->view('admin/category/index', $lstCategory);
    }
    public function create()
    {

        if(Request::isPost()){
            $name = Request::post('name');
          
            $categoryModel = new CategoryModel();
            $categoryModel->create(['name' => $name]);
            Session::set('success', 'Category created successfully');
            header('Location: '.BASE_URL.'/admin/category');
            exit;
        }


        $this->view('admin/category/create');
    }
    public function edit($id)
    {

        if(Request::isPost()){
            $name = Request::post('name');
            $categoryModel = new CategoryModel();
            $categoryModel->update(['name' => $name],$id);
            Session::set('success', 'Category updated successfully');
            header('Location: '.BASE_URL.'/admin/category');
            exit;
        }

        $categoryModel = new CategoryModel();
        $category = $categoryModel->find($id);

        $this->view('admin/category/edit',  $category);
    }
    public function delete($id)
    {
        $categoryModel = new CategoryModel();
        $res = $categoryModel->delete($id);
        if(!$res){
            Session::set('error', 'Category deleted fail');
            header('Location: '.BASE_URL.'/admin/category');
            exit;
        }
        Session::set('success', 'Category deleted successfully');
        header('Location: '.BASE_URL.'/admin/category');
        exit;
    }
}