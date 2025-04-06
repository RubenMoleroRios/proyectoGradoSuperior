<?php
    include_once("../src/config/parameters.php");
    if (!isset($_SESSION)) {
        session_start();
    }
    $_SESSION["app"] = "shop";
    header(header:"Location: ". controller_action_index_shop);
?>
       