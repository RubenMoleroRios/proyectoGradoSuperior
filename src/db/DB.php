<?php
include_once "./src/config/database.php";
include_once "./include.php";

class DB {
        
    private static $connection;

    private static function connect() {
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
        $connection->query("SET NAMES 'utf8'");
        if (!$connection) {
            die("No se ha podido conectar" . mysqli_connect_error());
        }
        return $connection;
    }

    private static function getConection(){        
        if(!DB::$connection){
            DB::$connection = DB::connect();      
        }        
        return DB::$connection;
    }

    public static function getArticles(): array {        
        $connection = DB::getConection();
        $sql = "SELECT * FROM article";
        $result = mysqli_query($connection, $sql);
        $articles = [];
        if (mysqli_num_rows($result) > 0) {            
            foreach ($result as $article) {     
                $articles[] = new Article(
                    $article[Article::$ID],
                    $article[Article::$ID_TYPE],
                    $article[Article::$NAME],
                    $article[Article::$PH],
                    $article[Article::$GH],
                    $article[Article::$DESCRIPTION],
                    $article[Article::$TEMP],
                    $article[Article::$LONGEVITY_IN_YEARS],
                    $article[Article::$PLANTED_IN],
                    $article[Article::$STOCK],
                    $article[Article::$PRICE]                    
                );
            }                      
        } 
        return $articles;        
    }

    public static function getArticleById(int $id): Article {        
        $connection = DB::getConection();
        $sql = "SELECT * FROM article where ".Article::$ID." = ".$id;    
        $result = mysqli_query($connection, $sql);
        $article = mysqli_fetch_assoc($result);
        $articleObtained = null;
        if($article != NULL){
            $articleObtained = new Article(
                $article[Article::$ID],
                $article[Article::$ID_TYPE],
                $article[Article::$NAME],
                $article[Article::$PH],
                $article[Article::$GH],
                $article[Article::$DESCRIPTION],
                $article[Article::$TEMP],
                $article[Article::$LONGEVITY_IN_YEARS],
                $article[Article::$PLANTED_IN],
                $article[Article::$STOCK],
                $article[Article::$PRICE]                         
            );                                 
        }
        return $articleObtained;           
    }
                                                        //Aquí indicamos que devuelve un array
    public static function getArticlesByType(int $idType): array {        
        $connection = DB::getConection();
        $sql = "SELECT * FROM article where ".Article::$ID." = ".$idType;     
        $result = mysqli_query($connection, $sql);
        $articles = [];
        if (mysqli_num_rows($result) > 0) {            
            foreach ($result as $article) {                                    
                $articles[] = new Article(
                    $article[Article::$ID],
                    $article[Article::$ID_TYPE],
                    $article[Article::$NAME],
                    $article[Article::$PH],
                    $article[Article::$GH],
                    $article[Article::$DESCRIPTION],
                    $article[Article::$TEMP],
                    $article[Article::$LONGEVITY_IN_YEARS],
                    $article[Article::$PLANTED_IN],
                    $article[Article::$STOCK],
                    $article[Article::$PRICE]                    
                );
            }                                  
        } 
        return $articles;
    }

    public static function getOrder(): array{
        $connection = DB::getConection();
        $sql = "SELECT * FROM order";
        $result = mysqli_query($connection, $sql);
        $orders = [];
        if (mysqli_num_rows($result)>0){
            foreach ($result as $order) {
                $orders[] = new Order(
                    $order[Order::$idOrder],
                    $order[Order::$idUser],
                    $order[Order::$address],
                    $order[Order::$totalOrderPrice]
                );
            }
        }
        return $orders;
    }

    public static function getOrderById(int $idOrder): Order {
        $connection = DB::getConection();
        $sql = "SELECT * FROM order where ". Order::$ID." = ".$idOrder;
        $result = mysqli_query($connection,$sql);
        $order = mysqli_fetch_assoc($result);
        $orderObtained = [];
        if($order != NULL){
            $orderObtained = new Order(
                $order[Order::$ID_ORDER],
                $order[Order::$ID_USER],
                $order[Order::$ADDRESS],
                $order[Order::$totalOrderPrice]
            );
        }
        return $order;
    }

