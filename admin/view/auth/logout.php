<?php
    include_once "../../../src/config/parameters.php";
    if(!isset($_SESSION)){
        session_start();
    }
    unset($_SESSION["auth_admin"]);
    header(header: "Location: ".url_login_admin);
?>