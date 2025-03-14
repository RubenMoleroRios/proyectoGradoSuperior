<?php

    class TypeArticle{

        static $ID_TYPE = 'id_type';
        static $NAME_ARTICLE = 'name';

        static $TYPE_FISH = 1;
        static $TYPE_PLANT = 2;
        static $TYPE_ARTICLE = 3;
        

        public $idType;
        public $nameArticle;

        public function __construct(
            $idType = NULL,
            $nameArticle = NULL
            ) {
            $this->idType = $idType;
            $this->nameArticle = $nameArticle;
        }

        public function getIdType() {
            return $this->idType;
        }

        public function getNameArticle() {
            return $this->nameArticle;
        }

        public function setIdType($idType): void {
            $this->idType = $idType;
        }

        public function setNameArticle($nameArticle): void {
            $this->nameArticle = $nameArticle;
        }

    }

?>