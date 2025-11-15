<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ouid = $_POST['ouid'];
        $ocid = $_POST['ocid'];
        $ototal = $_POST['ototal'];

        include "classes/conf_db.php";
        include "classes/ordermodel.php";
        include "classes/userordercontroller.php";

        $user_order = new userordercontroller($ouid, $ocid, $ototal);

        if (isset($_POST['order-btn'])) {
            $user_order->putinOrder();
            header('location: ../../user-dashboard.php');
            die();
        }
} else {
    header('location: ../../shopping-cart.php');
    die();
}
?>