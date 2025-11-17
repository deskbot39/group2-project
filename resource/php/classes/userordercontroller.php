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
            if (!$this->userExists()) {
                $this->errorSetter("no_user", "User doesn't exist");
            } elseif (!$this->cartExists()) {
                $this->errorSetter("no_cart", "Cart doesn't exist");
                
            } elseif ($this->invalidAmount()) {
                $this->errorSetter("invalid_val", "No negative value");
                
            } elseif (!$this->hasCartItem()) {
                $this->errorSetter("no_items", "Please add at least 1 item");

            } else {
                $this->insertOrder($this->user_id, $this->total_price);
                $this->insertCartItem($this->user_id, $this->cart_id);
                $this->successSetter("order_succ", "Order has been successfully made!");
            }
        }

        public function cancelledOrder() {
            if(!$this->userExists()) {
                $this->errorSetter("no_user", "User doesn't exist");
            } elseif (!$this->orderExists()) {
                $this->errorSetter("no_order", "Order doesn't exist");
            } else {
                $this->cancelledReturn($this->cart_id);
                $this->cancelOrder($this->cart_id);
                $this->successSetter("canc_succ", "Order has been successfully cancelled!");
            }
        }

        private function errorSetter($code, $text) {
            $error_arr = [];
            $error_arr[$code] = $text;
            $_SESSION['cart_errors'] = $error_arr;
        }

        private function successSetter($code, $text) {
            $success_arr = [];
            $success_arr[$code] = $text;
            $_SESSION['cart_good'] = $success_arr;
        }

        private function userExists () {
            if ($this->userCheck($this->user_id) && $this->user_id == $_SESSION['user_id']) {
                return true;
            } else {
                return false;
            }
        }

        private function cartExists () {
            if ($this->cartCheck($this->cart_id) && $this->cart_id == $_SESSION['cart_id']) {
                return true;
            } else {
                return false;
            }
        }

        private function invalidAmount () {
            $int_val = (int)$this->total_price;
            if ($int_val < 0) {
                return true;
            } else {
                return false;
            }
        }

        private function hasCartItem () {
            if ($this->getCartItemCount($this->cart_id)) {
                return true;
            } else {
                return false;
            }
        }

        private function orderExists() {
            if ($this->orderCheck($this->cart_id)) {
                return true;
            } else {
                return false;
            }
        }
    }
?>