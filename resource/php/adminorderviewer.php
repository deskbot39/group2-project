<?php
    include "classes/conf_db.php";
    include "classes/ordermodel.php";

    // admin Stuff
    $ord = new ordermodel();
    
    $status_arr = array('Pending', 'Shipped', 'Cancelled', 'Received');
    if (isset($_GET['status-sort']) && in_array($_GET['status-sort'], $status_arr)) {
        $role = $_GET['status-sort'];
        $ord_admin = $ord->getByStatus($role);
        return $ord_admin;
    } elseif (isset($_GET['search'])) {
        $query = $_GET['search'];
        $ord_admin = $ord->searchOrder($query);
    } else {
        $status = "";
        $ord_admin = $ord->getAllOrder();
        return $ord_admin;
    }
?>