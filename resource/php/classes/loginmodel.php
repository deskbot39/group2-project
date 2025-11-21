<?php
    declare(strict_types=1);
    class loginmodel extends conf_db {

        protected function getUser(string $email) {
            $query = "SELECT * FROM users WHERE email = :email";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        protected function getCart(int $user_id) {
            $query = "SELECT * FROM carts WHERE user_id = :usid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":usid", $user_id);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
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

        protected function getEmailHash(string $email) {
            $query = "SELECT email_hash FROM users WHERE email = :mail";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":mail", $email);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>