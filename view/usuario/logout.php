<?php
    include_once "../../src/config/parameters.php";
    if(!isset($_SESSION)){
        session_start();
    }
    session_destroy();
    header(header: "Location: ".base_url_shop);
?>