    public static function getReviews(): array {
        $connection = DB::getConection();
        $sql = "SELECT * FROM review,";
        $result = mysqli_query($connection,$sql);
        $reviews = [];
        if(mysqli_nums_rows($result) > 0){
            foreach($result as $review){
                $reviews[] = new Review(
                    $review[Review::$ID_REVIEW],
                    $review[Review::$OPINION],
                    $review[Review::$ID_ARTICLE],
                    $review[Review::$STAR]
                );
            }
        }
        return $reviews;
    }

    public static function getReviewById(int $idReview): Review {
        $connection = DB::getConection();
        $sql = "SELECT * FROM review where ".Review::$ID_REVIEW." = ".$idReview;
        $result = mysqli_query($connection,$sql);
        $review = mysqli_fetch_assoc($result);
        $reviewObtained = [];
        if($review != NULL){
            $reviewObtained = new Review(
                $review[Review::$ID_REVIEW],
                $review[Review::$OPINION],
                $review[Review::$ID_ARTICLE],
                $review[Review::$STAR]
            );
        }
        return $reviewObtained;
    }

    public static function getReviewsByStars(int $star): array {
        $connection = DB::getConection();
        $sql = "SELECT * FROM review where ".Review::$STAR." = ".$star;
        $result = mysqli_query($connection,$sql);
        $reviews = [];
        if(mysqli_nums_rows($result) > 0){
            foreach($result as $review){
                $reviews[] = new Review(
                    $review[Review::$ID_REVIEW],
                    $review[Review::$OPINION],
                    $review[Review::$ID_ARTICLE],
                    $review[Review::$STAR]
                );
            }
        }
        return $reviews;
    }

    public static function getRoles(): array {
        $connection = DB::getConection();
        $sql = "SELECT * FROM rol_user";
        $result = mysqli_query($connection, $sql);
        $roles = [];
        if (mysqli_num_rows($result) > 0) {            
            foreach ($result as $rol) {
                $roles[] = new RolUser(
                    $rol[RolUser::$ID],
                    $rol[RolUser::$NAME]
                );
            }
        }
        return $roles;        
    }

    public static function getTypeArticle(): array {
        $connection = DB::getConection();
        $sql = "SELECT * FROM 'type' ";
        $result = mysqli_query($connection, $sql);
        $types = [];
        if (mysqli_num_rows($result) > 0) {            
            foreach ($result as $type) {
                $types[] = new RolUser(
                    $type[RolUser::$ID_TYPE],
                    $type[RolUser::$NAME_ARTICLE]
                );
            }
        }
        return $types;        
    }

    public static function getUsers(): array {
        $connection = DB::getConection();
        $sql = "SELECT * FROM user";
        $result = mysqli_query($connection, $sql);
        $users = [];
        if (mysqli_num_rows($result) > 0) {            
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
        $result = mysqli_query($connection, $sql);
        $user = mysqli_fetch_assoc($result);
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

    

    public static function insertArticle(Article $article){
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
            $result = mysqli_query($connection, $sql);
    }

    public static function insertArticleOrder(ArticleOrder $articleOrder){
        $connection = DB::getConection();
        $sql = "INSERT into article_order values(
        null,". 
        $articleOrder->getArticle().",". 
        $articleOrder->getIdOrder().",". 
        $articleOrder->getQuantity().",". 
        $articleOrder->getTotalArticlePrice().",         
        )";
        $result = mysqli_query($connection, $sql);
    }

    public static function insertOrder(Order $order){
        $connection = DB::getConection();
        $sql = "INSERT into order values(
        null,".
        $order->getIdUser().",'".
        $order->getAddress()."',".
        $order->getTotalOrderPrice().",
        )";
        $result = mysqli_query($connection, $sql);
    }

