<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = (int)$_POST['id'];

        require_once 'conf_session.php';
        include 'classes/conf_db.php';
        include 'classes/adminmodelorder.php';
        
        $adord = new adminmodelorder();

        if ($adord->deleteOrder($id)) {
            $success_arr = [];
            $success_arr['del_good'] = 'Order has been successfully deleted';
            $_SESSION['admin_good'] = $success_arr;
            header('location: ../../admin-order.php');
            die();
        } else {
            $error_arr = [];
            $error_arr['no_id'] = 'Order does not exist';
            $_SESSION['admin_errors'] = $error_arr;
            header('location: ../../admin-order.php');
            die();
        }

    } else {
        header('location: ../../admin-order.php');
        die();
    }
?>