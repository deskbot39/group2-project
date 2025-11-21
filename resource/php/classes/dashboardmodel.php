<?php
    declare(strict_types=1);
    class dashboardmodel extends conf_db {

        public function getUserCount() {
            $query = "SELECT COUNT(*) AS usertotal FROM users";
            $stmt = $this->connect()->prepare($query);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC)['usertotal'];
            return $result;
        }

        public function getOrderCount($month, $year) {
            $query = "SELECT COUNT(*) AS ordertotal FROM orders WHERE MONTH(date_updated) = :month AND YEAR(date_created) = :year AND status != 'Cancelled'";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":month", $month);
            $stmt->bindParam(":year", $year);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC)['ordertotal'];
            return $result;
        }

        public function getTotalStock($month, $year) {
            $query = "SELECT SUM(stock) AS stocktotal FROM products WHERE MONTH(date_updated) = :month AND YEAR(date_created) = :year";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":month", $month);
            $stmt->bindParam(":year", $year);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC)['stocktotal'];
            return $result;
        }
        
        public function getTotalRevenue($month, $year) {
            $query = "SELECT SUM(total_amount) AS revenue FROM orders WHERE MONTH(date_updated) = :month AND YEAR(date_created) = :year AND status = 'Received'";
            $stmt = $this->connect()->prepare($query);
            $stmt->bindParam(":month", $month);
            $stmt->bindParam(":year", $year);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC)['revenue'];
            return $result;
        }
    }
?>