    public static function inserReview(Review $review){
        $connection = DB::getConection();
        $sql = "INSERT into review values(
        null,'".
        $review->getOpinion()."',".
        $review->getIdArticle().",".
        $review->getStar()."
        )";
        $result = mysqli_query($connection, $sql);
    }

    public static function insertTypeArticle(TypeArticle $typeArticle){
        $connection = DB::getConection();
        $sql = "INSERT into 'type' values(
        null,'".
        $typeArticle->getNameArticle().
        "')";
        $result = mysqli_query($connection, $sql);
    }

    public static function insertRolUser(RolUser $rolUser){
        $connection = DB::getConection();
        $sql = "INSERT into rol_user values(
        null,'".
        $rolUser->getName().
        "')";
        $result = mysqli_query($connection, $sql);
    }

    public static function insertUser(User $user){
        $connection = DB::getConection();
        $sql = "INSERT into user values (
            null,'".
            $user->getUserName()."','".
            $user->getEmail()."','".
            $user->getPassword()."',".
            RolUser::$ID_NORMAL_USER.
            ")";
        $result = mysqli_query($connection, $sql);
    } 




    public static function deleteArticle(Article $article){
        $connection = DB::getConection();
        $sql = "DELETE FROM article where ".Article::$ID." = ".$article->getId();
        $result = mysqli_query($connection,$sql);
    }

    public static function deleteArticleOrder(ArticleORder $articleOrder){
        $connection = DB::getConection();
        $sql = "DELETE FROM article_order where ". ArticleOrder::$ID_ARTICLE_ORDER." = ".$articleOrder->getIdArticleOrder();
        $result = mysqli_query($connection,$sql);
    }

    public static function deleteOrder(Order $order){
        $connection = DB::getConection();
        $sql = "DELETE FROM order where ". Order::$ID_ORDER." = ".$order->getIdOrder();
        $result = mysqli_query($connection,$sql);
    }

    public static function deleteReview(Review $review){
        $connection = DB::getConection();
        $sql = "DELETE FROM order where ". Reivew::$ID_REVIEW." = ".$review->getIdOrder();
        $result = mysqli_query($connection,$sql);
    }

    public static function deleteTypeArticle(TypeArticle $typeArticle){
        $connection = DB::getConection();
        $sql = "DELETE FROM 'type' where ". TypeArticle::$ID_TYPE." = ".$typeArticle->getIdType();
        $result = mysqli_query($connection,$sql);
    }

    public static function deleteRolUser(RolUser $rolUser){
        $connection = DB::getConection();
        $sql = "DELETE FROM order where ". RolUser::$ID." = ".$rolUser->getIdOrder();
        $result = mysqli_query($connection,$sql);
    }

    public static function deleteUser(User $user){
        $connection = DB::getConection();
        $sql = "DELETE FROM user where ".User::$ID_USER."=".$user->getIdUser();
        $result = mysqli_query($connection,$sql);
    }


    public static function loginAdmin($email, $password): false|User{
        $connection = DB::getConection();
        $sql = "SELECT * FROM user WHERE ".User::$EMAIL." like '".$email."' and ".USER::$PASSWORD." like '".$password."' and ".User::$ID_ROL_USER." = ".RolUser::$ID_ADMIN.";";
        $login = mysqli_query($connection,$sql);
        
        return  mysqli_num_rows($login)==1 ? $login->fetch_object() : false;
    }

    
    
    

    public static function updateArticle(Article $article){ 
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
        echo '<pre>'.var_export($sql,true).'</pre>';
        $result = mysqli_query($connection,$sql);        
    }

    public static function updateArticleOrder(ArticleOrder $articleOrder){ 
        $connection = DB::getConection();
        $sql = "UPDATE article_order set ".
        // si getUserName si no está vacio que actualice el campo, si no, que no haga nada
        ($articleOrder->getIdArticle()!="" ? "".ArticleOrder::$ID_ARTICLE."='".$articleOrder->getIdArticle() ."'," : "").
        ($articleOrder->getIdOrder()!="" ? "".ArticleOrder::$ID_ORDER."='".$articleOrder->getIdOrder() ."'," : "").
        ($articleOrder->getQuantity()!="" ? "".ArticleOrder::$QUANTITY."='".$articleOrder->getQuantity() ."'," : "").
        ($articleOrder->getTotalArticlePrice()!="" ? "".ArticleOrder::$TOTAL_ARTICLE_PRICE."='".$articleOrder->getTotalArticlePrice() ."'," : "").
        ArticleOrder::$ID_ARTICLE_ORDER."=".$articleOrder->getIdArticleOrder()." WHERE ". ArticleOrder::$ID_ARTICLE_ORDER ."=".$articleOrder->getIdArticleOrder();
        $result = mysqli_query($connection,$sql);
    }

    public static function updateOrder(Order $order){ 
        $connection = DB::getConection();
        $sql = "UPDATE order set ".
        // si getUserName si no está vacio que actualice el campo, si no, que no haga nada
        ($order->getIdUser()!="" ? "".Order::$ID_USER."='".$order->getIdUser() ."'," : "").
        ($order->getAddress()!="" ? "".Order::$ADDRESS."='".$order->getAddress() ."'," : "").
        ($order->getTotalOrderPrice()!="" ? "".Order::$TOTAL_ORDER_PRICE."='".$order->getTotalOrderPrice() ."'," : "").
        Order::$ID_ORDER."=".$order->getIdOrder()." WHERE ". Order::$ID_ORDER ."=".$order->getIdOrder();
        $result = mysqli_query($connection,$sql);
    }

    public static function updateReview(Review $review){ 
        $connection = DB::getConection();
        $sql = "UPDATE order set ".
        // si getUserName si no está vacio que actualice el campo, si no, que no haga nada
        ($review->getOpinion()!="" ? "".Review::$OPINION."='".$review->getOpinion() ."'," : "").
        ($review->getIdArticle()!="" ? "".ArticleOrder::$ID_ARTICLE."='".$review->getIdArticle() ."'," : "").
        ($review->getStar()!="" ? "".ArticleOrder::$STAR."='".$review->getStar() ."'," : "").
        Review::$ID_REVIEW."=".$review->getIdReview()." WHERE ". Review::$ID_REVIEW ."=".$review->getIdReview();
        $result = mysqli_query($connection,$sql);
    }

    public static function updateTypeArticle(TypeArticle $typeArticle){ 
        $connection = DB::getConection();
        $sql = "UPDATE 'type' set ".
        // si getUserName si no está vacio que actualice el campo, si no, que no haga nada
        ($typeArticle->getNameArticle()!="" ? "".TypeArticle::$NAME_ARTICLE."='".$typeArticle->getNameArticle() ."'," : "").
        TypeArticle::$ID_TYPE."=".$typeArticle->getIdType()." WHERE ". TypeArticle::$ID_TYPE ."=".$typeArticle->getIdType();
        $result = mysqli_query($connection,$sql);
    }

    public static function updateRolUser(RolUser $rolUser){ 
        $connection = DB::getConection();
        $sql = "UPDATE rol_user set ".
        // si getUserName si no está vacio que actualice el campo, si no, que no haga nada
        ($rolUser->getName()!="" ? "".User::$NAME."='".$rolUser->getName() ."'," : "").
        User::$ID."=".$rolUser->getIdUser()." WHERE ". RolUser::$ID ."=".$rolUser->getIdUser();
        $result = mysqli_query($connection,$sql);
    }

    public static function updateUser(User $user){ 
        $connection = DB::getConection();
        $sql = "UPDATE user set ".
        // si getUserName si no está vacio que actualice el campo, si no, que no haga nada
        ($user->getUserName()!="" ? "".User::$USER_NAME."='".$user->getUserName() ."'," : "").
        ($user->getPassword()!="" ? "".User::$PASSWORD."='".$user->getPassword() ."'," : "").
        User::$ID_USER."=".$user->getIdUser()." WHERE ". User::$ID_USER ."=".$user->getIdUser();
        $result = mysqli_query($connection,$sql);
    }

}


?>