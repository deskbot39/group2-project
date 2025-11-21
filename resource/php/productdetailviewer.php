<?php


    if (isset($_GET['product_id']) && !empty($_GET['product_id'])) {
        $id = (int) $_GET['product_id'];
        $db = new conf_db();
        $prod = new productmodel();
        $details = $prod->getProductDetail($id);

        if (!$details) {
            header('location: search.php');
            die();
        } else {
            return $details;
        }
    } else {
        header('location: search.php');
        die();
    }
?>