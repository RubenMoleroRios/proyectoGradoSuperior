<?php
    include_once "../../../src/config/parameters.php";
    if(!isset($_SESSION)){
        session_start();
    }
    unset($_SESSION["loginClient"]);
    header(header: "Location: ".indexUrl);
?>