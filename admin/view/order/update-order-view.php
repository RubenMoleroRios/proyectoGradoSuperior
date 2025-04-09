<?php
include_once "./admin/view/include/header.php";
$db = new DB();
$int = null;
if(isset($_GET['id'])){
    $int = $_GET['id'];    
}

$order = $db::getOrderById(idOrder: $int);
?>

<main class="form-signin w-100 m-auto">
        <form method="POST" action="<?=controller_action_order_update_admin?>" class="was-validated">
        <img class="mb-4" src="../public/image/ilerna.png" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Modificar Pedido</h1>

        <div class="form-floating">
            <input type="number" name="idOrder" min="1" class="form-control" value="<?=$order->getIdOrder()?>">
            <label for="floatingInput">Id Pedido:</label>
        </div>

        <div class="form-floating">
            <input type="number" name="idUser" min="1" class="form-control" value="<?=$order->getIdUser()?>">
            <label for="floatingInput">Id Usuario:</label>
        </div>

        <div class="form-floating">
            <input type="text" name="address" class="form-control" value="<?=$order->getAddress()?>">
            <label for="floatingInput">Dirección:</label>
        </div>

        <div class="form-floating">
            <input type="number" name="totalOrderPrice" min="1" step="any" class="form-control" value="<?=$order->getTotalOrderPrice()?>">
            <label for="floatingInput">Precio total:</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Añadir</button>        
      </form>
    </main>
<?php
include_once "./admin/view/include/footer.php";
?>