<?php
    include "classes/conf_db.php";
    include "classes/productmodel.php";

    $db = new conf_db();
    $prod = new productmodel();
    $prod_table_a = search_prod();

    function search_prod() {
        $db = new conf_db();
        $prod = new productmodel();
        if (isset($_GET['search'])) {
            $query = $_GET['search'];
            $prod_table_a = $prod->searchProduct($query);
            return $prod_table_a;
        } else {
            $prod_table_a = $prod->getAllProducts();
            return $prod_table_a;
        }
    }


    function admin_product_error_display() {
        if (isset($_SESSION['admin_errors'])) {
            $error_arr = $_SESSION['admin_errors'];
            foreach ($error_arr as $error) {
                include ('./resource/template/alerts/alert-warning.html');
            }
            unset($_SESSION['admin_errors']);
        } elseif(isset($_SESSION['admin_good'])) {
            $succ_arr = $_SESSION['admin_good'];
            foreach ($succ_arr as $succ) {
                include ('./resource/template/alerts/alert-successOrder.html');
            }
            unset($_SESSION['admin_good']);
        }
    }

?>