<?php
include_once "database.php";
include_once "./src/models/RolUser.php";
include_once "./src/models/Article.php";
include_once "./src/models/User.php";

class DB {
        
    private static $connection;

    private static function getConection(){
        
        if(!DB::$connection){
            DB::$connection = DB::connect();      
        }
        
        return DB::$connection;
    }

    private static function connect() {
        $connection = mysqli_connect(HOST, USER, PASSWORD, DATABASE);
        $connection->query("SET NAMES 'utf8'");
        if (!$connection) {
            die("No se ha podido conectar" . mysqli_connect_error());
        }else {
            print("se ha conectado correctamente.");
        }
        return $connection;
    }

    public static function getRoles() {
        $connection = DB::getConection();
        $sql = "SELECT * FROM rol_user";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            $roles = [];
            foreach ($result as $rol) {
                $roles[] = new RolUser(
                    $rol[RolUser::$ID],
                    $rol[RolUser::$NAME]
                );
            }
            return $roles;
        } else {
            return "No hay posts";
        }
    }

    public function getUsers() {
        $connection = DB::getConection();
        $sql = "SELECT * FROM user";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            $users = [];
            foreach ($result as $user) {
                $users[] = new User(
                    $user[User::$ID_USER],
                    $user[User::$USER_NAME],
                    $user[User::$PASSWORD],
                    $user[USER::$ID_ROL_USER]
                );
            }
            return $users;
        } else {
            return "No hay posts";
        }
        
    }

    public static function getArticles() {        
        $connection = DB::getConection();
        $sql = "SELECT * FROM article";
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            $articles = [];
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
            return $articles;
        } else {
            return "No hay posts";
        }
        
    }

    public static function getArticlesByType($idType) {        
        $connection = DB::getConection();
        $sql = "SELECT * FROM article where id_type = $idType";
        var_dump($sql);         
        $result = mysqli_query($connection, $sql);
        if (mysqli_num_rows($result) > 0) {
            $articles = [];
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
            return $articles;
        } else {
            return "No hay posts";
        }
        
    }

    public static function insertArticle(Article $article){
        $connection = DB::getConection();
        $sql = "INSERT into article values (
            null,".
            $article->getIdType().",'".
            $article->getName()."',".
            $article->getPh().",".
            $article->getGh().",'".
            $article->getDescription()."',".
            $article->getTemp().",".
            $article->getLongevityInYears().",".
            //Con esto hacemos una terciaria, para indicar que uno de los campos puede ir null
            ($article->getPlantedIn() ? "'".$article->getPlantedIn()."'" : "null" ).",".
            $article->getStock().",".
            $article->getPrice().            
            ")";
            echo '<pre>'.var_export($sql,true).'</pre>';
            $result = mysqli_query($connection, $sql);
    }

    public static function insertUser(User $user){
        $connection = DB::getConection();
        $sql = "INSERT into user values (
            null,'".
            $user->getUserName()."','".
            $user->getPassword()."',".
            RolUser::$ID_NORMAL_USER.
            ")";
        $result = mysqli_query($connection, $sql);
    } 

    public static function delArticle(Article $article){
        $connection = DB::getConection();
        $sql ="DELETE FROM article where id_article=".$article->getId();
        $result = mysqli_query($connection,$sql);
    }

    public static function delUser(User $user){
        $connection = DB::getConection();
        $sql ="DELETE FROM user where id_user=".$user->getIdUser();
        $result = mysqli_query($connection,$sql);
    }

    public static function modUser(User $user){
        $connection = DB::getConection();
        $sql = "UPDATE user set user_name='". $user->getUserName()."' WHERE id_user= 4";
        $result = mysqli_query($connection,$sql);
    }

    


    
}


?>