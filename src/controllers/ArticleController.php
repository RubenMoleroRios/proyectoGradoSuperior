<?php
    
    include_once "./include.php";
    class ArticleController{
        public function index(): void{
            echo "Controlador usuario, acción index";

            require_once "./view/Article/important.php";
        }  


        public function showMenu(): void{

        }
    }

?>