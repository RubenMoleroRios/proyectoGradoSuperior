<?php    
    //include_once "./include.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/".explode("/",$_SERVER['REQUEST_URI'])[1]."/include.php";
    class TypeController{ 

        public function index(): void{
            require_once "./shop/view/type/types-view.php";
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

        public function getTypes(): array {
            $connection = new DB();
            return $connection::getTypeArticles();
        }


    }

?>