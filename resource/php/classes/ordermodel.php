<?php
    declare(strict_types=1);
    class ordermodel extends conf_db {

        public function getAllUserOrderStatus(int $user_id, string $status) {
            $query = "SELECT * FROM orders WHERE user_id = :usid AND status = :status";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":usid", $user_id);
            $stmt->bindParam(":status", $status);
            $stmt->execute();
            
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function searchOrder(string $pattern) {
            $query = "SELECT * FROM orders WHERE LOCATE(:pattern, name)";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":pattern", $pattern);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function getByStatus(string $status) {
            $query = "SELECT * FROM orders WHERE status = :status";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":status", $status);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function getAllUserOrder(int $user_id) {
            $query = "SELECT * FROM orders WHERE user_id = :usid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":usid", $user_id);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
        
        public function getOrderItems(int $order_id) {
            $query = "SELECT * FROM order_item WHERE order_id = :oid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":oid", $order_id);
            $stmt->execute();
    
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function getProductName(int $prod_id) {
            $query = "SELECT name FROM products WHERE product_id = :pid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":pid", $prod_id);
            $stmt->execute();
    
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function getAllOrder() {
            $query = "SELECT * FROM orders";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function getOrderItem(int $order_id) {
            $query = "SELECT * FROM order_item WHERE order_id = :orid";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        protected function getUserOrder(int $user_id) {
            $query = "SELECT * FROM orders WHERE user_id = :usid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":usid", $user_id);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        protected function userCheck(int $user_id) {
            $query = "SELECT * FROM users WHERE user_id = :uid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":uid", $user_id);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        protected function cartCheck(int $cart_id) {
            $query = "SELECT * FROM carts WHERE cart_id = :cid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":cid", $cart_id);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        protected function deleteOrder(int $order_id) {
            $query = "DELETE FROM orders WHERE order_id = :orid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":orid", $order_id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        protected function getCartItems(int $cart_id) {
            $query = "SELECT * FROM cart_item WHERE cart_id = :cid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":cid", $cart_id);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        protected function insertOrder(int $user_id, $ototal) {
            $query = "INSERT INTO orders (`user_id`, `total_amount`) VALUES (:ouid, :ototal)";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":ouid", $user_id);
            $stmt->bindParam(":ototal", $ototal);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        protected function deleteCartItem(int $cart_id) {
            $query = "DELETE FROM cart_item WHERE cart_id = :cid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":cid", $cart_id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        protected function getLastID(int $user_id) {
            $query = "SELECT MAX(order_id) as recent FROM orders WHERE user_id = :uid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":uid", $user_id);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        protected function insertCartItem(int $user_id, int $cart_id) {
            $cart_items = $this->getCartItems($cart_id);
            $get_oid = $this->getLastID($user_id);
            $oid = $get_oid['recent'];

            foreach ($cart_items as $items) {
                $query = "INSERT INTO order_item (`order_id`, `product_id`, `quantity`, `price`) VALUES (:oid, :pid, :qty, :price)";
                $stmt = $this->connect()->prepare($query);
                $stmt->bindParam(":oid", $oid);
                $stmt->bindParam(":pid", $items['product_id']);
                $stmt->bindParam(":qty", $items['quantity']);
                $stmt->bindParam(":price", $items['price']);
                $stmt->execute();

                $quantity = (int) $items['quantity'];
                $pid = (int) $items['product_id'];
                $this->subtractFromStock($quantity, $pid);
            }
            $this->deleteCartItem($cart_id);
        }

        protected function subtractFromStock(int $qty, int $prod_id) {
            $query = "UPDATE products SET stock = stock - :qty WHERE product_id = :pid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindValue(":qty", $qty, PDO::PARAM_INT);
            $stmt->bindParam(":pid", $prod_id, PDO::PARAM_INT);
            $stmt->execute();
        }

        protected function addBacktoStock(int $qty, int $pid) {
            $query = "UPDATE products SET stock = stock + :qty WHERE product_id = :pid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindValue(":qty", $qty, PDO::PARAM_INT);
            $stmt->bindParam(":pid", $pid, PDO::PARAM_INT);
            $stmt->execute();
        }

        protected function getCartItemCount(int $cart_id) {
            $query = "SELECT COUNT(*) AS totalCount FROM cart_item WHERE cart_id = :cid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":cid", $cart_id);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $total = $result['totalCount'];
            return $total;
        }

        protected function cancelledReturn(int $order_id) {
            $o_items = $this->getOrderItems($order_id);

            foreach ($o_items as $itm) {
                $qty = (int)$itm['quantity'];
                $pid = (int)$itm['product_id'];
                $this->addBacktoStock($qty, $pid);
            }
        }

        protected function cancelOrder(int $order_id) {
            $query = "UPDATE orders SET status = 'Cancelled' WHERE order_id = :oid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":oid", $order_id);
            $stmt->execute();
        }

    }
?>