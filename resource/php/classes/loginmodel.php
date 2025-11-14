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
    }
?>