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
        public function getAllUserOrder() {
            $query = "SELECT * FROM orders";
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

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
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

        protected function insertCartItem(int $user_id, int $cart_id) {
            $cart_items = $this->getCartItems($cart_id);
            $get_oid = $this->getUserOrder($user_id);
            $oid = $get_oid['order_id'];
            $query = "INSERT INTO order_item (`order_id`, `product_id`, `quantity`, `price`) VALUES ('')";
        }
    }
?>