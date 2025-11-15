<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $cid = $_POST['ci-id'];
        $pid = $_POST['ci-pid'];
        $iqty = $_POST['upd-citm'];

        require_once 'conf_session.php';
        include "classes/conf_db.php";
        include "classes/cartmodel.php";
        include "classes/cartcontroller.php";

        $cart = new cartcontroller($cid,$pid,$iqty);
        $cart->deleteZero();
        $upd_count = $cart->getCartItemCount();
        $_SESSION['cart_item_count'] = $upd_count;  

        if (isset($_POST['sub-citm'])) {
            $cart->subItem();
            header('location: ../../shopping-cart.php');
            die();
            
        } elseif (isset($_POST['add-citm'])) {
            $cart->addItem();
            header('location: ../../shopping-cart.php');
            die();
        } elseif (isset($_POST['del-citm'])) {
            header('location: ../../shopping-cart.php');
            die();
        } elseif (isset($_POST['add-p'])) {
            $cart->add2Cart();
        }
} else {
    header ('location: ../../product-page.php');
    die();
}
?>