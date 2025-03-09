<?php
include_once "../controllers/database.php";

function crearConexion() {
    $conexion = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
    if (!$conexion) {
        die("No se ha podido conectar" . mysqli_connect_error());
    }else {
        print("se ha conectado correctamente");
    }
    return $conexion;
}

function getRoles() {
    $db = crearConexion(DATABASE);
    $sql = "SELECT * FROM rol_user";
    $result = mysqli_query($db, $sql);
    mysqli_close($db);
    if (mysqli_num_rows($result) > 0) {
        return $result;
        $roles = [];
        foreach ($result as &$rol) {
            $roles[] = new RolUser($rol[RolUser::$ID],$rol[RolUser::$NAME]);
        }
    } else {
        return "No hay posts";
    }
}

?>