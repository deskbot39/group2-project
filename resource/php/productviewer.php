<?php
    include "classes/conf_db.php";
    include "classes/productmodel.php";

    $db = new conf_db();
    $prod = new productmodel();
    $prod_table_a = search_prod();
    $prod_carousel = $prod->getCarouselProduct();
    $count = $prod->getCartItemCount($_SESSION['cart_id']);
    $_SESSION['cart_item_count'] = $count;

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

    function product_error_display() {
        if (isset($_SESSION['prod_errors'])) {
            $error_arr = $_SESSION['prod_errors'];
            foreach ($error_arr as $error) {
                include ('./resource/template/alerts/alert-warning.html');
            }
            unset($_SESSION['prod_errors']);
        } elseif(isset($_SESSION['prod_good'])) {
            $succ_arr = $_SESSION['prod_good'];
            foreach ($succ_arr as $succ) {
                include ('./resource/template/alerts/alert-successOrder.html');
            }
            unset($_SESSION['prod_good']);
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
    
    $itm_per_page = 6;
    $query = "SELECT COUNT(*) AS total FROM products";
    $stmt = $db->connect()->prepare($query);
    $stmt->execute();
    $total_result = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    $total_pages = ceil($total_result / $itm_per_page);
    
    if (isset($_GET['page'])) {
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }

    $page = max(1, min($page, $total_pages));
    $start = ($page - 1) * $itm_per_page;
    $query1 = "SELECT * FROM products LIMIT :starter, :ipp";
    $stmt = $db->connect()->prepare($query1);
    $stmt->bindValue(":starter", $start, PDO::PARAM_INT);
    $stmt->bindValue(":ipp", $itm_per_page, PDO::PARAM_INT);
    $stmt->execute();
    $prod_table = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>