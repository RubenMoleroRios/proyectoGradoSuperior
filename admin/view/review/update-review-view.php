<?php
include_once "./admin/view/include/header.php";
$db = new DB();
$int = null;
if(isset($_GET['id'])){
    $int = $_GET['id'];    
}

$review = $db::getReviewById( idReview: $int );
$articles = (new ArticleController())->getArticles();
?>

<main class="form-signin w-100 m-auto">
        <form method="POST" action="<?=controller_action_review_update_admin?>" class="was-validated" enctype="multipart/form-data">
        <img class="mb-4" src="../public/image/ilerna.png" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Actualizar Review</h1>

        <div class="form-floating">
            <input type="number" name="id" min="1" class="form-control" value="<?=$review->getIdReview()?>" required>
            <label for="id">Id: </label>                        
        </div>

        <div class="form-floating">
            <label for="floatingInput">Opinion: </label>
            <textarea name="opinion" rows="6"  class="form-control" maxlength="400" required><?=$review->getOpinion()?></textarea>
        </div>

        <div class="form-floating">            
            <select name="idArticle" required>
                <?php
                    foreach ($articles as $article) {
                        echo "<option value='".$article->getId()."'>".$article->getName()."</option>";
                    }
                ?>
            </select>
        </div>  

        <div class="form-floating">
            <input type="number" name="idUser" min="1" class="form-control" value="<?=$review->getIdUser()?>" required>
            <label for="idUser">Id Usuario: </label>                        
        </div>

        <div class="form-floating">
            <input type="text" name="name" class="form-control" value="<?=$review->getName();?>" required>
            <label for="name">Nombre: </label>
        </div>           

        <button class="btn btn-primary w-100 py-2" type="submit">Actualizar</button>        
      </form>
    </main>
<?php
include_once "./admin/view/include/footer.php";
?>