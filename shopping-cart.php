<?php
    require_once './resource/php/conf_session.php';
    require_once './resource/php/cartviewer.php';
    require_once './resource/php/loginviewer.php';
    roleLock();
    $head_desc = htmlspecialchars("User Shopping Cart");
    $head_title = htmlspecialchars("Wang Scent PH | Shopping Cart");
    $head_class = htmlspecialchars("");
    $js_locs = array();
    include('resource/template/html/html_head.html');
    userLoginDisplay();
?>
<main class="cart-cont">
<?php
    include('./resource/template/cart-page/cart-page.html');
?>
</main>
<?php
    include('./resource/template/footer/footer.html');
    include('./resource/template/html/html_foot.html');
?>