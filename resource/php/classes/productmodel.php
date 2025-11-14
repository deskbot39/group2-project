<?php
    declare(strict_types=1);
    class productmodel extends conf_db {

        public function getAllProducts() {
            $query = "SELECT * FROM products";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>