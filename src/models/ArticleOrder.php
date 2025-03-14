<?php

    class ArticleOrder{

        static $ID_ARTICLE_ORDER = 'id_article_order';
        static $ID_ARTICLE = 'id_article';
        static $ID_ORDER = 'id_order';
        static $QUANTITY = 'quantity';
        static $TOTAL_ARTICLE_PRICE = 'total_article_price';

        public $idArticleOrder;
        public $idArticle;
        public $idOrder;
        public $quantity;
        public $totalArticlePrice;

        public function __construct(
            $idArticleOrder = NULL,
            $idArticle = NULL,
            $idOrder = NULL,
            $quantity = NULL,
            $totalArticlePrice = NULL
            ) {
            $this->idArticleOrder = $idArticleOrder;
            $this->idArticle = $idArticle;
            $this->idOrder = $idOrder;
            $this->quantity = $quantity;
            $this->totalArticlePrice = $totalArticlePrice;
        }

        public function getIdArticleOrder() {
            return $this->idArticleOrder;
        }

        public function getIdArticle() {
            return $this->idArticle;
        }

        public function getIdOrder() {
            return $this->idOrder;
        }

        public function getQuantity() {
            return $this->quantity;
        }

        public function getTotalArticlePrice() {
            return $this->totalArticlePrice;
        }

        public function setIdArticleOrder($idArticleOrder): void {
            $this->idArticleOrder = $idArticleOrder;
        }

        public function setIdArticle($idArticle): void {
            $this->idArticle = $idArticle;
        }

        public function setIdOrder($idOrder): void {
            $this->idOrder = $idOrder;
        }

        public function setQuantity($quantity): void {
            $this->quantity = $quantity;
        }

        public function setTotalArticlePrice($totalArticlePrice): void {
            $this->totalArticlePrice = $totalArticlePrice;
        }




    }

?>