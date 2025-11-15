<?php
    require_once './resource/php/conf_session.php';
    require_once './resource/php/productviewer.php';
    require_once './resource/php/loginviewer.php';
    $head_desc = htmlspecialchars("A product page");
    $head_title = htmlspecialchars("Wang Scent PH | Products");
    $head_class = htmlspecialchars("");
    $js_locs = array();
    include('resource/template/html/html_head.html');
    userLoginDisplay();
?>
<main class="product-cont">
<?php
    include('./resource/template/product-page/product-carousel.html');
    include('./resource/template/product-page/hero2.html');
    include('./resource/template/product-page/product-display.html');

?>
</main>
<?php
    include('./resource/template/footer/footer.html');
    include('./resource/template/html/html_foot.html');
?>