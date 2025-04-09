<?php
     include_once "./include.php";
    
    class UserController{

        public function index(): void {
            echo "Controlador usuario, acción index";
        }
        public function viewAdminList(): void {
            require_once "./admin/view/user/list-user-view.php";
        }

        public function viewAdminAdd(): void {            
            require_once "./admin/view/user/add-user-view.php";
        }

        public function viewAdminUpdate(): void {
            require_once "./admin/view/user/update-user-view.php";
        }

        public function addUser(): void {
            if(isset($_POST)){                       
                $DB = new DB();        
                $user = new User(
                    email: $_POST["email"],
                    userName: $_POST["name"],
                    password: $_POST["password"],
                    idRolUser: $_POST["idRol"],
                );
                try{
                    $_SESSION["msg"] = "Usuario añadido correctamente";
                    $DB::insertClient(user: $user);                    
                    header(header: "Location: ".controller_action_user_list_admin);                
                }catch(mysqli_sql_exception $e){
                    $_SESSION["msg"] = "Email repetido, pruebe otro porfavor.";
                    header(header:"Location: ".controller_action_user_view_add_admin);                    
                }
            }
        }

        public function deleteUser(): void {            
            if(isset($_GET['id'])){                
                $connection = new DB();
                $user = new User(
                  idUser: $_GET['id']
                );
                $connection->deleteUser( user: $user);    
                $_SESSION['msg']="Usuario borrado correctamente.";            
            }else{                
                $_SESSION['msg']="Identificador del usuario no encontrado.";
            }  
            header(header:'Location: '.controller_action_user_list_admin);         
        }

        public function getUsers(): array {
            $connection = new DB();
            return $connection::getUsers();
        }

        public function loginAdmin(): void {       
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

        public function loginShop(): void {
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

        public function updateUser(): void {
            if(isset($_POST)){                       
                $DB = new DB();        
                $user = new User(
                    idUser: $_POST['id'],
                    email: $_POST['email'],
                    userName: $_POST['name'],
                    password: $_POST['password'],              
                    idRolUser: $_POST['idRol'],
                );
                
                try{
                    $DB::updateUser( user: $user);
                    $_SESSION['msg'] = 'Usuario modificado correctamente';
                    header(header: "Location: ".controller_action_user_list_admin);                                    
                }catch(mysqli_sql_exception $e){
                    $_SESSION["msg"] = "Correo duplicado, porfavor introduzca otro que no esté en uso.";
                    header(header:"Location: ".controller_action_user_list_admin);                    
                }catch(Exception $e){
                    $_SESSION["msg"] = "El usuario no se ha podido modificar, porfavor compruebe los campos";
                    header(header:"Location: ".controller_action_user_list_admin);                    
                }
            }
        }
        
        public function registerClient(): void {
            if(isset($_POST)){                       
                $addUser = new DB();        
                $client = new User(
                    email: $_POST["email"],
                    userName: $_POST["userName"],
                    password: $_POST["password"],
                );
                try{
                    $addUser::insertClient(user: $client);                    
                    header(header: "Location: ".url_base);                
                }catch(mysqli_sql_exception $e){
                    $_SESSION["errorRegister"] = "Email repetido, pruebe otro porfavor.";
                    header(header:"Location: ".url_base_shop."view/usuario/registro.php");                    
                }
            }
        }

    }

?>