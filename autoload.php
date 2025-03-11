<?php

    function autocargar($classname){
        include 'src/controllers/'. $classname .'.php';
    }

    spl_autoload_register('autocargar');

?>