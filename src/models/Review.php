<?php
    
    class Review{

        static $ID_REVIEW = 'id_review';
        static $OPINION = 'opinion';
        static $ID_ARTICLE = 'id_article';
        static $STAR = 'star';

        public $idReview;
        public $opinion;
        public $idArticle;
        public $star;

        public function __construct(
            $idReview = NULL,
            $opinion = NULL,
            $idArticle = NULL,
            $star = NULL
            ) {
            $this->idReview = $idReview;
            $this->opinion = $opinion;
            $this->idArticle = $idArticle;
            $this->star = $star;
        }

        public function getIdReview() {
            return $this->idReview;
        }

        public function getOpinion() {
            return $this->opinion;
        }

        public function getIdArticle() {
            return $this->idArticle;
        }

        public function getStar() {
            return $this->star;
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

        public function setStar($star): void {
            $this->star = $star;
        }




    }

?>