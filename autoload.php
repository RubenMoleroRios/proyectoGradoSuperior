<?php

    function autocargar($className){
        include 'src/controllers/'. $className .'.php';
    }

    spl_autoload_register('autocargar');

?>