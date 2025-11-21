<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include '../classes/conf_db.php';
        $db = new conf_db();
        $query = "SELECT products.name AS product, SUM(order_item.quantity) AS quantity 
                    FROM products 
                    JOIN order_item ON products.product_id = order_item.product_id
                    GROUP BY products.name
                    ORDER BY quantity DESC
                    LIMIT 5";
        $stmt = $db->connect()->prepare($query);
        $stmt->execute();
        
        if($stmt->execute()) {
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            echo json_encode($result);
        } else {
            $foo = array('bar', 'wow');
            $result = json_encode($foo);
	        echo $result;
        };
} else {
    header('location: ../../../admin-dashboard.php');
    die();
}
?>