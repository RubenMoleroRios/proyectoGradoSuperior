<?php
include_once("../src/config/parameters.php");
if (!isset($_SESSION)) {
    session_start();
}
$_SESSION["app"] = "admin";
header(header:"Location: ". controller_action_index_admin);
?>