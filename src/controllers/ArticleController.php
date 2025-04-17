<?php

    include_once "./include.php";
    class ArticleController{
        public function indexShop(): void {
            require_once "./shop/view/article/featured-articles-view.php";
        }         

        public function indexAdmin(): void {
            require_once "./admin/view/article/list-article-view.php";
        }  

        public function viewAdminList(): void {
            require_once "./admin/view/article/list-article-view.php";
        }

        public function viewAdminAdd(): void {            
            require_once "./admin/view/article/add-article-view.php";
        }

        public function viewAdminUpdate(): void {
            require_once "./admin/view/article/update-article-view.php";
        }

        public function viewShopList(): void {
            require_once "./shop/view/article/articles-view.php";
        }

        public function getArticles(): array {
            $connection = new DB();
            return $connection::getArticles();
        }

        public function addArticle(): void {
            if(isset($_POST)){                       
                $DB = new DB();        

                $article = new article(
                    id: null,
                    idType: $_POST['idType'],
                    name: $_POST['name'],
                    ph: $_POST['ph'],
                    gh: $_POST['gh'],
                    description: $_POST['description'],
                    temp: $_POST['temp'],
                    longevityInYears: $_POST['longevity'],
                    plantedIn: $_POST['plantedIn'],
                    stock: $_POST['stock'],
                    price: $_POST['price'],
                );
                try{
                    $id = $DB::insertArticle(article: $article);                    
                    $this->uploadImage(id: $id);                   
                    $_SESSION['msg'] = 'Artículo añadido correctamente';
                    header(header: "Location: ".controller_action_article_list_admin);                                    
                }catch(Exception $e){
                    $_SESSION["msg"] = "El artículo no se ha podido añadir, porfavor compruebe los campos";
                    header(header:"Location: ".url_articles_add_admin);                    
                }
            }
        }

        public function uploadImage(int $id):void{
            //Recogemos el archivo enviado por el formulario
            $archivo = $id.".jpg";      
            //Si el archivo contiene algo y es diferente de vacio

            if (isset($archivo) && $archivo != "") {
                //Obtenemos algunos datos necesarios sobre el archivo
                $tipo = $_FILES['imageArticle']['type'];
                $temp = $_FILES['imageArticle']['tmp_name'];                   
                if ( strpos(haystack: $tipo, needle: "jpeg")) {
                        //Si la imagen es correcta en tipo
                        //Se intenta subir al servidor
                    if (move_uploaded_file($temp, 'public/image/articles/'.$archivo)) {
                        //Cambiamos los permisos del archivo a 777 para poder modificarlo posteriormente
                        chmod(filename: 'public/image/articles/'.$archivo, permissions: 0777);                       
                    }else {
                        $_SESSION['msg'] = "No se ha podido subir la imagen, por favor, compruébelo.";

                    }                     
                }else {
                    $_SESSION['msg'] = "La extensión no es correcta, por favor, asegúrese que la extensión sea jpg.";
                }
            }       
        }

        public function updateArticle(): void {
            if(isset($_POST)){                       
                $DB = new DB();        
                $article = new article(
                    id: $_POST['id'],
                    idType: $_POST['idType'],
                    name: $_POST['name'],
                    ph: $_POST['ph'],
                    gh: $_POST['gh'],
                    description: $_POST['description'],
                    temp: $_POST['temp'],
                    longevityInYears: $_POST['longevity'],
                    plantedIn: $_POST['plantedIn'],
                    stock: $_POST['stock'],
                    price: $_POST['price'],
                );
                try{
                    $DB::updateArticle(article: $article);
                    $this->uploadImage(id: $article->getId());              
                    $_SESSION['msg'] = 'Artículo modificado correctamente';
                    header(header: "Location: ".controller_action_article_list_admin);                                    
                }catch(mysqli_sql_exception $e){
                    $_SESSION["msg"] = "El artículo no se ha podido modificar, porfavor compruebe los campos: ".$e->getMessage();
                    header(header:"Location: ".controller_action_article_list_admin);      
                }
            }            
        }

        public function deleteArticle(): void {            
            if(isset($_GET['id'])){                
                $connection = new DB();
                $article = new Article(
                  id: $_GET['id'],    
                );
                $connection->deleteArticle(article: $article);              
            }else{                
                $_SESSION['msg']="Identificador del articulo no encontrado.";
            }  
            header(header:'Location: '.controller_action_article_list_admin);         
        }

        public function getArticleById(): Article {
            $connection = new DB();                        
            return $connection::getArticleById(id:(int)$_GET["id"]);  
        }

        public function getRandomFish(int $limit): array {
            $connection = new DB();            
            return $connection::getArticlesRandomByTypes(idType: TypeArticle::$TYPE_FISH,limit: $limit);
        }        

        public function getRandomPlant(int $limit): array {
            $connection = new DB();            
            return $connection::getArticlesRandomByTypes(idType: TypeArticle::$TYPE_PLANT,limit: $limit);
        }

        public function getRandomAccesory(int $limit): array {
            $connection = new DB();            
            return $connection::getArticlesRandomByTypes(idType: TypeArticle::$TYPE_ARTICLE,limit: $limit);
        }

        public function getRandomArticle(): Article{
            $connection = new DB();            
            return $connection::getArticleRandom();
        }
    }

?>