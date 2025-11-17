<?php
    declare(strict_types=1);
    class adminmodelprod extends conf_db {

        protected function getProduct(int $pid) {
            $query = "SELECT * FROM products WHERE product_id = :pid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":pid", $pid);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        public function deleteProduct(int $pid) {
            $query = "DELETE FROM products WHERE product_id = :pid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":pid", $pid);
            
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        protected function getProductName(string $name) {
            $query = "SELECT * FROM products WHERE name = :name";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":name", $name);
            $stmt->execute();
            
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        protected function updateProductName(int $pid, string $pname) {
            $query = "UPDATE products SET name = :name WHERE product_id = :pid";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":name", $pname);
            $stmt->bindParam(":pid", $pid);
            
            if ($stmt->execute()) {
                return true;
            } else {
                return false;
            }
        }

        protected function insertProduct(string $name, $desc, $price, $stock) {
            $query = "INSERT INTO products (`name`, `description`, `price`, `stock`) VALUES (:name, :desc, :price, :stock)";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":desc", $desc);
            $stmt->bindParam(":price", $price);
            $stmt->bindParam(":stock", $stock);
            $stmt->execute();
        }
}
?>