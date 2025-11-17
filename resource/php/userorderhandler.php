<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $oid = (int)$_POST['ord-id'];
        $uid = (int)$_POST['ord-uid'];

        require_once 'conf_session.php';
        include "classes/conf_db.php";
        include "classes/ordermodel.php";
        include "classes/userordercontroller.php";
        
        $user_order = new userordercontroller($uid, $oid, 0);

        if (isset($_POST['cancel-ord'])) {
            $user_order->cancelledOrder();
            header('location: ../../user-dashboard.php');
            die();
        }

} else {
    header('location: ../../user-dashboard.php');
    die();
}
?>