<?php
    include "classes/conf_db.php";
    include "classes/ordermodel.php";

    $ord = new ordermodel();
    $ord_admin = $ord->getAllOrder();
    $ord_table = $ord->getAllUserOrder($_SESSION['user_id']);
    $ord_table_pend = $ord->getAllUserOrderStatus($_SESSION['user_id'], 'Pending');
    $ord_table_rece = $ord->getAllUserOrderStatus($_SESSION['user_id'], 'Received');
    $ord_table_ship = $ord->getAllUserOrderStatus($_SESSION['user_id'], 'Shipped');
    $ord_table_canc = $ord->getAllUserOrderStatus($_SESSION['user_id'], 'Cancelled');
    $_SESSION['cart_item_count'] = $count;
?>