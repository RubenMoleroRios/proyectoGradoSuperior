<?php

    class RolUser{
        static $ID = 'id_rol_user' ;
        static $NAME = 'name';

        static $ID_ADMIN = 1;
        static $ID_NORMAL_USER = 2;

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
            return idRolUser == RolUser::$ID_ADMIN;
        }

        public function isNormalUser(){
            return idRolUser == RolUser::$ID_NORMAL_USER;
        }
        
    }

?>