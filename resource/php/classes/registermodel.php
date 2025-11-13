<?php
    declare(strict_types= 1);
    class registermodel extends conf_db {

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

        protected function setUser(string $username, string $email, string $pass, string $phone) {
            $hashed_pwd = password_hash($pass, PASSWORD_BCRYPT);
            $query = "INSERT INTO users (`username`, `email`, `password`, `phone`) VALUES (:username, :email, :password1, :phone)";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":username", $username);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":password1", $hashed_pwd);
            $stmt->bindParam(":phone", $phone);
            $stmt->execute();
        }

        protected function setUserRoles(string $username) {
            $uid = $this->getUser($username);
            $rid =  1;
            $query = "INSERT INTO user_roles(`user_id`, `role_id`) VALUES (:usrid, :roid)";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":usrid", $uid['user_id']);
            $stmt->bindParam(":roid", $rid);
            $stmt->execute();
        }
    }
?>