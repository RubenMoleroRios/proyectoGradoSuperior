        <div class="container">
            <footer class="py-3 my-4">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Contactanos</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Sobre Nosotros</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">FAQs</a></li>
                </ul>
                <p class="text-center text-body-secondary">© 2025 Company, Inc SHOP</p>
            </footer>
        </div>
        <script src="../public/js/shop/custom.js" type="text/javascript"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript">         
            var urlDeleteArticleCarrito = "<?=controller_action_delete_article_carrito_shop?>"; 
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