<?php
    
    include_once "./include.php";
    class UserController{

        public function index(){
            echo "Controlador usuario, acción index";
        }

        public function clientLogin(): void{
            if(isset($_POST)){
                $connection = new DB();
                $login = $connection::loginUser(email: $_POST['email'],password: $_POST['password']);                
                if($login) {      
                    $_SESSION['clientLogin'] =  serialize(value: $login);                                                              
                }
            }else{
                $_SESSION['error_login'] = 'Identificación errónea, porfavor compruebe usuario y/o contraseña';
            }            
            header(header: "Location: ".base_url_shop);
        }

        public function adminLogin(): void{       
            if(isset($_POST)){
                $connection = new DB();
                $login = $connection::loginAdmin(email: $_POST['email'],password: $_POST['password']);
                if($login) {        
                    $_SESSION['adminLogin'] = serialize(value: $login);                          
                }
            }else{
                $_SESSION['error_login'] = 'Identificación errónea, porfavor compruebe usuario y/o contraseña';
            }
            header(header: "Location: ".base_url_shop);
        }

    }

?>