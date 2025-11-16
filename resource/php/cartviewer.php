<?php
    include "classes/conf_db.php";
    include "classes/cartmodel.php";

    $cart = new cartmodel();
    $cart_item = $cart->getCartItem($_SESSION['cart_id']);
    $total = $cart->getTotalPrice($_SESSION['cart_id']);
    $count = $cart->getCartItemCount($_SESSION['cart_id']);
    $_SESSION['cart_item_count'] = $count;

    function cart_order_error_display() {
        if (isset($_SESSION['cart_errors'])) {
            $error_arr = $_SESSION['cart_errors'];
            foreach ($error_arr as $error) {
                include ('./resource/template/alerts/alert-warning.html');
            }
            unset($_SESSION['cart_errors']);
        } elseif(isset($_SESSION['cart_good'])) {
            $succ_arr = $_SESSION['cart_good'];
            foreach ($succ_arr as $succ) {
                include ('./resource/template/alerts/alert-successOrder.html');
            }
            unset($_SESSION['cart_good']);
        }
    }
?>