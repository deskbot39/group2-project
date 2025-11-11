<?php
    class ordercontroller extends ordermodel {
        private $user_id;
        private $order_status;
        private $total_price;

        public function __construct($user_id, $order_status, $total_price) {
            $this->user_id = $user_id;
            $this->order_status = $order_status;
            $this->total_price = $total_price;
        }

        private function errorSetter($code, $text) {
            $error_arr = [];
            $error_arr[$code] = $text;
            $_SESSION['login_errors'] = $error_arr;
            header('Location: ../../login-page.php');
            die();
        }
        private function emptyInput() {
            if (empty($this->user_id) || empty($this->order_status) || empty($this->total_price)) {
                return true;
            } else {
                return false;
            }
        }
    }
?>