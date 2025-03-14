<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./public/style/style.css" media="screen">
        <title>All blue</title>
    </head>
    <body>
        <h1>niarfeee</h1>
        
        <script src="./public/js/main.js"></script>
        

    <?php
        include_once "./src/db/DB.php";
        include_once "./src/models/TypeArticle.php";
        include_once "./src/models/Article.php";
        include_once "./src/models/User.php";
        /*
        $sql = "SELECT * FROM article where id_article = '1'";
        $resultado = mysqli_query(connect(),$sql);

        while($fila = mysqli_fetch_row($resultado)){
            echo "<br/>$fila[2]";
        }
            */

            $conexion = new DB();
            $roles = $conexion::getRoles();
            echo "</br>Aquí los articulos"; 
            //$articlesByType = $conexion::getArticlesByType(TypeArticle::$TYPE_ARTICLE);
            //echo '<pre>'.var_export($articlesByType,true).'</pre>';

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
            $articles = $conexion::getArticles();
            
            //echo '<pre>'.var_export($articleAdd,true).'</pre>';
            $conexion::insertArticle($articleAdd);

            $userAdd = new User(
                userName:"ruben23",
                password:"9nmjmdeer"
            );         
            $conexion::insertUser($userAdd);
            
            //$users = $conexion->getUsers();
            echo '<pre>'.var_export($userAdd,true).'</pre>';

            $delArticle = new Article(
                id:29,
            );
            $conexion::delArticle($delArticle);

            $delUser = new User(
                idUser:2,
            );
            $conexion::delUser($delUser);

            $modUser = new User(
                userName:"francisco"
            );
            $conexion::modUser($modUser);
 

    ?>

    </body>
</html>