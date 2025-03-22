<?php
    
    include_once "./include.php";
    class UserController{

        public function index(){
            echo "Controlador usuario, acción index";
        }

        public function login(){   
            echo "echo 1";
            if(isset($_POST)){
                $connection = new DB();
                $login = $connection::loginUser(email: $_POST['email'],password: $_POST['password']);
                echo "echo 2";
                if($login) {
                    echo "echo 3";
                        $_SESSION['login'] = $login;
                    
                }
            }else{
                    $_SESSION['error_login'] = 'Identificación errónea';
            }
            echo "echo 4";
            //header("Location: ".base_url_shop);
        }

    }

?>