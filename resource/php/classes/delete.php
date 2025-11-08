<?php
    class delete extends db_conf {
        private $id;

        public function __construct ($id) {
            $this->id = $id;
        }

        private function deleteProduct() {
            $query = "DELETE FROM product WHERE blank = :id;";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":id", $this->id);
            $stmt->execute();
        }
        private function deleteUser() {
            $query = "DELETE FROM user WHERE blank = :id;";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":id", $this->id);
            $stmt->execute();
        }
        private function deleteOrder() {
            $query = "DELETE FROM orders WHERE blank = :id;";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":id", $this->id);
            $stmt->execute();
        }
    }
?>