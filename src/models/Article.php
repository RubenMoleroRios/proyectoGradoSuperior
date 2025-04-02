<?php

    class Article{

        static $ID = 'id_article';
        static $ID_TYPE = 'id_type';
        static $NAME = 'name';
        static $PH = 'ph';
        static $GH = 'gh';
        static $DESCRIPTION = 'description';
        static $TEMP = 'temp';
        static $LONGEVITY_IN_YEARS = 'longevity_in_years';
        static $PLANTED_IN = 'planted_in';
        static $STOCK = 'stock';
        static $PRICE = 'price';

        public ?int $id;
        public ?int $idType;
        public ?String $name;
        public ?float $ph;
        public ?float $gh;
        public ?String $description;
        public ?int $temp;
        public ?int $longevityInYears;
        //con la interrogación decimos que puede ser string y nulo 
        public ?String $plantedIn;
        public ?int $stock;
        public ?float $price;

        public function __construct(
            $id = NULL,
            $idType = NULL,
            $name = NULL,
            $ph = NULL,
            $gh = NULL,
            $description = NULL,
            $temp = NULL,
            $longevityInYears = NULL,
            $plantedIn = NULL,
            $stock = NULL,
            $price = NULL
        ) {
            $this->id = $id;
            $this->idType = $idType;
            $this->name = $name;
            $this->ph = $ph;
            $this->gh = $gh;
            $this->description = $description;
            $this->temp = $temp;
            $this->longevityInYears = $longevityInYears;
            $this->plantedIn = $plantedIn;
            $this->stock = $stock;
            $this->price = $price;
        }

        public function getId(): int|null {
            return $this->id;
        }

        public function getIdType(): int|null {
            return $this->idType;
        }

        public function getName(): string|null {
            return $this->name;
        }

        public function getPh(): float|null {
            return $this->ph;
        }

        public function getGh(): float|null {
            return $this->gh;
        }

        public function getDescription(): string|null {
            return $this->description;
        }

        public function getTemp(): int|null {
            return $this->temp;
        }

        public function getLongevityInYears(): int|null {
            return $this->longevityInYears;
        }

        public function getPlantedIn(): string|null {
            return $this->plantedIn;
        }

        public function getStock(): int|null {
            return $this->stock;
        }

        public function getPrice(): float|null {
            return $this->price;
        }

        
        public function getFormatPrice(): string {
            return $this->price." €";
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

        public function setLongevityInYears($longevityInYears): void {
            $this->longevityInYears = $longevityInYears;
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