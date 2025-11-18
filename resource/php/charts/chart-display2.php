<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include '../classes/conf_db.php';
        $db = new conf_db();
        $query = "SELECT COUNT(*) AS 'count', `role` FROM users GROUP BY `role`";
        $stmt = $db->connect()->prepare($query);
        $stmt->execute();
        
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