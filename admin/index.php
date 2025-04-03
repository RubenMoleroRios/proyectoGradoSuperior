<?php   

    // include_once "./includeAdmin.php";
    
    include_once ("./headerAdmin.php");
    include_once $_SERVER['DOCUMENT_ROOT']."/".explode("/",$_SERVER['REQUEST_URI'])[1]."/include.php";
    
    if(isset($_GET['controller'])){
        $controllerName = $_GET['controller'].'Controller';
        if(isset($controllerName) && class_exists(class: $controllerName)){
            $controller = new $controllerName();
            if(isset($_GET['action']) && method_exists(object_or_class: $controller,method: $_GET['action'])){
                $action = $_GET['action'];
                $controller->$action();
                die("Aqui no llega");
            }else{
                echo "La página que buscas no existe. 2 admin";
            }
        }else{

            echo "La página que buscas no existe. 3admin";
        }
    }else {
        header(header: "Location: ".indexUrl);
        echo "aquí hemos llegao";
    }
    
?>
       