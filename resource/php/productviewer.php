<?php
    include "classes/conf_db.php";
    include "classes/productmodel.php";

    $prod = new productmodel();
    $prod_table = $prod->getAllProducts();
    $prod_carousel = $prod->getCarouselProduct();
    return $prod_table;
    return $prod_carousel;
?>