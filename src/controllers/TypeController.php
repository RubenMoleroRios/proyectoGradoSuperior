<?php    
    include_once "./include.php";
    class TypeController{ 

        public function index(): void{
            require_once "./view/Type/types.php";
        }

        public function showMenu(): array{
            $connection = new DB();            
            return $connection::getTypeArticles();
        }

        public function showType(): TypeArticle {
            $connection = new DB();                        
            return $connection::getTypeArticleById(id:(int)$_GET["id"]);                        
        }

        public function showArticlesByTypeId(): array{
            $connection = new DB();
            return $connection::getArticlesByType(idType: (int)$_GET["id"]);
        }


    }

?>