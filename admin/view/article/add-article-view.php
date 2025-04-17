<?php
include_once "./admin/view/include/header.php";
?>

<main class="form-signin w-100 m-auto">
        <form method="POST" action="<?=controller_action_article_add_admin?>" class="was-validated" enctype="multipart/form-data">
        <img class="mb-4" src="../public/image/ilerna.png" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Añadir Artículo</h1>

        <div class="form-floating">
            <input type="number" name="idType" min="1" class="form-control">
            <label for="floatingInput">Id tipo:</label>
        </div>

        <div class="form-floating">
            <input type="text" name="name" class="form-control">
            <label for="floatingInput">Nombre:</label>
        </div>

        <div class="form-floating">
            <input type="number" name="ph" min="1" step="any" class="form-control">
            <label for="floatingInput">Ph:</label>
        </div>

        <div class="form-floating">
            <input type="number" name="gh" min="1" step="any" class="form-control">
            <label for="floatingInput">Gh:</label>
        </div>
        
        <div class="form-floating">
            <label for="floatingInput">Descripción:</label>
            <textarea name="description" rows="6" cols="38" class="form-control"></textarea>
        </div>

        <div class="form-floating">
            <input type="number" name="temp" min="1" step="any" class="form-control">
            <label for="floatingInput">Temperatura:</label>
        </div>

        <div class="form-floating">
            <input type="number" name="longevity" min="1" step="any" class="form-control">
            <label for="floatingInput">Longevidad:</label>
        </div>

        <div class="form-floating">
            <input type="text" name="plantedIn" class="form-control">
            <label for="floatingInput">Plantado en:</label>
        </div>

        <div class="form-floating">
            <input type="number" name="stock" min="1" class="form-control">
            <label for="floatingInput">Stock:</label>
        </div>

        <div class="form-floating">
            <input type="number" name="price" min="0" step="any" class="form-control">
            <label for="floatingInput">Precio:</label>
        </div>

        <div class="form-floating">            
            <input name="imageArticle" type="file"/>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Añadir</button>        
      </form>
    </main>
<?php
include_once "./admin/view/include/footer.php";
?>