<?php
    declare(strict_types=1);
    class cartmodel extends conf_db {

        public function getCartItem(int $cart_id) {
            $query = "SELECT * FROM cart_item WHERE cart_id = :cid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":cid", $cart_id);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function getProductInfo(int $product_id) {
            $query = "SELECT * FROM products WHERE product_id = :pid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":pid", $product_id);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function getTotalPrice(int $cart_id) {
            $query = "SELECT SUM(total) AS total FROM cart_item WHERE cart_id = :cid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":cid", $cart_id);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($result == NULL) {
                $num = "00.00";
                return $num;
            } else {
                return $result['total'];
            }
        }

        public function deleteZero() {
            $query = "DELETE FROM cart_item WHERE quantity = 0";
            $stmt = $this->connect()->prepare($query);
            
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        public function getCartItemCount(int $cart_id) {
            $query = "SELECT COUNT(*) AS totalCount FROM cart_item WHERE cart_id = :cid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":cid", $cart_id);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $total = $result['totalCount'];
            return $total;
        }

        protected function addtoCart(int $cart_id, int $product_id) {
            $item_info = $this->getProductInfo($product_id);
            $query = "INSERT INTO cart_item (`cart_id`, `product_id`, `price`) VALUES (:cid, :pid, :price)";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":cid", $cart_id);
            $stmt->bindParam(":pid", $product_id);
            $stmt->bindParam(":price", $item_info['price']);

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        protected function updateProductQuantity(int $cart_id, int $product_id, int $item_quantity) {
            $query = "UPDATE cart_item SET quantity = :iqty WHERE cart_id = :cid AND product_id = :pid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":iqty", $item_quantity);
            $stmt->bindParam(":cid", $cart_id);
            $stmt->bindParam(":pid", $product_id);
            
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
        
        protected function updateCartTotal (int $cart_id, int $product_id) {
            $query = "UPDATE cart_item SET total = quantity * price WHERE cart_id = :cid AND product_id = :pid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":cid", $cart_id);
            $stmt->bindParam(":pid", $product_id);
            
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        protected function deleteCartItem(int $cart_id, int $product_id) {
            $query = "DELETE FROM cart_item WHERE cart_id = :cid AND product_id = :pid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":cid", $cart_id);
            $stmt->bindParam(":pid", $product_id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Add and Subtract just in case
        protected function addProductQuantity(int $cart_id, int $product_id) {
            $query = "UPDATE cart_item SET quantity = quantity + 1 WHERE cart_id = :cid AND product_id = :pid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":cid", $cart_id);
            $stmt->bindParam(":pid", $product_id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        protected function subtractProductQuantity(int $cart_id, int $product_id) {
            $query = "UPDATE cart_item SET quantity = quantity - 1 WHERE cart_id = :cid AND product_id = :pid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":cid", $cart_id);
            $stmt->bindParam(":pid", $product_id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>