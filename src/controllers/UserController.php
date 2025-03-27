<?php
    
    include_once "./include.php";
    class UserController{

        public function index(): void{
            echo "Controlador usuario, acción index";
        }

        public function loginClient(): void{
            if(isset($_POST)){
                $connection = new DB();
                $login = $connection::loginUser(email: $_POST['email'],password: $_POST['password']);                        
                if($login) {      
                    $_SESSION['loginClient'] =  serialize(value: $login);                                                              
                    /*session_id(id: "clientLogin");
                    session_start();
                    echo session_id();
                    $_SESSION["name"] = "1";    
                    $_SESSION['clientLogin'] =  serialize(value: $login);                                 
                    echo "<pre>",print_r(value: $_SESSION,return: 1),"</pre>";
                    session_write_close();

                    session_id(id: "adminLogin");
                    session_start();
                    echo session_id();
                    $_SESSION["name"] = "2";
                    $_SESSION['adminLogin'] =  serialize(value: $login);
                    echo "<pre>",print_r(value: $_SESSION,return: 1),"</pre>";
                    session_write_close(); */                
                    header(header: "Location: ".base_url_shop);
                }else{
                    $_SESSION['errorLogin'] = 'Identificación errónea, porfavor compruebe usuario y/o contraseña';
                    header(header: "Location: ".base_url_shop."view/usuario/login.php");
                }   
            }         
            
        }

        public function loginAdmin(): void{       
            if(isset($_POST)){
                $connection = new DB();
                $login = $connection::loginAdmin(email: $_POST['email'],password: $_POST['password']);
                if($login) {        
                    $_SESSION['loginAdmin'] = serialize(value: $login);                          
                }
            }else{
                $_SESSION['error_login'] = 'Identificación errónea, porfavor compruebe usuario y/o contraseña';
            }
            header(header: "Location: ".base_url_shop);
        }

        public function registerClientController(): void{
            if(isset($_POST)){                       
                $addUser = new DB();        
                $client = new User(
                    email: $_POST["email"],
                    userName: $_POST["userName"],
                    password: $_POST["password"],
                );
                //$comprobarEmail = $addUser::comprobarEmail(user: $client);
                try{
                    $login = $addUser::insertUser(user: $client);                    
                    header(header: "Location: ".base_url_shop);                
                }catch(Exception $e){
                    $_SESSION["errorRegister"] = "Email repetido, pruebe otro porfavor.";
                    header(header:"Location: ".base_url_shop."view/usuario/registro.php");                    
                }
                /*if($login) {
                    $verfy=true;
                    */
                    
                /*}else{
                    header(header: "Location: ../view/usuario/registro.php");                    
                }
                */
            }
        }

    }

?>