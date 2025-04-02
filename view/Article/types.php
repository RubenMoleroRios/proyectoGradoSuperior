<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include_once "include.php";

    $typeController = new TypeController();
    $type = $typeController->showType();
        ?>
        <h1><?= $type->getNameType()?></h1>
        <a?php        
?>
<h1></h1>
<div class="container">
    <div class="row mb-3 text-center">       
    <?php  
        $products = $typeController->showArticlesByTypeId();
        foreach ($products as $product) {
    ?>
            <div class="col-4 col-sm-12 col-md-4 ">
                <a href="<?=base_url_shop?>Type/article&id=<?=$product->getId();?>">
                    <div><?=$product->getName()?><br><?=$product->getPrice()?>€</div>
                </a>
            </div>        
    <?php
        }
    ?>
    </div>                               
</div>