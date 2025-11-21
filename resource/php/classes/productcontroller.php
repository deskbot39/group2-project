<?php
    class productcontroller extends productmodel {
        private $cart_id;
        private $product_id;
        private $price;

        public function __construct($cart_id, $product_id, $price) {
            $this->cart_id = $cart_id;
            $this->product_id = $product_id;
            $this->price = $price;
        }

        public function add2Cart() {
            if($this->productInCart()) {
                $this->errorSetter('in_cart', 'Product already in cart'); 

            } elseif(!$this->cartExists()) {
                $this->errorSetter('no_cart', "Cart doesn't exists"); 

            } elseif(!$this->productExists()) {
                $this->errorSetter('no_item', "Product doesn't exists"); 

            } else {
                $this->addtoCart($this->cart_id, $this->product_id, $this->price);
                $this->successSetter('item_add', "Product added");
            }

        }

        private function errorSetter($code, $text) {
            $error_arr = [];
            $error_arr[$code] = $text;
            $_SESSION['prod_errors'] = $error_arr;
            header('Location: ../../product-page.php');
            die();
        }

        private function successSetter($code, $text) {
            $success_arr = [];
            $success_arr[$code] = $text;
            $_SESSION['prod_good'] = $success_arr;
        }

        private function productInCart() {
            if ($this->cartItemExists($this->cart_id, $this->product_id)) {
                return true;
            } else {
                return false;
            }
        }
        private function productExists() {
            if ($this->getProduct($this->product_id)) {
                return true;
            } else {
                return false;
            }
        }
        private function cartExists() {
            if ($this->getCart($this->cart_id)) {
                return true;
            } else {
                return false;
            }
        }
    }
?>