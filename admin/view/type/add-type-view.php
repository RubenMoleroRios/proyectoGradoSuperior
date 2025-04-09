<?php
include_once "./admin/view/include/header.php";
?>

<main class="form-signin w-100 m-auto">
        <form method="POST" action="<?=controller_action_type_add_admin?>" class="was-validated">
        <img class="mb-4" src="../public/image/ilerna.png" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Añadir Tipo</h1>

        <div class="form-floating">
            <input type="text" name="name" class="form-control">
            <label for="floatingInput">Nombre:</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Añadir</button>        
      </form>
    </main>
<?php
include_once "./admin/view/include/footer.php";
?>