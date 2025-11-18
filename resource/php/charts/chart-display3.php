<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        include '../classes/conf_db.php';
        $db = new conf_db();
        $query = "SELECT products.name AS product, SUM(order_item.quantity) AS quantity 
                    FROM products 
                    JOIN order_item ON products.product_id = order_item.product_id 
                    GROUP BY products.name
                    LIMIT 5";
        $stmt = $db->connect()->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
} else {
    header('location: ../../../admin-dashboard.php');
    die();
}
?>