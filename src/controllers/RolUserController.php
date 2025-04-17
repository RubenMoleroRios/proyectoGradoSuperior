<?php    
    include_once "./include.php";
    class RolUserController{ 
        public function getRoles(): array {
            $connection = new DB();
            return $connection::getRoles();
        }
    }

?>