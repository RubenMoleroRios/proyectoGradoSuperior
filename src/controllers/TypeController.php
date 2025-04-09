<?php    
    include_once "./include.php";
    class TypeController{ 

        public function index(): void{
            require_once "./shop/view/type/types-view.php";
        }

        public function viewAdminList(): void {
            require_once "./admin/view/type/list-type-view.php";
        }

        public function viewAdminAdd(): void {            
            require_once "./admin/view/type/add-type-view.php";
        }

        public function viewAdminUpdate(): void {
            require_once "./admin/view/type/update-type-view.php";
        }

        public function getTypes(): array {
            $connection = new DB();
            return $connection::getTypeArticles();
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

        public function addType(): void {
            if(isset($_POST)){                       
                $DB = new DB();        
                $type = new TypeArticle(
                    nameType: $_POST['name'],
                );
                try{
                    $DB::insertTypeArticle( typeArticle: $type);
                    $_SESSION['msg'] = 'Tipo añadido correctamente';
                    header(header: "Location: ".controller_action_type_list_admin);                                    
                }catch(Exception $e){
                    $_SESSION["msg"] = "El tipo no se ha podido añadir, porfavor compruebe los campos";
                    header(header:"Location: ".url_type_add_admin);                    
                }
            }
        }

        public function deleteType(): void {            
            if(isset($_GET['id'])){                
                $connection = new DB();
                $type = new TypeArticle(
                    idType: $_GET['id'],
                );                
                $connection->deleteTypeArticle(typeArticle: $type);            
            }else{                
                $_SESSION['msg']="Identificador del tipo no encontrado.";
            }  
            header(header:'Location: '.controller_action_type_list_admin);         
        }

        public function updateType(): void {
            if(isset($_POST)){                       
                $DB = new DB();        
                $type = new TypeArticle(
                    idType: $_POST['idType'],
                    nameType: $_POST['name'],                                
                );
                $typeSelected = $DB::getTypeArticleById(id: $type->getIdType());
                if(isset($typeSelected)){
                    $_SESSION['msg'] = "ID de tipo duplicada, porfavor cambie la ID.";
                    header(header: "Location: ".controller_action_type_list_admin);  
                }
                try{
                    $DB::updateTypeArticle(  typeArticle: $type);
                    $_SESSION['msg'] = 'Tipo modificado correctamente';
                    header(header: "Location: ".controller_action_type_list_admin);                                    
                }catch(Exception $e){
                    $_SESSION["msg"] = "El tipo no se ha podido modificar, porfavor compruebe los campos";
                    header(header:"Location: ".controller_action_type_list_admin);                    
                }
            }
        }

    }

?>