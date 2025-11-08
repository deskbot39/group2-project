<?php
    class view extends db_conf {
        private function viewTable() {
            $query = "SELECT * FROM blank WHERE blank = ?;";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute();
            $display = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>