<?php
    class cartcontroller extends cartmodel {
        private $user_id;
        private $product_id;
        private $quantity;

        public function __construct($user_id, $product_id, $quantity) {
            $this->user_id = $user_id;
            $this->product_id = $product_id;
            $this->quantity = $quantity;
        }

        private function errorSetter($code, $text) {
            $error_arr = [];
            $error_arr[$code] = $text;
            $_SESSION['login_errors'] = $error_arr;
            header('Location: ../../login-page.php');
            die();
        }
        private function emptyInput() {
            if (empty($this->user_id) || empty($this->product_id) || empty($this->quantity)) {
                return true;
            } else {
                return false;
            }
        }
    }
?>