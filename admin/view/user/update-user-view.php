<?php
include_once "./admin/view/include/header.php";
$db = new DB();
$int = null;
if(isset($_GET['id'])){
    $int = $_GET['id'];    
}
$user = $db::getUserById(idUser: $int);
?>

<main class="form-signin w-100 m-auto">
    <form method="POST" action="<?=controller_action_user_update_admin?>" class="was-validated">
        <img class="mb-4" src="../public/image/ilerna.png" alt="" width="72" height="57">
        <h1 class="h3 mb-3 fw-normal">Modificar Usuario</h1>   
        
        <div class="form-floating">
            <input type="number" name="id" min="1" step="any" class="form-control" value="<?=$user->getIdUser()?>" required>
            <label for="floatingInput">ID:</label>
        </div>

        <div class="form-floating">
            <input type="email" name="email" class="form-control" value="<?=$user->getEmail()?>" required>
            <label for="floatingInput">Email:</label>
        </div>

        <div class="form-floating">
            <input type="text" name="name" class="form-control" value="<?=$user->getUserName()?>" required>
            <label for="floatingInput">Nombre:</label>
        </div>

        <div class="form-floating">
            <input type="text" name="password" class="form-control" value="<?=$user->getPassword()?>" required>
            <label for="floatingInput">Contraseña:</label>
        </div>

        <div class="form-floating">
            <input type="number" name="idRol" min="1" step="any" class="form-control" value="<?=$user->getIdRolUser()?>" required>
            <label for="floatingInput">ID Rol:</label>
        </div>
        <button class="btn btn-primary w-100 py-2" type="submit">Modificar</button>        
    </form>
</main>
<?php
include_once "./admin/view/include/footer.php";
?>