<?php
    class ordercontroller extends ordermodel {
        private $order_id;

        public function __construct($order_id) {
            $this->order_id  = $order_id;
        }

        private function errorSetter($code, $text) {
            $error_arr = [];
            $error_arr[$code] = $text;
            $_SESSION['order_errors'] = $error_arr;
        }
    }
?>