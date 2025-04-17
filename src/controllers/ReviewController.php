<?php    
    include_once "./include.php";
    class ReviewController{ 

        public function viewAdminList(): void {
            require_once "./admin/view/review/list-review-view.php";
        }

        public function viewAdminAdd(): void {            
            require_once "./admin/view/review/add-review-view.php";
        }

        public function viewAdminUpdate(): void {
            require_once "./admin/view/review/update-review-view.php";
        }


        public function getReviews(): array{
            $connection = new DB();
            return $connection::getReviews();
        }
        public function getReviewsByIdArticle(int $idArticle): array {
            $connection = new DB();
            return $connection::getReviewsByIdArticle(idArticle: $idArticle);
        }

        public function addReview(): void{
            $connection = new DB();
            $review = new Review(
                idReview: null,
                opinion: $_POST['review'],
                idArticle: $_POST['idArticle'],
                idUser: unserialize(data: $_SESSION['auth_shop'])->getIdUser(),
                name: unserialize(data: $_SESSION["auth_shop"])->getUserName(),
            );
            $connection::insertReview(review: $review);
            header(header:"Location: ".controller_action_article_list_shop."&id=".$_POST['idArticle']);
        }

        public function addReviewAdmin(): void{
            $connection = new DB();
            $review = new Review(
                idReview: null,
                opinion: $_POST['review'],
                idArticle: $_POST['idArticle'],
                idUser: $_POST['idUser'],
                name: $_POST['name'],
            );

            try{
                $connection::insertReview(review: $review);                          
                $_SESSION['msg'] = 'Review añadida correctamente';
                header(header: "Location: ".controller_action_review_list_admin);                                    
            }catch(Exception $e){
                $_SESSION["msg"] = "La review no se ha podido añadir, porfavor compruebe los campos";
                header(header:"Location: ".controller_action_review_add_admin);                    
            }
            
            
        }

        public function deleteReview(): void {            
            if(isset($_GET['id'])){                
                $connection = new DB();
                $review = new Review(
                  idReview: $_GET['id'],    
                );
                $connection->deleteReview( review: $review);              
            }else{                
                $_SESSION['msg']="Identificador de la review no encontrado.";
            }  
            header(header:'Location: '.controller_action_review_list_admin);         
        }

        public function updateReview(): void {
            if(isset($_POST)){                       
                $DB = new DB();        
                $review = new Review(
                    idReview: $_POST['id'],
                    opinion: $_POST['opinion'],
                    idArticle: $_POST['idArticle'],
                    idUser: $_POST['idUser'],
                    name: $_POST['name']
                );
                try{
                    $DB::updateReview( review: $review);
                    $_SESSION['msg'] = 'Review modificada correctamente';
                    header(header: "Location: ".controller_action_review_list_admin);                                    
                }catch(mysqli_sql_exception $e){
                    $_SESSION["msg"] = "La Review no se ha podido modificar, porfavor compruebe los campos: ".$e->getMessage();
                    header(header:"Location: ".controller_action_review_list_admin);      
                }
            }            
        }
    }

?>