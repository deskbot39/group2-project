<?php
    class cartcontroller extends cartmodel {
        private $cart_id;
        private $product_id;
        private $quantity;

        public function __construct($cart_id, $product_id, $quantity) {
            $this->cart_id = $cart_id;
            $this->product_id = $product_id;
            $this->quantity = $quantity;
        }

        public function addItem() {
            if ($this->emptyInput()) {
                $this->errorSetter('empty_data', 'Fill all fields');
            } elseif ($this->nullValue()) {
                $this->errorSetter('invalid_val', 'Value cannot be negative');
            } else {
                $this->addProductQuantity($this->cart_id, $this->product_id);
                $this->updateCartTotal($this->cart_id, $this->product_id);
            }
        }
        
        public function subItem() {
            if ($this->emptyInput()) {
                $this->errorSetter('empty_data', 'Fill all fields');
            } elseif ($this->nullValue()) {
                $this->errorSetter('invalid_val', 'Value cannot be negative or 0');
            } else {
                $this->subtractProductQuantity($this->cart_id, $this->product_id);
                $this->updateCartTotal($this->cart_id, $this->product_id);
            }
            
        }
        
        public function add2Cart() {
            if ($this->emptyInput()) {
                $this->errorSetter('empty_data', 'Fill all fields');
            } elseif ($this->nullValue()) {
                $this->errorSetter('invalid_val', 'Value cannot be negative or 0');
            } else {
                $this->addtoCart($this->cart_id, $this->product_id);
            }

        }

        private function errorSetter($code, $text) {
            $error_arr = [];
            $error_arr[$code] = $text;
            $_SESSION['cart_errors'] = $error_arr;
            header('Location: ../../shopping-cart.php');
            die();
        }
        private function emptyInput() {
            if (empty($this->cart_id) || empty($this->product_id) || empty($this->quantity)) {
                return true;
            } else {
                return false;
            }
        }

        private function nullValue() {
            if ($this->quantity < 0) {
                return true;
            } else {
                return false;
            }
        }
    }
?>