<?php

    class Article{

        static $ID = 'id_article';
        static $ID_TYPE = 'id_type';
        static $NAME = 'name';
        static $PH = 'ph';
        static $GH = 'gh';
        static $DESCRIPTION = 'description';
        static $TEMP = 'temp';
        static $LONGEVITY = 'longevity';
        static $PLANTED_IN = 'planted_in';
        static $STOCK = 'stock';
        static $PRICE = 'price';

        public $id;
        public $idType;
        public $name;
        public $ph;
        public $gh;
        public $description;
        public $temp;
        public $longevity;
        public $plantedIn;
        public $stock;
        public $price;

        public function getId() {
            return $this->id;
        }

        public function getIdType() {
            return $this->idType;
        }

        public function getName() {
            return $this->name;
        }

        public function getPh() {
            return $this->ph;
        }

        public function getGh() {
            return $this->gh;
        }

        public function getDescription() {
            return $this->description;
        }

        public function getTemp() {
            return $this->temp;
        }

        public function getLongevity() {
            return $this->longevity;
        }

        public function getPlantedIn() {
            return $this->plantedIn;
        }

        public function getStock() {
            return $this->stock;
        }

        public function getPrice() {
            return $this->price;
        }

        public function setId($id): void {
            $this->id = $id;
        }

        public function setIdType($idType): void {
            $this->idType = $idType;
        }

        public function setName($name): void {
            $this->name = $name;
        }

        public function setPh($ph): void {
            $this->ph = $ph;
        }

        public function setGh($gh): void {
            $this->gh = $gh;
        }

        public function setDescription($description): void {
            $this->description = $description;
        }

        public function setTemp($temp): void {
            $this->temp = $temp;
        }

        public function setLongevity($longevity): void {
            $this->longevity = $longevity;
        }

        public function setPlantedIn($plantedIn): void {
            $this->plantedIn = $plantedIn;
        }

        public function setStock($stock): void {
            $this->stock = $stock;
        }

        public function setPrice($price): void {
            $this->price = $price;
        }

        
    }


?>