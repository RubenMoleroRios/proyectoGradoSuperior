<?php
include_once "./src/config/database.php";
include_once "./include.php";

class DB {
        
    private static $connection;

    private static function connect(): bool|mysqli {
        $connection = mysqli_connect(hostname: HOST, username: USER, password: PASSWORD, database: DATABASE);
        $connection->query(query: "SET NAMES 'utf8'");
        if (!$connection) {
            die("No se ha podido conectar" . mysqli_connect_error());
        }
        return $connection;
    }

    private static function getConection(): bool|mysqli{        
        if(!DB::$connection){
            DB::$connection = DB::connect();      
        }        
        return DB::$connection;
    }

    public static function getArticles(): array {        
        $connection = DB::getConection();
        $sql = "SELECT * FROM article";
        $result = mysqli_query(mysql: $connection, query: $sql);
        $articles = [];
        if (mysqli_num_rows(result: $result) > 0) {            
            foreach ($result as $article) {     
                $articles[] = new Article(
                    id: $article[Article::$ID],
                    idType: $article[Article::$ID_TYPE],
                    name: $article[Article::$NAME],
                    ph: $article[Article::$PH],
                    gh: $article[Article::$GH],
                    description: $article[Article::$DESCRIPTION],
                    temp: $article[Article::$TEMP],
                    longevityInYears: $article[Article::$LONGEVITY_IN_YEARS],
                    plantedIn: $article[Article::$PLANTED_IN],
                    stock: $article[Article::$STOCK],
                    price: $article[Article::$PRICE]                    
                );
            }                      
        } 
        return $articles;        
    }

    public static function getArticleById(int $id): Article {        
        $connection = DB::getConection();
        $sql = "SELECT * FROM article where ".Article::$ID." = ".$id;    
        $result = mysqli_query(mysql: $connection, query: $sql);
        $article = mysqli_fetch_assoc(result: $result);
        $articleObtained = null;
        if($article != NULL){
            $articleObtained = new Article(
                id: $article[Article::$ID],
                idType: $article[Article::$ID_TYPE],
                name: $article[Article::$NAME],
                ph: $article[Article::$PH],
                gh: $article[Article::$GH],
                description: $article[Article::$DESCRIPTION],
                temp: $article[Article::$TEMP],
                longevityInYears: $article[Article::$LONGEVITY_IN_YEARS],
                plantedIn: $article[Article::$PLANTED_IN],
                stock: $article[Article::$STOCK],
                price: $article[Article::$PRICE]                         
            );                                 
        }
        return $articleObtained;           
    }
                                                        //Aquí indicamos que devuelve un array
    public static function getArticlesByType(int $idType): array {        
        $connection = DB::getConection();
        $sql = "SELECT * FROM article where ".Article::$ID." = ".$idType;     
        $result = mysqli_query(mysql: $connection, query: $sql);
        $articles = [];
        if (mysqli_num_rows(result: $result) > 0) {            
            foreach ($result as $article) {                                    
                $articles[] = new Article(
                    id: $article[Article::$ID],
                    idType: $article[Article::$ID_TYPE],
                    name: $article[Article::$NAME],
                    ph: $article[Article::$PH],
                    gh: $article[Article::$GH],
                    description: $article[Article::$DESCRIPTION],
                    temp: $article[Article::$TEMP],
                    longevityInYears: $article[Article::$LONGEVITY_IN_YEARS],
                    plantedIn: $article[Article::$PLANTED_IN],
                    stock: $article[Article::$STOCK],
                    price: $article[Article::$PRICE]                    
                );
            }                                  
        } 
        return $articles;
    }

    public static function getOrders(): array{
        $connection = DB::getConection();
        $sql = "SELECT * FROM order";
        $result = mysqli_query(mysql: $connection, query: $sql);
        $orders = [];
        if (mysqli_num_rows(result: $result)>0){
            foreach ($result as $order) {
                $orders[] = new Order(
                    idOrder: $order[Order::$idOrder],
                    idUser: $order[Order::$idUser],
                    address: $order[Order::$address],
                    totalOrderPrice: $order[Order::$totalOrderPrice]
                );
            }
        }
        return $orders;
    }

