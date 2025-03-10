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

        public function getIdOrder() {
            return $this->idOrder;
        }

        public function getIdUser() {
            return $this->idUser;
        }

        public function getAddress() {
            return $this->address;
        }

        public function getTotalOrderPrice() {
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