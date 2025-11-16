<?php
    include 'classes/conf_db.php';
    include "classes/productmodel.php";

    function search_stuff() {
        $db = new conf_db();
        $prod = new productmodel();

        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $query = $_GET['search'];
            $search = $prod->searchProduct($query);

            if (!$search) {
                include('./resource/template/search/search_display_none.html');
            } else {
                include('./resource/template/search/search_display.html');
                return $search;
            }
        } else {

        }
    }
?>