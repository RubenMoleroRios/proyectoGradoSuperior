<?php

    class UsuarioController{

        public function index(){
            echo "Controlador usuario, acción index";
        }

        public function save(){
            if(isset($_POST)){
                $usuario = new Usuario();
                $usuario->setUserName($_POST['name']);
                $usuario->setPassword($_POST['contraseña']);
                $$usuario->save();
            }
        }

    }

?>