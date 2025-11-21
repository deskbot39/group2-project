<?php
    require_once 'conf_session.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        $ouid = $_POST['ouid'];
        $ocid = $_POST['ocid'];
        $ototal = $_POST['ototal'];

        include "classes/conf_db.php";
        include "classes/ordermodel.php";
        include "classes/userordercontroller.php";

        $user_order = new userordercontroller($ouid, $ocid, $ototal);

        if (isset($_POST['order-btn'])) {
            $user_order->putinOrder();
            header('location: ../../shopping-cart.php');
            die();
        }
        
    } elseif (time() >= $_SESSION['csrf_expire']) {
        header('location: ../../shopping-cart.php');
        die();
    } else {
        header('location: ../../logout.php');
        die();
    }
?>