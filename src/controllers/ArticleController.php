<?php

    include_once "./include.php";
    class ArticleController{
        public function index(): void{
            require_once "./view/Article/important.php";
        }          

        public function article():void{
            require_once ".view/Article/article.php";
        }

        public function getRandomFish(): array{
            $connection = new DB();            
            return $connection::getArticlesRandomByTypes(idType: TypeArticle::$TYPE_FISH,limit: 3);
        }

        public function getRandomPlant(): array{
            $connection = new DB();            
            return $connection::getArticlesRandomByTypes(idType: TypeArticle::$TYPE_PLANT,limit: 3);
        }

        public function getRandomAccesory(): array{
            $connection = new DB();            
            return $connection::getArticlesRandomByTypes(idType: TypeArticle::$TYPE_ARTICLE,limit: 3);
        }
    }

?>