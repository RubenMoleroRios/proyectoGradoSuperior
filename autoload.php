<?php

    function controller_autoload($className): void{
        include 'src/controllers/'. $className .'.php';
    }

    spl_autoload_register(callback: 'controller_autoload');

?>