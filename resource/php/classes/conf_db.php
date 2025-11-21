<?php
    // Database Configuration
    class conf_db {
        private $usr = "";
        private $pwd = "";
        private $info = "";
        
        public function connect() {
            try {
                $pdo = new PDO($this->info,$this->usr,$this->pwd);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Connection error:" . $e->getMessage());
            } finally {
                return $pdo;
            }
        }
    }
?>