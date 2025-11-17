<?php
    class adminproductcontroller extends adminmodelprod {
        private $name;
        private $desc;
        private $price;
        private $stock;

        public function __construct($name, $desc, $price, $stock) {
            $this->name = $name;
            $this->desc = $desc;
            $this->price = $price;
            $this->stock = $stock;
        }

        public function addItem() {
            if ($this->emptyCheck()) {
                $this->errorSetter("blank_form", "Please fill up form");
            } elseif ($this->productExists()) {
                $this->errorSetter("item_err","Product always exists");
            } elseif ($this->InvalidVal()) {
                $this->errorSetter("val_err","There should be no negative values");
            } else {
                $this->insertProduct($this->name, $this->desc, $this->price, $this->stock);
                $this->successSetter('item_add', 'Product added');
            }
        }

        private function errorSetter($code, $text) {
            $error_arr = [];
            $error_arr[$code] = $text;
            $_SESSION['admin_errors'] = $error_arr;
        }

        private function successSetter($code, $text) {
            $success_arr = [];
            $success_arr[$code] = $text;
            $_SESSION['admin_good'] = $success_arr;
        }

        private function productExists() {
            if ($this->getProductName($this->name)) {
                return true;
            } else {
                return false;
            }
        }
        
        private function emptyCheck() {
            if (empty($this->name) || empty($this->desc) || empty($this->price) || empty($this->stock)) {
                return true;
            } else {
                return false;
            }
        }

        private function InvalidVal() {
            if ($this->price < 0 || $this->stock < 0) {
                return true;
            } else {
                return false;
            }
        }
    }
?>