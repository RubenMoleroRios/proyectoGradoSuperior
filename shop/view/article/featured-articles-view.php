<?php
    if (!isset($_SESSION)) {
        session_start();
    }
    include_once "include.php";
    include_once "./shop/view/include/header.php";

    $articleController = new ArticleController();
    $article1 = $articleController->getRandomArticle();
    $article2 = $articleController->getRandomArticle();
    $article3 = $articleController->getRandomArticle();
    $article4 = $articleController->getRandomArticle();
    $article5 = $articleController->getRandomArticle();
    $article6 = $articleController->getRandomArticle();
    $article7 = $articleController->getRandomArticle();
    $article8 = $articleController->getRandomArticle();
    $article9 = $articleController->getRandomArticle();
    ?>





<div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
    <h1>Artículos en descuento:</h1>
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img src="../public/image/articles/<?=$article1->getId()?>.jpg?<?=rand()?>" class="d-inline  image-article-featured-carrousell" alt="...">
        <img src="../public/image/articles/<?=$article2->getId()?>.jpg?<?=rand()?>" class="d-inline  image-article-featured-carrousell" alt="...">
        <img src="../public/image/articles/<?=$article3->getId()?>.jpg?<?=rand()?>" class="d-inline  image-article-featured-carrousell" alt="...">

    </div>
    <div class="carousel-item">
    <img src="../public/image/articles/<?=$article4->getId()?>.jpg?<?=rand()?>" class="d-inline  image-article-featured-carrousell" alt="...">
        <img src="../public/image/articles/<?=$article5->getId()?>.jpg?<?=rand()?>" class="d-inline  image-article-featured-carrousell" alt="...">
        <img src="../public/image/articles/<?=$article6->getId()?>.jpg?<?=rand()?>" class="d-inline  image-article-featured-carrousell" alt="...">
    </div>
    <div class="carousel-item">
    <img src="../public/image/articles/<?=$article7->getId()?>.jpg?<?=rand()?>" class="d-inline  image-article-featured-carrousell" alt="...">
        <img src="../public/image/articles/<?=$article8->getId()?>.jpg?<?=rand()?>" class="d-inline  image-article-featured-carrousell" alt="...">
        <img src="../public/image/articles/<?=$article9->getId()?>.jpg?<?=rand()?>" class="d-inline  image-article-featured-carrousell" alt="...">
    </div>
  </div>
</div>



<div class="container div-features-manual">
    <h1>Artículos más vendidos</h1>
    <div class="row mb-3 text-center">       
    <?php  
        $product = new ArticleController();
        $fishes = $product->getRandomFish(limit: 3);
        foreach ($fishes as $fish) {
    ?>  
            <div class="col-4 col-sm-12 col-md-4 ">
                <a href="<?=controller_action_article_list_shop?>&id=<?=$fish->getId();?>" class="a-image-article-featured">
                    <img src="../public/image/articles/<?=$fish->getId()?>.jpg?<?=rand()?>" class="image-article-featured"/>
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
        $plants = $product->getRandomPlant(limit: 3);
        foreach ($plants as $plant) {
    ?>
            <div class="col-4 col-sm-12 col-md-4 ">
                <a href="<?=controller_action_article_list_shop?>&id=<?=$plant->getId();?>" class="a-image-article-featured">
                    <img src="../public/image/articles/<?=$plant->getId()?>.jpg?<?=rand()?>" class="image-article-featured"/>
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
        $accesories = $product->getRandomAccesory(limit: 3);
        foreach ($accesories as $accesory) {
    ?>
           <div class="col-4 col-sm-12 col-md-4 ">
                <a href="<?=controller_action_article_list_shop?>&id=<?=$accesory->getId();?>" class="a-image-article-featured">
                    <img src="../public/image/articles/<?=$accesory->getId()?>.jpg?<?=rand()?>" class="image-article-featured"/>
                    <div><?=$accesory->getName();?><br><?=$accesory->getFormatPrice();?></div>
                </a>
            </div>             
    <?php
        }
    ?>                                             
    </div>                                            
    </div>                               
</div>

<?php
include_once "./shop/view/include/footer.php";
?>