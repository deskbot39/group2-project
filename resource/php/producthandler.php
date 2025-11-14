<?php
    include "classes/conf_db.php";
    include "classes/productmodel.php";

    $prod = new productmodel();
    $prod_table = $prod->getAllProducts();
    return $prod_table;
?>