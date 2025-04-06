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
            <div class="col-4 col-sm-12 col-md-4 ">        
                <ul>
                    <li>
                        <?=$article->getName()?>
                    </li>
                    <li>
                        <?=$article->getDescription()?>
                    </li>
                    <?php
                        if($article->getGh()!=null){
                    ?>
                    <li>
                        <?=$article->getGh()?>
                    </li>
                    <?php
                        }                    
                        if($article->getPh()!=null){
                    ?>
                    <li>
                        <?=$article->getPh()?>
                    </li>
                    <?php
                        }
                        if($article->getLongevityInYears()!=null){
                    ?>
                    <li>
                        <?=$article->getLongevityInYears()?>
                    </li>
                    <?php
                        }
                        if($article->getTemp()!=null){
                    ?>
                    <li>
                        <?=$article->getTemp()?>
                    </li>
                    <?php
                        }
                        if($article->getPlantedIn()!=null){
                    ?>
                    <li>
                        <?=$article->getPlantedIn()?>
                    </li>

                    <?php
                    }
                    ?>
                </ul>
                    
            </div>            
    </div>                               
</div>

<?php
include_once "./shop/view/include/footer.php";
?>