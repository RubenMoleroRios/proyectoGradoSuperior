<?php

include_once "./src/db/DB.php";

include_once "./include.php";
$conexion = new DB();
$roles = $conexion::getRoles();        
//$articlesByType = $conexion::getArticlesByType(TypeArticle::$TYPE_ARTICLE);
echo "<h3>Aquí listamos los roles</h3>";
echo '<pre>'.var_export($roles,true).'</pre>';
/*
$articleAdd = new Article(
    idType:1,
    name:"pez",
    ph:2.2,
    gh:3.3,
    description:"pos un pescao",
    temp:12,
    longevityInYears:2,
    stock:23,
    price:2
);
$articles = $conexion::getArticlesById(2);

//echo '<pre>'.var_export($articleAdd,true).'</pre>';
$conexion::insertArticle($articleAdd);
*/


echo "<h1> Usuarios</h1>";
echo "<h3>Aquí añadimos usuarios</h3>";
$userAdd = new User(
    userName:"ruben23",
    password:"9nmjmdeer"
);         
$conexion::insertUser($userAdd);
//$users = $conexion->getUsers();
echo '<pre>'.var_export($userAdd,true).'</pre>';

echo "<h3>Aquí listamos un usuario </h3>";
$idUser =1;
$usuario =  $conexion::getUserById($idUser);
echo '<pre>'.var_export($usuario,true).'</pre>';


echo "<h3>Aquí borramos un usuarios </h3>";
$delUser = new User(
    idUser:2,
);
$conexion::deleteUser($delUser);


echo "<h3>Aquí modificamos un usuario </h3>";
$usuario->setUserName("efraino");
$usuario->setPassword("");
echo '<pre>'.var_export($usuario,true).'</pre>';
$modUsuario = $conexion::updateUser($usuario);










echo "<h1> Articulos</h1>";
//Borramos articulos

$addArticle = new Article(null,1,"pez prueba",2.3,3.2,"es un pez de prueba",36,25,null,25,11);
echo "<h3>Aquí añadimos un articulo </h3>";
$conexion::insertArticle($addArticle);
echo '<pre>'.var_export($addArticle,true).'</pre>';

$addPlant = new Article(null,2,"planta Prueba",null,null,"una planta de prueba",29,null,"sustrato",22,33);
echo '<pre>'.var_export($addPlant,true).'</pre>';
$conexion::insertArticle($addPlant);


$addAccesorie = new Article(null,3,"articulo Prueba",null,null,"un articulo de prueba",null,null,null,23,32);
echo '<pre>'.var_export($addAccesorie,true).'</pre>';
$conexion::insertArticle($addAccesorie);


echo "<h3>Aquí borramos un articulo </h3>";
$delArticle = new Article(
    id:29,
);
$conexion::deleteArticle($delArticle);


echo "<h3>Aquí actualizamos un articulo </h3>";
$updateArticle = new Article(
    id:1,
    name:"guppy falso",
    description:"Ahora es un guppy de mentirijilla"
);
$conexion::updateArticle($updateArticle);
echo '<pre>'.var_export($updateArticle,true).'</pre>';



echo "<h3>Aqu listamos un articulo </h3>";
$articuloListado = $conexion::getArticleById(22);
echo '<pre>'.var_export($articuloListado,true).'</pre>';






 ?>