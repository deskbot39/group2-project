<?php
    declare(strict_types=1);
    class ordermodel extends conf_db {

        protected function getUserOrder(int $user_id) {
            $query = "SELECT * FROM orders WHERE user_id = :usid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":usid", $user_id);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        
        protected function getAllOrder(int $user_id) {
            $query = "SELECT * FROM orders WHERE user_id :usid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam("usid", $user_id);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
    }
?>