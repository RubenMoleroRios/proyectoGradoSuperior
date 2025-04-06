<?php
    // include_once "./include.php";
    include_once $_SERVER['DOCUMENT_ROOT']."/".explode("/",$_SERVER['REQUEST_URI'])[1]."/include.php";
    
    class UserController{

        public function index(): void{
            echo "Controlador usuario, acción index";
        }

        public function loginAdmin(): void{       
            if(isset($_POST)){
                $connection = new DB();
                $login = $connection::loginAdmin(email: $_POST['email'],password: $_POST['password']);
                if($login) {        
                    $_SESSION['auth_admin'] = serialize(value: $login);
                    header(header: "Location: ".controller_action_index_admin);
                }
            }else{
                $_SESSION['error_login'] = 'Identificación errónea, porfavor compruebe usuario y/o contraseña';                
                header(header: "Location: ".url_login_admin);
            }            
        }

        public function loginShop(): void{
            if(isset($_POST)){
                $connection = new DB();
                $login = $connection::loginUser(email: $_POST['email'],password: $_POST['password']);                        
                if($login) {      
                    $_SESSION['auth_shop'] =  serialize(value: $login);                        
                    header(header: "Location: ".controller_action_index_shop);
                }else{
                    $_SESSION['errorLogin'] = 'Identificación errónea, porfavor compruebe usuario y/o contraseña';
                    header(header: "Location: ".url_login_shop);
                }   
            }         
            
        }
        
        public function registerClient(): void{
            if(isset($_POST)){                       
                $addUser = new DB();        
                $client = new User(
                    email: $_POST["email"],
                    userName: $_POST["userName"],
                    password: $_POST["password"],
                );
                try{
                    $addUser::insertUser(user: $client);                    
                    header(header: "Location: ".url_base);                
                }catch(Exception $e){
                    $_SESSION["errorRegister"] = "Email repetido, pruebe otro porfavor.";
                    header(header:"Location: ".url_base_shop."view/usuario/registro.php");                    
                }
            }
        }

    }

?>