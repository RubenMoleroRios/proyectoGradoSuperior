
<!DOCTYPE html>

<html lang="es">
    <?php
        session_start();

        include_once "./view/includes/head.php";
    ?>
    <body>
        <?php
        include_once "./view/includes/header.php";
       ?>
        <h1>niarfeee</h1>
        
        
        

        <?php
             include_once "./include.php";
    
             if(isset($_GET['controller'])){
                 $nombreControlador = $_GET['controller'].'Controller';

                 if(isset($nombreControlador) && class_exists($nombreControlador)){

                    $controlador = new $nombreControlador();
            
                    if(isset($_GET['action']) && method_exists($controlador,$_GET['action'])){
                        $action = $_GET['action'];
                        $controlador->$action();
            
                    }else{
                        echo "La página que buscas no existe. 2";
                    }
            
                }else{
                    echo "La página que buscas no existe. 3";
                }
             }

             echo '<pre>'.var_export($_SESSION,true).'</pre>';
             
          
      


            include_once "./view/includes/footer.php";
        ?>
        <script src="./public/js/main.js"></script>
    </body>
</html>