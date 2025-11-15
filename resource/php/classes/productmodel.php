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

        public function getCarouselProduct() {
            $query = "SELECT * FROM products ORDER BY RAND() LIMIT 3";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>