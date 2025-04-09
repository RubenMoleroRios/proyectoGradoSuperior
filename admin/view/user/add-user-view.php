<?php
include_once "./admin/view/include/header.php";
?>

<main class="form-signin w-100 m-auto">
    <form method="POST" action="<?=controller_action_user_add_admin?>" class="was-validated">
        <img class="mb-4" src="../public/image/ilerna.png" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Añadir Usuario</h1>    

        <div class="form-floating">
            <input type="email" name="email" class="form-control" required>
            <label for="floatingInput">Email:</label>
        </div>

        <div class="form-floating">
            <input type="text" name="name" class="form-control" required>
            <label for="floatingInput">Nombre:</label>
        </div>

        <div class="form-floating">
            <input type="text" name="password" class="form-control" required>
            <label for="floatingInput">Contraseña:</label>
        </div>

        <div class="form-floating">
            <input type="number" name="idRol" min="1" step="any" class="form-control" required>
            <label for="floatingInput">ID Rol:</label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Añadir</button>        
    </form>
</main>
<?php
include_once "./admin/view/include/footer.php";
?>