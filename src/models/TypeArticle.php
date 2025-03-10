<?php

    class TypeArticle{

        static $ID_TYPE = 'id_type';
        static $NAME_ARTICLE = 'name';

        public $idType;
        public $nameArticle;

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