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
        protected function getUserRole(int $id) {
            $query = "SELECT * FROM `user_roles` WHERE user_id = :usid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":usid", $id);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>