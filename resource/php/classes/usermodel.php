<?php
    declare(strict_types=1);
    class usermodel extends conf_db {

        protected function getAllUsers() {
            $query = "SELECT * FROM users";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute();

            $result = $stmt->fetch(PDO:FETCH_ASSOC);
            return $result;
        }

        protected function getUser() {
            $query = "SELECT";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam("", $test);
            $stmt->bindParam("", $test);
            
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }
    }
?>