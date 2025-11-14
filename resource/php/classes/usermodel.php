<?php
    declare(strict_types=1);
    class usermodel extends conf_db {

        public function getAllUsers() {
            $query = "SELECT * FROM users";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function getByRole(string $role) {
            $query = "SELECT * FROM users WHERE role = :role";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":role", $role);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>