<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $name = $_POST['name'];
        $desc = $_POST['desc'];
        $price = $_POST['price'];
        $stock = $_POST['stock'];

        require_once 'conf_session.php';
        include 'classes/conf_db.php';
        include 'classes/adminmodelprod.php';
        include 'classes/adminproductcontroller.php';

        $prod = new adminproductcontroller($name, $desc, $price, $stock);
        $prod->addItem();
        header('location: ../../admin-product.php');
        die();
} else {
    header('location: ../../admin-product.php');
    die();
}
?>