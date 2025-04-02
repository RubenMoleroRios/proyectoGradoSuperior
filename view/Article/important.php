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
            <div class="col-4 col-sm-12 col-md-4 ">
                <a href="<?=base_url_shop?>Type/article&id=<?=$fish->getId();?>">
                    <div><?=$fish->getName();?><br><?=$fish->getFormatPrice();?></div>
                </a>
            </div>                
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
            <div class="col-4 col-sm-12 col-md-4 ">
                <a href="<?=base_url_shop?>Type/article&id=<?=$plant->getId();?>">
                    <div><?=$plant->getName();?><br><?=$plant->getFormatPrice();?></div>
                </a>
            </div>               
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
           <div class="col-4 col-sm-12 col-md-4 ">
                <a href="<?=base_url_shop?>Type/article&id=<?=$accesory->getId();?>">
                    <div><?=$accesory->getName();?><br><?=$accesory->getFormatPrice();?></div>
                </a>
            </div>             
    <?php
        }
    ?>                                             
    </div>                                            
    </div>                               
</div>