<?php

    class Order{

        static $ID_ORDER = 'id_order';
        static $ID_USER = 'id_user';
        static $ADDRESS = 'address';
        static $TOTAL_ORDER_PRICE = 'total_order_price';

        public $idOrder;
        public $idUser;
        public $address;
        public $totalOrderPrice;

        public function __construct(
            $idOrder = NULL,
            $idUser = NULL,
            $address = NULL,
            $totalOrderPrice = NULL
            ) {
            $this->idOrder = $idOrder;
            $this->idUser = $idUser;
            $this->address = $address;
            $this->totalOrderPrice = $totalOrderPrice;
        }

        public function getIdOrder(): mixed {
            return $this->idOrder;
        }

        public function getIdUser(): mixed {
            return $this->idUser;
        }

        public function getAddress(): mixed {
            return $this->address;
        }

        public function getTotalOrderPrice(): mixed {
            return $this->totalOrderPrice;
        }

        public function setIdOrder($idOrder): void {
            $this->idOrder = $idOrder;
        }

        public function setIdUser($idUser): void {
            $this->idUser = $idUser;
        }

        public function setAddress($address): void {
            $this->address = $address;
        }

        public function setTotalOrderPrice($totalOrderPrice): void {
            $this->totalOrderPrice = $totalOrderPrice;
        }

    }

?>