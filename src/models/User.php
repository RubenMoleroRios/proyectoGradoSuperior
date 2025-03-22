<?php

    class User{

        static $ID_USER = 'id_user';
        static $EMAIL = "email";
        static $USER_NAME = 'user_name';
        static $PASSWORD = 'password';
        static $ID_ROL_USER = 'id_rol_user';
        
        public $idUser;
        public $email;        
        public $userName;
        public $password;
        public $idRolUser;

        public function __construct(
            $idUser = NULL,
            $email = NULL,
            $userName = NULL,
            $password = NULL,
            $idRolUser = NULL
        ) {
            $this->idUser = $idUser;
            $this->email = $email;
            $this->userName = $userName;
            $this->password = $password;
            $this->idRolUser = $idRolUser;
        }

        public function getIdUser() {
            return $this->idUser;
        }

        public function getEmail() {
            return $this->email;
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

        public function setEmail($email): void {
            $this->idUser = $email;
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
