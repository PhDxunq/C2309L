<?php

class AdminController extends Controller
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
        $this->view('admin/dashboard');
    }


    public function doLogin(){
        if(Request::isPost()){
            $username = Request::post('username');
            $password = Request::post('password');
            $userModel = new UserModel();
            $user = $userModel->auth($username, $password);
            var_dump($user);
            if($user){
                Session::set('user', $user);
                header('Location: '. BASE_URL .'/admin');
            }else{
                $this->view('admin/login', ['error' => 'Username or password is incorrect']);
            }
        }

    }
}
