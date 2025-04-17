<?php
    
    class Review{

        static $ID_REVIEW = 'id_review';
        static $OPINION = 'opinion';
        static $ID_ARTICLE = 'id_article';
        static $ID_USER = 'id_user';
        static $NAME = 'name';

        public $idReview;
        public $opinion;
        public $idArticle;
        public $idUser;
        public $name;

        public function __construct(
            $idReview = NULL,
            $opinion = NULL,
            $idArticle = NULL,
            $idUser = NULL,
            $name = NULL

            ) {
            $this->idReview = $idReview;
            $this->opinion = $opinion;
            $this->idArticle = $idArticle;
            $this->idUser = $idUser;
            $this->name = $name;
        }

        public function getIdReview(): mixed {
            return $this->idReview;
        }

        public function getOpinion(): mixed {
            return $this->opinion;
        }

        public function getIdArticle(): mixed {
            return $this->idArticle;
        }

        public function getIdUser(): mixed {
            return $this->idUser;
        }
        public function getName(): mixed {
            return $this->name;
        }

        public function setIdReview($idReview): void {
            $this->idReview = $idReview;
        }

        public function setOpinion($opinion): void {
            $this->opinion = $opinion;
        }

        public function setIdArticle($idArticle): void {
            $this->idArticle = $idArticle;
        }

        public function setIdUser($idUser): void {
            $this->idUser = $idUser;
        }

        public function setName($name): void {
            $this->name = $name;
        }




    }

?>