<!DOCTYPE html>
<html lang="es">
    <?php
        if (!isset($_SESSION)) {
            session_start();
        }
        $_SESSION["app"] = "admin";
        include_once "../include.php";
    ?>        
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./public/style/style.css" media="screen">
        <title>All blue</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>
    <body>

        <div class="container-fluid">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                <div class="col-md-3 mb-2 mb-md-0">
                    <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                    <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"></use></svg>
                    </a>
                </div>

                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li><a href="<?=indexUrl?>" class="nav-link px-2 link-secondary">Inicio</a></li>                
                    <?php
                        $typeController = new TypeController();
                        $types = $typeController->showMenu();
                        foreach ($types as $type ) {
                    ?>
                        <li><a href="<?=base_url_base?>Type/index&id=<?=$type->getIdType();?>" class="nav-link px-2"><?=$type->getNameType();?></a></li>
                    <?php
                        }
                    ?>             
                </ul>

                <div class="col-md-3 text-end">
                    <?php                       
                        if (!isset($_SESSION["loginAdmin"])) {
                    ?>            
                        <a href="<?=base_url_admin?>view/usuario/login.php" class="btn btn-outline-primary me-2">Login</a>
                        <a href="<?=base_url_admin?>view/usuario/registro.php" class="btn btn-primary">Registrarse</a>
                    <?php
                        }else{                        
                    ?>  
                        <div class="btn btn-outline-primary me-2"><?=unserialize(data: $_SESSION["loginAdmin"])->getUserName()?></div>
                        <a href="<?=base_url_admin?>view/usuario/logout.php" class="btn btn-outline-primary me-2">Logout</a>
                    <?php
                        }
                    ?>                
                </div>
            </header>
        </div>