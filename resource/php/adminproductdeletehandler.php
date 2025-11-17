<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = (int)$_POST['id'];

        require_once 'conf_session.php';
        include 'classes/conf_db.php';
        include 'classes/adminmodelprod.php';
        
        $adprod = new adminmodelprod();

        if ($adprod->deleteProduct($id)) {
            $success_arr = [];
            $success_arr['del_good'] = 'Product has been successfully deleted';
            $_SESSION['admin_good'] = $success_arr;
            header('location: ../../admin-product.php');
            die();
        } else {
            $error_arr = [];
            $error_arr['no_id'] = 'Product does not exist';
            $_SESSION['admin_errors'] = $error_arr;
            header('location: ../../admin-product.php');
            die();
        }

    } else {
        header('location: ../../admin-product.php');
        die();
    }
?>