    public static function getOrderById(int $idOrder): Order {
        $connection = DB::getConection();
        $sql = "SELECT * FROM order where ".Order::$ID_ORDER." = ".$idOrder;
        $result = mysqli_query(mysql: $connection,query: $sql);
        $order = mysqli_fetch_assoc(result: $result);
        $orderObtained = null;
        if($order != NULL){
            $orderObtained = new Order(
                idOrder: $order[Order::$ID_ORDER],
                idUser: $order[Order::$ID_USER],
                address: $order[Order::$ADDRESS],
                totalOrderPrice: $order[Order::$totalOrderPrice]
            );
        }
        return $orderObtained;
    }

    public static function getReviews(): array {
        $connection = DB::getConection();
        $sql = "SELECT * FROM review,";
        $result = mysqli_query(mysql: $connection,query: $sql);
        $reviews = [];
        if(mysqli_num_rows(result: $result) > 0){
            foreach($result as $review){
                $reviews[] = new Review(
                    idReview: $review[Review::$ID_REVIEW],
                    opinion: $review[Review::$OPINION],
                    idArticle: $review[Review::$ID_ARTICLE],
                    star: $review[Review::$STAR]
                );
            }
        }
        return $reviews;
    }

    public static function getReviewById(int $idReview): Review {
        $connection = DB::getConection();
        $sql = "SELECT * FROM review where ".Review::$ID_REVIEW." = ".$idReview;
        $result = mysqli_query(mysql: $connection,query: $sql);
        $review = mysqli_fetch_assoc(result: $result);
        $reviewObtained = null;
        if($review != NULL){
            $reviewObtained = new Review(
                idReview: $review[Review::$ID_REVIEW],
                opinion: $review[Review::$OPINION],
                idArticle: $review[Review::$ID_ARTICLE],
                star: $review[Review::$STAR]
            );
        }
        return $reviewObtained;
    }

    public static function getReviewsByStars(int $star): array {
        $connection = DB::getConection();
        $sql = "SELECT * FROM review where ".Review::$STAR." = ".$star;
        $result = mysqli_query(mysql: $connection,query: $sql);
        $reviews = [];
        if(mysqli_num_rows($result) > 0){
            foreach($result as $review){
                $reviews[] = new Review(
                    idReview: $review[Review::$ID_REVIEW],
                    opinion: $review[Review::$OPINION],
                    idArticle: $review[Review::$ID_ARTICLE],
                    star: $review[Review::$STAR]
                );
            }
        }
        return $reviews;
    }

    public static function getRoles(): array {
        $connection = DB::getConection();
        $sql = "SELECT * FROM rol_user";
        $result = mysqli_query(mysql: $connection, query: $sql);
        $roles = [];
        if (mysqli_num_rows(result: $result) > 0) {            
            foreach ($result as $rol) {
                $roles[] = new RolUser(
                    idRolUser: $rol[RolUser::$ID],
                    name: $rol[RolUser::$NAME]
                );
            }
        }
        return $roles;        
    }

    public static function getTypeArticle(): array {
        $connection = DB::getConection();
        $sql = "SELECT * FROM 'type' ";
        $result = mysqli_query(mysql: $connection, query: $sql);
        $types = [];
        if (mysqli_num_rows(result: $result) > 0) {            
            foreach ($result as $type) {
                $types[] = new TypeArticle(
                    idType: $type[TypeArticle::$ID_TYPE],
                    nameArticle: $type[TypeArticle::$NAME_ARTICLE]
                );
            }
        }
        return $types;        
    }

    public static function getUsers(): array {
        $connection = DB::getConection();
        $sql = "SELECT * FROM user";
        $result = mysqli_query(mysql: $connection, query: $sql);
        $users = [];
        if (mysqli_num_rows(result: $result) > 0) {            
            foreach ($result as $user) {
                $users[] = new User(
                    idUser: $user[User::$ID_USER],
                    email: $user[User::$EMAIL],
                    userName: $user[User::$USER_NAME],  
                    password: $user[User::$PASSWORD],
                    idRolUser: $user[USER::$ID_ROL_USER]
                );
            }            
        }
        return $users;        
    }

    public static function getUserById(int $idUser): user {
        $connection = DB::getConection();        
        $sql = "SELECT * FROM user where ".User::$ID_USER."=".$idUser;        
        $result = mysqli_query(mysql: $connection, query: $sql);
        $user = mysqli_fetch_assoc(result: $result);
        $userObtained = null;
        if($user != NULL){
            $userObtained = new User(
                idUser: $user[User::$ID_USER],
                email: $user[User::$EMAIL],
                userName: $user[User::$USER_NAME],
                password: $user[User::$PASSWORD],
                idRolUser: $user[User::$ID_ROL_USER]
            );                        
        }
        return $userObtained;
    }

