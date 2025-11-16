<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $oid = $_POST['ord-val'];

        include "classes/conf_db.php";
        include "classes/ordermodel.php";
        include "classes/ordercontroller.php";

        if (isset($_POST['cancel-ord'])) {
            header('location: ../../user-dashboard.php');
            die();
        }

} else {
    header('location: ../../user-dashboard.php');
    die();
}
?>