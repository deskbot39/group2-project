    <?php
    class userordercontroller extends ordermodel {
        private $user_id;
        private $cart_id;
        private $total_price;

        public function __construct($user_id, $cart_id, $total_price) {
            $this->user_id = $user_id;
            $this->cart_id = $cart_id;
            $this->total_price = $total_price;
        }

        public function putinOrder() {
            $this->insertOrder($this->user_id, $this->total_price);
            $this->insertCartItem($this->user_id, $this->cart_id);
        }

        private function errorSetter($code, $text) {
            $error_arr = [];
            $error_arr[$code] = $text;
            $_SESSION['login_errors'] = $error_arr;
            header('Location: ../../login-page.php');
            die();
        }
    }
?>