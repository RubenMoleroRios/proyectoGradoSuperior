<?php

    class User{

        static $ID_USER = 'id_user';
        static $USER_NAME = 'user_name';
        static $PASSWORD = 'password';
        static $ID_ROL_USER = 'id_rol_user';
        
        public $idUser;
        public $userName;
        public $password;
        public $idRolUser;

        public function __construct(
            $idUser = NULL,
            $userName = NULL,
            $password = NULL,
            $idRolUser = NULL
        ) {
            $this->idUser = $idUser;
            $this->userName = $userName;
            $this->password = $password;
            $this->idRolUser = $idRolUser;
        }

        public function getIdUser() {
            return $this->idUser;
        }

        public function getUserName() {
            return $this->userName;
        }

        public function getPassword() {
            return $this->password;
        }

        public function getIdRolUser() {
            return $this->idRolUser;
        }

        public function setIdUser($idUser): void {
            $this->idUser = $idUser;
        }

        public function setUserName($userName): void {
            $this->userName = $userName;
        }

        public function setPassword($password): void {
            $this->password = $password;
        }

        public function setIdRolUser($idRolUser): void {
            $this->idRolUser = $idRolUser;
        }


    }

?>
