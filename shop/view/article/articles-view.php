<?php
if (!isset($_SESSION)) {
    session_start();
}
include_once "include.php";
include_once "./shop/view/include/header.php";
?>
<div class="container">
    <div class="row mb-3 text-center">       
    <?php  
        $articleController = new ArticleController();
        $article = $articleController->getArticleById();
    ?>
        <div class="row">
            <div class="col">                     
                                                                            <!-- Aquí hacemos que le añada un numero aleatorio al final de la imagen, 
                                                                            para que si cambiamos la foto no la mantenga en caché el navegador -->
                    <img src="../public/image/articles/<?=$article->getId()?>.jpg?<?=rand()?>" class="image-article-view"/>       
            </div>
            <div class="col info-articles">
            <ul>
                    <li>
                        <h6>Nombre:</h6> <?=$article->getName()?>
                        
                    </li>
                    <br>
                    <li>
                        <h6>Descripción:</h6> <?=$article->getDescription()?>

                    </li>
                    <br>
                        <?php
                            if($article->getGh()!=null){
                        ?>
                    <li>                        
                        <h6>GH:</h6>Viven en aguas de una concentracón de ph de <?=$article->getGh()?>
                    </li>
                    <?php
                        }                    
                        if($article->getPh()!=null){
                    ?>
                    <br>
                    <li>
                        <h6>PH:</h6> Viven en aguas de una concentracón de ph de <?=$article->getPh()?>
                    </li>
                    <?php
                        }
                        if($article->getLongevityInYears()!=null){
                    ?>
                    <br>
                    <li>
                        <h6>Longevidad:</h6>Tiene una longevidad de unos <?=$article->getLongevityInYears()?> años.
                    </li>
                    <?php
                        }
                        if($article->getTemp()!=null){
                    ?>
                    <br>
                    <li>

                        <h6>Temperatura:</h6>Su temperatura ideal se encuentra entorno a los <?=$article->getTemp()?>º
                    </li>
                    <?php
                        }
                        if($article->getPlantedIn()!=null){
                    ?>
                    <br>
                    <li>
                        <h6>Plantado:</h6>Se planta sobre <?=$article->getPlantedIn()?>
                    </li>
                    <?php
                    }
                    ?>
                </ul>
                <form method="POST" action="<?=controller_action_add_carrito_shop?>">
                    <div class="col-5 w-100 div-button-cart">
                        <button class="btn btn-primary py-2" type="submit">Añadir al carrito</button>
                        <input type="number" name="quantity" value="1" inputmode="numeric" min="1" style="display: inline;" class="input-quantity">                         
                    </div>                    
                    <input type="number" name="id" inputmode="numeric" style="display: none;" value="<?=$article->getId()?>">   
                </form>
            </div>
        </div>         
    </div>    

    <div class="container-review">
        <div class="div-review">
            <form method="POST" action="<?=controller_action_add_review_shop?>">
                <input type="hidden" name="idArticle" value="<?=$article->getId()?>" inputmode="numeric" style="display: inline;">
                <label for="floatingInput">Rewiew:</label>
                <div class="form-floating">                                
                    <textarea name="review" rows="10" class="form-control" required></textarea>
                    <button class="btn btn-primary py-2 btn-review" type="submit">Añadir opinión</button>
                </div>
            </form>
        </div>
        

        <div class="div-review ">
            <div class="row mb text-center">       
            <?php  
                $reviewController = new ReviewController();
                $reviews = $reviewController->getReviewsByIdArticle(idArticle: $article->getId());            

                foreach ($reviews as $review) {                
            ?>          
                    <div class="col-12 ">                    
                            <div><?=$review->getName()?>: <?=$review->getOpinion();?></div>
                    </div>                
            <?php
                }
                
            ?>
            </div>    
        </div>  
    </div>
      
</div>


<?php
include_once "./shop/view/include/footer.php";
?>