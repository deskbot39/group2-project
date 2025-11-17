<?php
    declare(strict_types=1);
    class adminmodeluser extends conf_db {
        
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

        public function searchUser(string $pattern) {
            $query = "SELECT * FROM users WHERE LOCATE(:pattern, username)";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":pattern", $pattern);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        protected function getUser(string $username) {
            $query = "SELECT `user_id` FROM users WHERE username = :username";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":username", $username);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
        
        protected function getEmail(string $email) {
            $query = "SELECT `email` FROM users WHERE email = :email";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        protected function getPhone(string $phone) {
            $query = "SELECT `phone` FROM users WHERE phone = :phone";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":phone", $phone);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        protected function deleteUser(int $uid) {
            $query = "DELETE FROM users WHERE user_id = :uid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":uid", $uid);
            
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>