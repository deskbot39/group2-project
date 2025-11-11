<?php
    declare(strict_types=1);
    class cartmode extends conf_db {

        protected function getUserCart(int $user_id) {
            $query = "SELECT * FROM cart WHERE user_id = :usid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":usid", $user_id);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        protected function updateProductQuantity(int $user_id, int $product_id, int $item_quantity) {
            $query = "UPDATE cart SET item_quantity = :iqty WHERE user_id = :usid AND product_id = :pid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":iqty", $item_quantity);
            $stmt->bindParam(":usid", $user_id);
            $stmt->bindParam(":pid", $product_id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        protected function deleteCartItem(int $product_id) {
            $query = "DELETE FROM cart WHERE product_id = :pid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":pid", $product_id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        // Add and Subtract just in case
        protected function addProductQuantity(int $user_id, int $product_id, int $item_quantity) {
            $query = "UPDATE cart SET item_quantity = item_quantity + :iqty WHERE user_id = :usid AND product_id = :pid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":iqty", $item_quantity);
            $stmt->bindParam(":usid", $user_id);
            $stmt->bindParam(":pid", $product_id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        protected function subtractProductQuantity(int $user_id, int $product_id, int $item_quantity) {
            $query = "UPDATE cart SET item_quantity = item_quantity - :iqty WHERE user_id = :usid AND product_id = :pid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":iqty", $item_quantity);
            $stmt->bindParam(":usid", $user_id);
            $stmt->bindParam(":pid", $product_id);

            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>