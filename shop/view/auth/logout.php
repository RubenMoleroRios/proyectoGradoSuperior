<?php
    include_once "../../../src/config/parameters.php";
    if(!isset($_SESSION)){
        session_start();
    }
    unset($_SESSION["auth_shop"]);
    header(header: "Location: ".controller_action_index_shop);
?>