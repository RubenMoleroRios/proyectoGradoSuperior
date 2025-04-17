<?php
    include_once "./include.php";
    class OrderController{

        public function viewAdminList(): void {
            require_once "./admin/view/order/list-order-view.php";
        }

        public function viewAdminAdd(): void {            
            require_once "./admin/view/order/add-order-view.php";
        }

        public function viewAdminUpdate(): void {
            require_once "./admin/view/order/update-order-view.php";
        }

        public function getOrders(): array {
            $connection = new DB();
            return $connection::getOrders();
        }

        public function addOrder(): void {
            if(isset($_POST)){                       
                $DB = new DB();        
                $order = new Order(
                    idOrder: null,
                    idUser: $_POST['idUser'],
                    address: $_POST['address'],
                    totalOrderPrice: $_POST['totalOrderPrice'],
                );
                try{
                    $DB::insertOrder(order: $order);
                    $_SESSION['msg'] = 'Pedido añadido correctamente';
                    header(header: "Location: ".controller_action_order_list_admin);                                    
                }catch(Exception $e){
                    $_SESSION["msg"] = "El pedido no se ha podido añadir, porfavor compruebe los campos";
                    header(header:"Location: ".url_order_add_admin);                    
                }
            }
        }

        

        public function deleteOrder(): void {            
            if(isset($_GET['id'])){                
                $connection = new DB();
                $order = new Order(
                  idOrder: $_GET['id'],    
                );
                $connection->deleteOrder(order: $order);    
                $_SESSION['msg']="Pedido borrado correctamente.";            
            }else{                
                $_SESSION['msg']="Identificador del Pedido no encontrado.";
            }  
            header(header:'Location: '.controller_action_order_list_admin);         
        }

        public function updateOrder(): void {
            if(isset($_POST)){                       
                $DB = new DB();        
                $order = new Order(
                    idOrder: $_POST['idOrder'],
                    idUser: $_POST['idUser'],
                    address: $_POST['address'],
                    totalOrderPrice: $_POST['totalOrderPrice'],                   
                );
                try{
                    $DB::updateOrder( order: $order);
                    $_SESSION['msg'] = 'Pedido modificado correctamente';
                    header(header: "Location: ".controller_action_order_list_admin);                                    
                }catch(Exception $e){
                    $_SESSION["msg"] = "El pedido no se ha podido modificar, porfavor compruebe los campos";
                    header(header:"Location: ".url_order_update_admin);                    
                }
            }
        }
    }

?>