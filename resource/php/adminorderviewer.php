<?php
    include "classes/conf_db.php";
    include "classes/ordermodel.php";

    // admin Stuff
    $ord = new ordermodel();
    
    $status_arr = array('Pending', 'Shipped', 'Cancelled', 'Received');
    if (isset($_GET['status-sort']) && in_array($_GET['status-sort'], $status_arr)) {
        $role = $_GET['status-sort'];
        $ord_admin = $ord->getByStatusJoined($role);
        return $ord_admin;
    } elseif (isset($_GET['search'])) {
        $query = $_GET['search'];
        $ord_admin = $ord->searchOrderJoined($query);
    } else {
        $status = "";
        $ord_admin = $ord->getAllOrderJoined();
        return $ord_admin;
    }

    function admin_product_error_display() {
        if (isset($_SESSION['admin_errors'])) {
            $error_arr = $_SESSION['admin_errors'];
            foreach ($error_arr as $error) {
                include ('./resource/template/alerts/alert-warning.html');
            }
            unset($_SESSION['admin_errors']);
        } elseif(isset($_SESSION['admin_good'])) {
            $succ_arr = $_SESSION['admin_good'];
            foreach ($succ_arr as $succ) {
                include ('./resource/template/alerts/alert-successOrder.html');
            }
            unset($_SESSION['admin_good']);
        }
    }
?>