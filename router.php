<?php

class Router {

    public function run () {
        $url = $_SERVER['REQUEST_URI'];

        $path = explode('/', $url);
        $controllerName = $path[2].'Controller';
        $controllerFile = 'app/controller/'.$controllerName.'.php';

        if (file_exists($controllerFile)) {
        
            require_once($controllerFile);

        } else {
            header('Location: http://localhost/csvTask/upload/form');
        }

        $controller = new $controllerName;

        $modelFile = 'app/model/'.$path[2].'Model.php';
        if(file_exists($modelFile)) {
            require_once($modelFile);
        }
        
        $actionName = $path[3].'Action';
        if(method_exists($controller, $actionName)) 
        {
            $controller->$actionName();
        } else 
        {
            header('Location: http://localhost/csvTask/upload/form');
        }

    }

}

?>