<?php

    class TypeArticle{

        static $ID_TYPE = 'id_type';
        static $NAME_TYPE = 'name';

        static $TYPE_FISH = 1;
        static $TYPE_PLANT = 2;
        static $TYPE_ARTICLE = 3;
        

        public $idType;
        public $nameType;

        public function __construct(
            $idType = NULL,
            $nameType = NULL
            ) {
            $this->idType = $idType;
            $this->nameType = $nameType;
        }

        public function getIdType(): mixed {
            return $this->idType;
        }

        public function getNameType(): mixed {
            return $this->nameType;
        }

        public function setIdType($idType): void {
            $this->idType = $idType;
        }

        public function setNameType($nameType): void {
            $this->nameType = $nameType;
        }

    }

?>