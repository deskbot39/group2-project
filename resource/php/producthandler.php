<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cid  = $_POST['cid'];
        $cpid = $_POST['cpid'];
        $price  = $_POST['price'];

        require_once 'conf_session.php';
        include "classes/conf_db.php";
        include "classes/productmodel.php";
        include "classes/productcontroller.php";

        $prod = new productcontroller($cid,$cpid,$price);

        if (isset($_POST['add-p'])) {
            $prod->add2Cart();
            header('location: ../../product-page.php');
            die();
        }
} else {
    header('location: ../../product-page.php');
    die();
}
?>