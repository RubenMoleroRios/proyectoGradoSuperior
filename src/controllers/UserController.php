<?php
    
    include_once "./include.php";
    class UserController{

        public function index(): void{
            echo "Controlador usuario, acción index";
        }

        public function loginAdmin(): void{       
            if(isset($_POST)){
                $connection = new DB();
                $login = $connection::loginAdmin(email: $_POST['email'],password: $_POST['password']);
                if($login) {        
                    $_SESSION['loginAdmin'] = serialize(value: $login);                          
                    header(header: "Location: ".base_url_admin."indexAdmin.php");
                }
            }else{
                $_SESSION['error_login'] = 'Identificación errónea, porfavor compruebe usuario y/o contraseña';
                header(header: "Location: ".base_url_admin."login.php");
            }            
        }

        public function loginClient(): void{
            if(isset($_POST)){
                $connection = new DB();
                $login = $connection::loginUser(email: $_POST['email'],password: $_POST['password']);                        
                if($login) {      
                    $_SESSION['loginClient'] =  serialize(value: $login);                                                                           
                    header(header: "Location: ".indexUrl);
                }else{
                    $_SESSION['errorLogin'] = 'Identificación errónea, porfavor compruebe usuario y/o contraseña';
                    header(header: "Location: ".base_url_shop."view/usuario/login.php");
                }   
            }         
            
        }
        
        public function registerClientController(): void{
            if(isset($_POST)){                       
                $addUser = new DB();        
                $client = new User(
                    email: $_POST["email"],
                    userName: $_POST["userName"],
                    password: $_POST["password"],
                );
                try{
                    $addUser::insertUser(user: $client);                    
                    header(header: "Location: ".base_url_shop);                
                }catch(Exception $e){
                    $_SESSION["errorRegister"] = "Email repetido, pruebe otro porfavor.";
                    header(header:"Location: ".base_url_shop."view/usuario/registro.php");                    
                }
            }
        }

    }

?>