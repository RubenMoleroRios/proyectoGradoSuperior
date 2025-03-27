<?php
    include_once "./view/includes/header.php";
    include_once "./include.php";
    
            
    if(isset($_GET['controller'])){
        $controllerName = $_GET['controller'].'Controller';
        if(isset($controllerName) && class_exists(class: $controllerName)){
            $controller = new $controllerName();
            if(isset($_GET['action']) && method_exists(object_or_class: $controller,method: $_GET['action'])){
                $action = $_GET['action'];
                $controller->$action();
            }else{
                echo "La página que buscas no existe. 2";
            }
        }else{
            echo "La página que buscas no existe. 3";
        }
    }
    /*$obj = unserialize(data: $_SESSION['loginAdmin']);
    echo '<pre>'.var_export(value: $obj,return: true).'</pre>';                              
    $obj2 = unserialize(data: $_SESSION['loginClient']);
    echo '<pre>'.var_export(value: $obj2,return: true).'</pre>';                              
      */              
    include_once "./view/includes/footer.php";
?>
       