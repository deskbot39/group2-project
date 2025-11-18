<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        date_default_timezone_set('Asia/Manila');
        include '../classes/conf_db.php';
        $db = new conf_db();
        $month = date('m');
        $year = date('Y');
        $query = "SELECT SUM(total_amount) AS `amount`, CAST(date_created AS DATE) AS `day` 
                FROM orders
                WHERE status = 'Received' OR status = 'Shipped' 
                AND MONTH(date_created) = :mo 
                AND YEAR(date_created) = :yr
                GROUP BY CAST(date_created AS DATE)
                ORDER BY `day`";
        $stmt = $db->connect()->prepare($query);
        $stmt->bindParam(":mo", $month);
        $stmt->bindParam(":yr", $year);
        
        if($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
        } else {
            $foo = array('bar', 'wow');
            $result = json_encode($foo);
	        echo $result;
        }
 
} else {
    header('location: ../../../admin-dashboard.php');
    die();
}
?>