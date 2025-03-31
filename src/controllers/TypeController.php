<?php    
    include_once "./include.php";
    class TypeController{
        public function index(): void{
            echo "Controlador usuario, acción index";

            require_once "./view/Article/important.php";
        }  


        public function showMenu(): array{
            $connection = new DB();            
            return $connection::getTypeArticle();
        }
    }

?>