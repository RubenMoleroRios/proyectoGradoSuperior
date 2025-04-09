<?php
include_once "./admin/view/include/header.php";
$db = new DB();
$int = null;
if(isset($_GET['id'])){
    $int = $_GET['id'];    
}

$type = $db::getTypeArticleById(id: $int);
?>

<main class="form-signin w-100 m-auto">
        <form method="POST" action="<?=controller_action_type_update_admin?>" class="was-validated">
        <img class="mb-4" src="../public/image/ilerna.png" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Modificar Tipo</h1>
        
        <input type="hidden" name="idType" min="1" class="form-control" value="<?=$type->getIdType()?>">

        <div class="form-floating">
            <input type="text" name="name" class="form-control" value="<?=$type->getNameType()?>">
            <label for="floatingInput">Nombre:</label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Modificar</button>        
      </form>
    </main>
<?php
include_once "./admin/view/include/footer.php";
?>