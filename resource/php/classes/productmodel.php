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
            $query = "SELECT * FROM products WHERE stock > 0 ORDER BY RAND(product_id) LIMIT 2";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function getProductDetail(int $product_id) {
            $query = "SELECT * FROM products WHERE product_id = :pid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":pid", $product_id);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function searchProduct(string $pattern) {
            $query = "SELECT * FROM products WHERE LOCATE(:pattern, name)";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":pattern", $pattern);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function searchProductPaginate(string $pattern, int $page, int $total) {
            $query = "SELECT * FROM products WHERE LOCATE(:pattern, name) LIMIT :page, :total";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":pattern", $pattern);
            $stmt->bindValue(":page", $page, PDO::PARAM_INT);
            $stmt->bindValue(":total", $total, PDO::PARAM_INT);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }

        public function getAllProductCount() {
            $query = "SELECT COUNT(*) AS total FROM products";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute();
            $total = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
            return $total;
        }

        public function getCartItemCount(int $cart_id) {
            $query = "SELECT COUNT(*) AS totalCount FROM cart_item WHERE cart_id = :cid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":cid", $cart_id);
            $stmt->execute();

            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $total = $result['totalCount'];
            return $total;
        }

        protected function addtoCart(int $cart_id, int $product_id, $price) {
            $query = "INSERT INTO cart_item (`cart_id`, `product_id`, `price`, `total`) VALUES (:cid, :pid, :price, :total)";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":cid", $cart_id);
            $stmt->bindParam(":pid", $product_id);
            $stmt->bindParam(":price", $price);
            $stmt->bindParam(":total", $price);
            $stmt->execute();
        }

        protected function cartItemExists(int $cart_id, int $product_id) {
            $query = "SELECT * FROM cart_item WHERE cart_id = :cid AND product_id = :pid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":cid", $cart_id);
            $stmt->bindParam(":pid", $product_id);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        protected function getProduct(int $product_id) {
            $query = "SELECT * FROM products WHERE product_id = :pid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":pid", $product_id);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        protected function getCart(int $cart_id) {
            $query = "SELECT * FROM carts WHERE cart_id = :cid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":cid", $cart_id);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }
    }
?>