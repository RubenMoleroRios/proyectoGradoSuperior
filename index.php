<?php

if (!isset($_SESSION)) {
    session_start();
}

// include_once "./".$_SESSION['app']."/view/include/header.php";

//include_once $_SERVER['DOCUMENT_ROOT']."/".explode(separator: "/",string: $_SERVER['REQUEST_URI'])[1]."/include.php";
include_once "./include.php";


if(isset($_GET['controller'])){
    $controllerName = $_GET['controller'].'Controller';
    if(isset($controllerName) && class_exists(class: $controllerName)){
        $controller = new $controllerName();
        
        if(isset($_GET['action']) && method_exists(object_or_class: $controller,method: $_GET['action'])){
            $action = $_GET['action'];
            $controller->$action();
        }else{
            //echo "La página que buscas no existe. 2 tienda";
        }
    }else{
        //echo "La página que buscas no existe. 3asd asd";
    }
}else {
    header(header: "Location: ".controller_action_index_shop);
}
//include_once "./".$_SESSION['app']."/view/include/footer.php";
?>