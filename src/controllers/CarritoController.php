<?php
include_once "./include.php";
class CarritoController{

    public function index(): void{       
        $carrito = $_SESSION['carrito']; 
        include_once "./shop/view/carrito/carrito.php";
    }

    public function vistaFinalizarCarrito(): void{       
        include_once "./shop/view/carrito/vistaFinalizarCarrito.php";
    }

    public function add(): void {        
        if(isset($_POST['id']) && isset($_POST['quantity'])){
            $articleId = $_POST['id'];            
            $quantity = $_POST['quantity'];            
        }else{
            header(header: 'Location:'.url_base_shop);
        }       
        $articleUpdatedOnCart = false;
        foreach($_SESSION['carrito'] as $indice=>$idArticle){                       
            if($idArticle['id'] == $articleId){                    
                $_SESSION['carrito'][$indice]['quantity']+=$quantity;
                $articleUpdatedOnCart = true;
            }
        }
        header(header: "Location:".controller_action_list_carrito_shop);        
           
        if(!$articleUpdatedOnCart){
            $db = new DB;
            $article = $db::getArticleById(id: $articleId);

            if(is_object(value: $article)){
                $_SESSION['carrito'][] = array(
                    "id" => $article->id,
                    "price" => $article->price,
                    "quantity" => $quantity,
                    "name" => $article->name,
                    "article" => serialize(value: $article),
                );
            }
            header(header: "Location:".controller_action_list_carrito_shop);
        }
    }

    public function deleteArticle(): void{
        if(isset($_GET['id'])){                    
            unset($_SESSION['carrito'][$_GET['id']]);
            $_SESSION['msg']="Articulo borrado correctamente.";  
            if(empty($_SESSION['carrito'])){  
                $_SESSION['carrito'] = [];
                header(header: 'Location:'.url_base_shop);
            }else{
                header(header:'Location: '.controller_action_list_carrito_shop);   
            }                                       
        }else{                
            $_SESSION['msg']="Identificador del Articulo no encontrado.";
            header(header:'Location: '.controller_action_list_carrito_shop);   
        }      
    }

    public function endCarritoShop(): void{  
        
        if(isset($_SESSION['auth_shop'])){
            $carrito = $_SESSION['carrito']; 
            $totalPriceOrder = 0;
            foreach($carrito as $article){
                $totalPriceOrder+=$article['quantity']*$article['price'];
            }

            $db = new DB();
            $order = new Order(
                idOrder: null,
                idUser: unserialize(data: $_SESSION['auth_shop'])->getIdUser(),
                address: $_POST['address'],
                totalOrderPrice: $totalPriceOrder,
            );

            $id = $db::insertOrder(order: $order);

    
            foreach($carrito as $article){
                $articleOrder = new ArticleOrder(
                    idArticleOrder: null,
                    idArticle: $article['id'],
                    idOrder: $id,
                    quantity: $article['quantity'],
                    totalArticlePrice: $article['quantity']*$article['price'],
                );
                $db::insertArticleOrder(articleOrder: $articleOrder);    
            }

            $_SESSION['carrito'] = [];
            $_SESSION['msg']="Pedido realizado correctamente, lo recibirá en breve.";
            header(header:'Location:'.url_base_shop);
        }else{
            $_SESSION['msg']="Por favor, loguéate antes de finalizar el pedido.";
            header(header:'Location: '.url_login_shop);
        }
    }






}


?>