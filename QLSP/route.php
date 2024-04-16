<?php
function detectUserRouting($route){
    $route = str_replace(BASE_URL, '', $route);
    $route = trim($route, '/');
    $route = explode('/', $route);
    if(count($route) == 0){
        require_once './controller/HomepageController.php';
        $controller = new HomepageController();
        $controller->index();
        exit;
    }
    if(count($route) == 1 && $route[0] == ''){
        require_once './controller/HomepageController.php';
        $controller = new HomepageController();
        $controller->index();
        exit;
    }
    if(count($route) > 0 ){
        if($route[0] == 'admin'){
            if(count($route) == 1){
                require_once './controller/AdminController.php';
                $controller = new AdminController();
                $controller->index();
                exit;
            }
            if(count($route) == 2){
                if($route[1] == 'doLogin'){
                    require_once './controller/AdminController.php';
                    $controller = new AdminController();
                    $controller->doLogin();
                    exit;
                }
                $controllerName = ucfirst($route[1]).'Controller';
                $controllerFile = './controller/'.$controllerName.'.php';
                if(file_exists($controllerFile)){
                    require_once $controllerFile;
                    $controller = new $controllerName();
                    $controller->index();
                    exit;
                }else{
                    echo '404 - Not found' . $controllerFile;
                    exit;
                }
            }
            if(count($route) == 3){
                $controllerName = ucfirst($route[1]).'Controller';
                $controllerFile = './controller/'.$controllerName.'.php';
                if(file_exists($controllerFile)){
                    require_once $controllerFile;
                    $controller = new $controllerName();
                    $action = $route[2];
                    $controller->$action();
                    exit;
                }else{
                    echo '404 - Not found' . $controllerFile;
                    exit;
                }
            }
            if(count($route) == 4){
                $controllerName = ucfirst($route[1]).'Controller';
                $controllerFile = './controller/'.$controllerName.'.php';
                if(file_exists($controllerFile)){
                    require_once $controllerFile;
                    $controller = new $controllerName();
                    $action = $route[2];
                    $controller->$action($route[3]);
                    exit;
                }else{
                    echo '404 - Not found' . $controllerFile;
                    exit;
                }
            }
        }
        $controllerName = ucfirst($route[0]).'Controller';
        $controllerFile = './controller/'.$controllerName.'.php';
        if(file_exists($controllerFile)){
            require_once $controllerFile;
            $controller = new $controllerName();
        
        }else{
            echo '404 - Not found' . $controllerFile;
            exit;
        }
    }
}
detectUserRouting($_SERVER['REQUEST_URI']);