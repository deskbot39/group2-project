<?php
    include "classes/conf_db.php";
    include "classes/ordermodel.php";

    // Admin Stuff
    $ord = new ordermodel();
    $db = new conf_db();
    
    // User Stuff
    $ord_table = $ord->getAllUserOrder($_SESSION['user_id']);
    $ord_table_pend = $ord->getAllUserOrderStatus($_SESSION['user_id'], 'Pending');
    $ord_table_rece = $ord->getAllUserOrderStatus($_SESSION['user_id'], 'Received');
    $ord_table_ship = $ord->getAllUserOrderStatus($_SESSION['user_id'], 'Shipped');
    $ord_table_canc = $ord->getAllUserOrderStatus($_SESSION['user_id'], 'Cancelled');
    
    $itm_per_page = 6;
    $query = "SELECT COUNT(*) AS total FROM orders WHERE user_id = :id";
    $stmt = $db->connect()->prepare($query);
    $stmt->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_INT);
    $stmt->execute();
    $total_result = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    $total_pages = ceil($total_result / $itm_per_page);
    
    if (isset($_GET['page'])) {
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }

    $page = max(1, min($page, $total_pages));
    $start = ($page - 1) * $itm_per_page;
    $query1 = "SELECT * FROM orders WHERE user_id = :id LIMIT :starter, :ipp";
    $stmt = $db->connect()->prepare($query1);
    $stmt->bindParam(':id', $_SESSION['user_id'], PDO::PARAM_INT);
    $stmt->bindValue(":starter", $start, PDO::PARAM_INT);
    $stmt->bindValue(":ipp", $itm_per_page, PDO::PARAM_INT);
    $stmt->execute();
    $ord_table = $stmt->fetchAll(PDO::FETCH_ASSOC);

    function cancelled_order_error_display() {
        if (isset($_SESSION['cart_errors'])) {
            $error_arr = $_SESSION['cart_errors'];
            foreach ($error_arr as $error) {
                include ('./resource/template/alerts/alert-warning.html');
            }
            unset($_SESSION['cart_errors']);
        } elseif(isset($_SESSION['cart_good'])) {
            $succ_arr = $_SESSION['cart_good'];
            foreach ($succ_arr as $succ) {
                include ('./resource/template/alerts/alert-successOrder.html');
            }
            unset($_SESSION['cart_good']);
        }
    }
?>