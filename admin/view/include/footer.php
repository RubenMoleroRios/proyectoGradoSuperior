        <div class="container">
            <footer class="py-3 my-4">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Contactanos</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Sobre Nosotros</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
                </ul>
                <p class="text-center text-body-secondary">© 2025 Company, Inc ADMIN</p>
            </footer>
        </div>
        <script src="../public/js/admin/custom.js" type="text/javascript"></script>
        
        <script type="text/javascript">
            var urlDeleteArticle = "<?=controller_action_article_delete_admin?>";
            var urlUpdateArticle = "<?=controller_action_article_view_update_admin?>";

            var urlDeleteOrder = "<?=controller_action_order_delete_admin?>";
            var urlUpdateOrder = "<?=controller_action_order_view_update_admin?>";

            var urlDeleteType = "<?=controller_action_type_delete_admin?>";
            var urlUpdateType = "<?=controller_action_type_view_update_admin?>";

            var urlDeleteUser = "<?=controller_action_user_delete_admin?>";
            var urlUpdateUser = "<?=controller_action_user_view_update_admin?>";
            <?php
            /*
                Aquí indicamos que si hay una sesión llamada msg, primero que espere a cargar la página completamente
                y luego muestre un alert con el mensaje indicado y luego borra el msg de sesion con unset para que al recargar
                la página no vuelva a salir el mensaje.
            */
                if (isset($_SESSION['msg'])){                    
                    ?>
                    window.onload = (event) => {
                        alert("<?=$_SESSION['msg']?>");
                    };                    
                    <?php
                    unset($_SESSION['msg']);
                }
            ?>
        </script>

    </body>
</html>