    public static function insertArticle(Article $article): void{
        $connection = DB::getConection();
        $sql = "INSERT into article values (
            null,".
            $article->getIdType().",'".
            $article->getName()."',".            
            ($article->getPh() != null ? $article->getPh() : "null" ).",".            
            ($article->getPh() != null ? $article->getPh() : "null" ).",'".            
            $article->getDescription()."',".
            ($article->getTemp() != null ? $article->getTemp() : "null" ).",".            
            ($article->getLongevityInYears() ? $article->getLongevityInYears() : "null" ).",".
            //Con esto hacemos una terciaria, para indicar que uno de los campos puede ir null
            ($article->getPlantedIn() ? "'".$article->getPlantedIn()."'" : "null" ).",".
            $article->getStock().",".
            $article->getPrice().            
            ")";            
            $result = mysqli_query(mysql: $connection, query: $sql);
    }

    public static function insertArticleOrder(ArticleOrder $articleOrder): void{
        $connection = DB::getConection();
        $sql = "INSERT into article_order values(
        null,". 
        $articleOrder->getIdArticle().",". 
        $articleOrder->getIdOrder().",". 
        $articleOrder->getQuantity().",". 
        $articleOrder->getTotalArticlePrice().",         
        )";
        $result = mysqli_query(mysql: $connection, query: $sql);
    }

    public static function insertOrder(Order $order): void{
        $connection = DB::getConection();
        $sql = "INSERT into order values(
        null,".
        $order->getIdUser().",'".
        $order->getAddress()."',".
        $order->getTotalOrderPrice().",
        )";
        $result = mysqli_query(mysql: $connection, query: $sql);
    }

    public static function inserReview(Review $review): void{
        $connection = DB::getConection();
        $sql = "INSERT into review values(
        null,'".
        $review->getOpinion()."',".
        $review->getIdArticle().",".
        $review->getStar()."
        )";
        $result = mysqli_query(mysql: $connection, query: $sql);
    }

    public static function insertTypeArticle(TypeArticle $typeArticle): void{
        $connection = DB::getConection();
        $sql = "INSERT into 'type' values(
        null,'".
        $typeArticle->getNameArticle().
        "')";
        $result = mysqli_query(mysql: $connection, query: $sql);
    }

    public static function insertRolUser(RolUser $rolUser): void{
        $connection = DB::getConection();
        $sql = "INSERT into rol_user values(
        null,'".
        $rolUser->getName().
        "')";
        $result = mysqli_query(mysql: $connection, query: $sql);
    }

    /*
    public static function comprobarEmail(User $user): true|false{
        $connection = DB::getConection();        
        $selectEmail = "SELECT ".User::$EMAIL." from user where ".User::$EMAIL." = '".$_POST["email"]."';";
        $verify = mysqli_query(mysql:$connection, query: $selectEmail);
        $resultEmail = mysqli_fetch_row(result: $verify);
        if($resultEmail[0] == 1){
            throw new Exception(message: "Correo repetido");            
        }else{            
            header(header: "Location: ../view/usuario/registro.php");
            echo "<h1>Email Repetido</h1>";            
        }
        return true;
    }
        */
    public static function insertUser(User $user): void{
        $connection = DB::getConection();        
        /*$selectEmail = "SELECT ".User::$EMAIL." from user where ".User::$EMAIL." = '".$_POST["email"]."';";
        $verify = mysqli_query(mysql:$connection, query: $selectEmail);
        $resultEmail = mysqli_fetch_row(result: $verify);
        if($resultEmail[0] == 0){*/
        //try{
            $sql = "INSERT into user values (
                null,'".
                $user->getEmail()."','".
                $user->getUserName()."','".            
                $user->getPassword()."',".
                RolUser::$ID_NORMAL_USER.
                ")";
            mysqli_query(mysql: $connection, query: $sql);
        /*}catch(Exception $e){
            throw new Exception(message: "Correo repetido");
        }
        }else{            
            header(header: "Location: ../view/usuario/registro.php");
            echo "<h1>Email Repetido</h1>";            
            die();
        }*/
    } 




    public static function deleteArticle(Article $article): void{
        $connection = DB::getConection();
        $sql = "DELETE FROM article where ".Article::$ID." = ".$article->getId();
        $result = mysqli_query(mysql: $connection,query: $sql);
    }

    public static function deleteArticleOrder(ArticleORder $articleOrder): void{
        $connection = DB::getConection();
        $sql = "DELETE FROM article_order where ". ArticleOrder::$ID_ARTICLE_ORDER." = ".$articleOrder->getIdArticleOrder();
        $result = mysqli_query(mysql: $connection,query: $sql);
    }

    public static function deleteOrder(Order $order): void{
        $connection = DB::getConection();
        $sql = "DELETE FROM order where ". Order::$ID_ORDER." = ".$order->getIdOrder();
        $result = mysqli_query(mysql: $connection,query: $sql);
    }

    public static function deleteReview(Review $review): void{
        $connection = DB::getConection();
        $sql = "DELETE FROM order where ". Review::$ID_REVIEW." = ".$review->getIdReview();
        $result = mysqli_query(mysql: $connection,query: $sql);
    }

    public static function deleteTypeArticle(TypeArticle $typeArticle): void{
        $connection = DB::getConection();
        $sql = "DELETE FROM 'type' where ". TypeArticle::$ID_TYPE." = ".$typeArticle->getIdType();
        $result = mysqli_query(mysql: $connection,query: $sql);
    }

    public static function deleteRolUser(RolUser $rolUser): void{
        $connection = DB::getConection();
        $sql = "DELETE FROM rol_user where ". RolUser::$ID." = ".$rolUser->getId();
        $result = mysqli_query(mysql: $connection,query: $sql);
    }

    public static function deleteUser(User $user): void{
        $connection = DB::getConection();
        $sql = "DELETE FROM user where ".User::$ID_USER."=".$user->getIdUser();
        $result = mysqli_query(mysql: $connection,query: $sql);
    }

    public static function loginUser($email, $password): false|User{
        $connection = DB::getConection();    
        $sql = "SELECT * FROM user WHERE ".User::$EMAIL." like '".$email."' and ".USER::$PASSWORD." like '".$password."' and ".User::$ID_ROL_USER." = ".RolUser::$ID_NORMAL_USER.";";
        $login = mysqli_query(mysql: $connection,query: $sql);
        $userLogin = mysqli_fetch_assoc(result: $login);
        if($userLogin != NULL){
            return new User(
                idUser: $userLogin[User::$ID_USER],
                email: $userLogin[User::$EMAIL],
                userName: $userLogin[User::$USER_NAME],
                password: $userLogin[User::$PASSWORD],
                idRolUser: $userLogin[User::$ID_ROL_USER]
            );  
        }
        return false;
    }

    public static function loginAdmin($email, $password): false|User{
        $connection = DB::getConection();
        $sql = "SELECT * FROM user WHERE ".User::$EMAIL." like '".$email."' and ".USER::$PASSWORD." like '".$password."' and ".User::$ID_ROL_USER." = ".RolUser::$ID_ADMIN.";";
        $login = mysqli_query(mysql: $connection,query: $sql);
        $userLogin = mysqli_fetch_assoc(result: $login);
        $userObtained = null;
        if($userLogin != NULL){
            $userObtained = new User(
                idUser: $userLogin[User::$ID_USER],
                email: $userLogin[User::$EMAIL],
                userName: $userLogin[User::$USER_NAME],
                password: $userLogin[User::$PASSWORD],
                idRolUser: $userLogin[User::$ID_ROL_USER]
            );  
            return $userObtained;
        }
        return false;
    }

    public static function updateArticle(Article $article): void{ 
        $connection = DB::getConection();
        $sql = "UPDATE article set ".
        ($article->getIdType()!="" ? "".Article::$ID_TYPE."='".$article->getIdType() ."'," : "").
        ($article->getName()!="" ? "".Article::$NAME."='".$article->getName() ."'," : "").
        ($article->getPh()!="" ? "".Article::$PH."='".$article->getPh() ."'," : "").
        ($article->getGh()!="" ? "".Article::$GH."='".$article->getGh() ."'," : "").
        ($article->getDescription()!="" ? "".Article::$DESCRIPTION."='".$article->getDescription() ."'," : "").
        ($article->getTemp()!="" ? "".Article::$TEMP."='".$article->getTemp() ."'," : "").
        ($article->getLongevityInYears()!="" ? "".Article::$LONGEVITY_IN_YEARS."='".$article->getLongevityInYears() ."'," : "").
        ($article->getPlantedIn()!="" ? "".Article::$PLANTED_IN."='".$article->getPlantedIn() ."'," : "").
        ($article->getStock()!="" ? "".Article::$STOCK."='".$article->getStock() ."'," : "").
        ($article->getPrice()!="" ? "".Article::$PRICE."='".$article->getPrice() ."'," : "").
        Article::$ID."=".$article->getId()." WHERE ". article::$ID."=".$article->getId();
        echo '<pre>'.var_export(value: $sql,return: true).'</pre>';
        $result = mysqli_query(mysql: $connection,query: $sql);        
    }

    public static function updateArticleOrder(ArticleOrder $articleOrder): void{ 
        $connection = DB::getConection();
        $sql = "UPDATE article_order set ".
        ($articleOrder->getIdArticle()!="" ? "".ArticleOrder::$ID_ARTICLE."='".$articleOrder->getIdArticle() ."'," : "").
        ($articleOrder->getIdOrder()!="" ? "".ArticleOrder::$ID_ORDER."='".$articleOrder->getIdOrder() ."'," : "").
        ($articleOrder->getQuantity()!="" ? "".ArticleOrder::$QUANTITY."='".$articleOrder->getQuantity() ."'," : "").
        ($articleOrder->getTotalArticlePrice()!="" ? "".ArticleOrder::$TOTAL_ARTICLE_PRICE."='".$articleOrder->getTotalArticlePrice() ."'," : "").
        ArticleOrder::$ID_ARTICLE_ORDER."=".$articleOrder->getIdArticleOrder()." WHERE ". ArticleOrder::$ID_ARTICLE_ORDER ."=".$articleOrder->getIdArticleOrder();
        $result = mysqli_query(mysql: $connection,query: $sql);
    }

    public static function updateOrder(Order $order): void{ 
        $connection = DB::getConection();
        $sql = "UPDATE order set ".
        ($order->getIdUser()!="" ? "".Order::$ID_USER."='".$order->getIdUser() ."'," : "").
        ($order->getAddress()!="" ? "".Order::$ADDRESS."='".$order->getAddress() ."'," : "").
        ($order->getTotalOrderPrice()!="" ? "".Order::$TOTAL_ORDER_PRICE."='".$order->getTotalOrderPrice() ."'," : "").
        Order::$ID_ORDER."=".$order->getIdOrder()." WHERE ". Order::$ID_ORDER ."=".$order->getIdOrder();
        $result = mysqli_query(mysql: $connection,query: $sql);
    }

    public static function updateReview(Review $review): void{ 
        $connection = DB::getConection();
        $sql = "UPDATE order set ".
        ($review->getOpinion()!="" ? "".Review::$OPINION."='".$review->getOpinion() ."'," : "").
        ($review->getIdArticle()!="" ? "".Article::$ID."='".$review->getIdArticle() ."'," : "").
        ($review->getStar()!="" ? "".Review::$STAR."='".$review->getStar() ."'," : "").
        Review::$ID_REVIEW."=".$review->getIdReview()." WHERE ". Review::$ID_REVIEW ."=".$review->getIdReview();
        $result = mysqli_query(mysql: $connection,query: $sql);
    }

    public static function updateTypeArticle(TypeArticle $typeArticle): void{ 
        $connection = DB::getConection();
        $sql = "UPDATE 'type' set ".
        ($typeArticle->getNameArticle()!="" ? "".TypeArticle::$NAME_ARTICLE."='".$typeArticle->getNameArticle() ."'," : "").
        TypeArticle::$ID_TYPE."=".$typeArticle->getIdType()." WHERE ". TypeArticle::$ID_TYPE ."=".$typeArticle->getIdType();
        $result = mysqli_query(mysql: $connection,query: $sql);
    }

    public static function updateRolUser(RolUser $rolUser): void{ 
        $connection = DB::getConection();
        $sql = "UPDATE rol_user set ".    
        ($rolUser->getName()!="" ? "".RolUser::$NAME."='".$rolUser->getName() ."'," : "").
        RolUser::$ID."=".$rolUser->getId()." WHERE ". RolUser::$ID ."=".$rolUser->getId();
        $result = mysqli_query(mysql: $connection,query: $sql);
    }

    public static function updateUser(User $user): void{ 
        $connection = DB::getConection();
        $sql = "UPDATE user set ".    
        // si getUserName si no está vacio que actualice el campo, si no, que no haga nada
        ($user->getUserName()!="" ? "".User::$USER_NAME."='".$user->getUserName() ."'," : "").
        ($user->getPassword()!="" ? "".User::$PASSWORD."='".$user->getPassword() ."'," : "").
        User::$ID_USER."=".$user->getIdUser()." WHERE ". User::$ID_USER ."=".$user->getIdUser();
        $result = mysqli_query(mysql: $connection,query: $sql);
    }

}


?>