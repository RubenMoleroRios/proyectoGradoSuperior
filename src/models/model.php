<?php
include_once "database.php";

function crearConexion() {
    $conexion = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
    if (!$conexion) {
        die("No se ha podido conectar" . mysqli_connect_error());
    }else {
        print("se ha conectado correctamente");
    }
    return $conexion;
}
function getPosts() {
    $db = crearConexion(DATABASE);
    $sql = "SELECT * FROM article";
    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    if (mysqli_num_rows($result) > 0) {
        return $result;
    } else {
        return "No hay posts";
    }

    print("conexión hecha");
}


?>