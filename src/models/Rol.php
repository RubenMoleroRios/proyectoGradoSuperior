<?php

    class RolUser{
        static $ID = 'id_rol_user' ;
        static $NAME = 'name';

        public $idRolUser;
        public $name;

        public function __construct($idRolUser,$name) {
            $this->idRolUser = $idRolUser;
            $this->name = $name;
        }

        public function getName() {
            return $this->name;
        }

        public function setName($name): void {
            $this->name = $name;
        }

        public function isAdmin(){
            return idRolUser == 1;
        }
        
    }

?>