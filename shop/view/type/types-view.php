<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include_once "include.php";
    include_once "./shop/view/include/header.php";
    $typeController = new TypeController();
    $type = $typeController->showType();
?>
    <h1><?= $type->getNameType()?></h1>
        
<div class="container">
    <div class="row mb-3 text-center">       
    <?php  
        $products = $typeController->showArticlesByTypeId();
        foreach ($products as $product) {
    ?>
            <div class="col-4 col-sm-12 col-md-4 mb-3">
                <a href="<?=controller_action_article_list_shop?>&id=<?=$product->getId();?>">
                    <div><?=$product->getName()?></div>
                    <div><?=$product->getFormatPrice()?></div>
                </a>
            </div>        
    <?php
        }
    ?>
    </div>                               
</div>
<?php
include_once "./shop/view/include/footer.php";
?>