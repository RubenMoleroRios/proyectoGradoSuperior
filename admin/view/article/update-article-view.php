<?php
include_once "./admin/view/include/header.php";
$db = new DB();
$int = null;
if(isset($_GET['id'])){
    $int = $_GET['id'];    
}

$article = $db::getArticleById( id: $int);
?>

<main class="form-signin w-100 m-auto">
        <form method="POST" action="<?=controller_action_article_update_admin?>" class="was-validated">
        <img class="mb-4" src="../public/image/ilerna.png" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Añadir Artículo</h1>

        <div class="form-floating">
            <input type="number" name="id" min="1" class="form-control" value="<?=$article->getId()?>" required>
            <label for="id">Id: </label>                        
        </div>

        <div class="form-floating">
            <input type="number" name="idType" min="1" class="form-control" value="<?=$article->getIdType()?>" required>
            <label for="floatingInput">Id tipo:</label>
        </div>

        <div class="form-floating">
            <input type="text" name="name" class="form-control" value="<?=$article->getName();?>" required>
            <label for="floatingInput">Nombre: </label>
        </div>

        <div class="form-floating">
            <input type="number" name="ph" min="1" step="any" class="form-control" value="<?=$article->getPh()?>">
            <label for="floatingInput">Ph: </label>
        </div>

        <div class="form-floating">
            <input type="number" name="gh" min="1" step="any" class="form-control" value="<?=$article->getGh()?>">
            <label for="floatingInput">Gh: </label>
        </div>
        
        <div class="form-floating">
            <label for="floatingInput">Descripción: </label>
            <textarea id="story" name="description" rows="6" cols="38" class="form-control" required> 
                <?=$article->getDescription()?>
            </textarea>
        </div>

        <div class="form-floating">
            <input type="number" name="temp" min="1" step="any" class="form-control" value="<?=$article->getTemp()?>">
            <label for="floatingInput">Temperatura: </label>
        </div>

        <div class="form-floating">
            <input type="number" name="longevity" min="1" step="any" class="form-control" value="<?=$article->getLongevityInYears()?>">
            <label for="floatingInput">Longevidad: </label>
        </div>

        <div class="form-floating">
            <input type="text" name="plantedIn" class="form-control" value="<?=$article->getPlantedIn()?>">
            <label for="floatingInput">Plantado en: </label>
        </div>

        <div class="form-floating">
            <input type="number" name="stock" min="1" class="form-control" value="<?=$article->getStock()?>" required>
            <label for="floatingInput">Stock: </label>
        </div>

        <div class="form-floating">
            <input type="number" name="price" min="0" step="any" class="form-control" value="<?=$article->getPrice()?>" required>
            <label for="floatingInput">Precio: </label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Añadir</button>        
      </form>
    </main>
<?php
include_once "./admin/view/include/footer.php";
?>