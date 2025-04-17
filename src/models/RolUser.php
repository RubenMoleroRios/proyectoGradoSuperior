<?php

    class RolUser{
        static $ID = 'id_rol_user' ;
        static $NAME = 'name';

        static $ID_ADMIN = 1;
        static $ID_NORMAL_USER = 2;

        static $ROLES = [


        ];

        public $idRolUser;
        public $name;

        public function __construct($idRolUser,$name) {
            $this->idRolUser = $idRolUser;
            $this->name = $name;
        }

        public function getId(): mixed{
            return $this->idRolUser;
        }        

        public function getName(): mixed {
            return $this->name;
        }

        public function setId($id): void{
            $this->id = $id;
        }

        public function setName($name): void {
            $this->name = $name;
        }

        public function isAdmin(){
            return $this->idRolUser == RolUser::$ID_ADMIN;
        }

        public function isNormalUser(){
            return $this->idRolUser == RolUser::$ID_NORMAL_USER;
        }
        
    }

?>