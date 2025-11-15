<?php
    include "classes/conf_db.php";
    include "classes/cartmodel.php";

    $cart = new cartmodel();
    $cart_item = $cart->getCartItem($_SESSION['cart_id']);
    $total = $cart->getTotalPrice($_SESSION['cart_id']);
?>