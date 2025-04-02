<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include_once "include.php";
?>     
<div class="container">
    <div class="row mb-3 text-center">       
    <?php  
        $product = new ArticleController();
        $fishes = $product->getRandomFish();
        foreach ($fishes as $fish) {
    ?>
            <div class="col-4 col-sm-12 col-md-4 "><div><?=$fish->getName();?><br><?=$fish->getPrice();?>€</div></div>                
    <?php
        }
    ?>
    </div>    
    <div class="row mb-3 text-center">                
    <?php  
        $product = new ArticleController();
        $plants = $product->getRandomPlant();
        foreach ($plants as $plant) {
    ?>
            <div class="col-4 col-sm-12 col-md-4 "><div><?=$plant->getName();?><br><?=$plant->getPrice();?>€</div></div>                
    <?php
        }
    ?>                                             
    </div>   
    <div class="row mb-3 text-center">                
    <?php  
        $product = new ArticleController();
        $accesories = $product->getRandomAccesory();
        foreach ($accesories as $accesory) {
    ?>
            <div class="col-4 col-sm-12 col-md-4 "><div><?=$accesory->getName();?><br><?=$accesory->getPrice();?>€</div></div>                
    <?php
        }
    ?>                                             
    </div>                                            
    </div>                               
</div>