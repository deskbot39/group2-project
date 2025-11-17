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
            $query = "SELECT `user_id` FROM users WHERE email = :email";
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

        protected function updateUsername(string $user, int $uid) {
            $query = "UPDATE users SET username = :user WHERE user_id = :uid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":user", $user);
            $stmt->bindParam(":uid", $uid);
            $stmt->execute();
        }

        protected function updateEmail(string $email, int $uid) {
            $query = "UPDATE users SET email = :email WHERE user_id = :uid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":uid", $uid);
            $stmt->execute();
        }

        protected function updatePhone(string $phone, int $uid) {
            $query = "UPDATE users SET phone = :phone WHERE user_id = :uid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":uid", $uid);
            $stmt->execute();
        }

        protected function updatePassword(string $pwd, int $uid) {
            $hashed_pwd = password_hash($pwd, PASSWORD_BCRYPT);
            $query = "UPDATE users SET password = :pwd WHERE user_id = :uid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":pwd", $hashed_pwd);
            $stmt->bindParam(":uid", $uid);
            $stmt->execute();
        }

        public function deleteUser(int $uid) {
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