<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once "include.php";
include_once "./shop/view/include/header.php";
?>                
<div class="carrito-div">
    <h1>Resumen del pedido</h1>
    <table class="carrito-table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Unidades</th>
                <th>Precio Unidades</th>
            </tr>
        </thead>
        <?php
        $carrito = $_SESSION['carrito'];
        $totalPriceOrder = 0;
        foreach($carrito as $indice => $article){
        ?>
        <tbody>
            <tr>                       
                <td class="carrito-td"><?=$article['name']?></td>
                <td class="carrito-td"><?=$article['price']?> €</td>
                <td class="carrito-td"><?=$article['quantity']?></td>
                <td class="carrito-td"><?=$totalPriceArticle = $article['quantity']*$article['price']?> €</td>
                <td class="carrito-td">
                    <a href="#" type="button" class="btn btn-outline-secondary delete-article"  data-id="<?=$indice?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5M11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47M8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5"></path>
                    </svg>                                
                    </a> 
                </td>
            </tr>
        <?php
                $totalPriceOrder+=$totalPriceArticle;
            }
        ?>        
        </tbody>           
        <tfoot class="tfoot">
            <tr>
                <td>                    
                    <h4>Precio Total: <?php
                        echo $totalPriceOrder?> €
                    </h4>                                     
                </td>
            </tr>                    
        </tfoot>                                       
    </table>    
    <div class="finalizar-pedido-div">

    <form method="POST" action="<?=controller_action_carrito_end_shop?>">
        <img class="mb-4" src="../public/image/ilerna.png" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Añada una dirección:</h1>
        <div class="form-floating">
          <input type="text" name="address" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Realizar compra</button>
    </form>
    
</div>
    
</div>



<?php
include_once "./shop/view/include/footer.php";
?>