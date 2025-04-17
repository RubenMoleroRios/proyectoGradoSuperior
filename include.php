<?php

    if (!isset($_SESSION)) {
        session_start();
    }

    include_once "./src/db/DB.php";
    include_once "./autoload.php";

    include_once "./src/models/Article.php";
    include_once "./src/models/ArticleOrder.php";
    include_once "./src/models/Order.php";
    include_once "./src/models/Review.php";
    include_once "./src/models/RolUser.php";
    include_once "./src/models/TypeArticle.php";
    include_once "./src/models/User.php";
    include_once "./src/config/parameters.php";

    include_once "./src/controllers/TypeController.php";
?>