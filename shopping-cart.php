<?php
    require_once './resource/php/conf_session.php';
    require_once './resource/php/cartviewer.php';
    require_once './resource/php/loginviewer.php';
    roleLock();
    $head_desc = htmlspecialchars("User Shopping Cart" ?? '');
    $head_title = htmlspecialchars("Wang Scent PH | Shopping Cart" ?? '');
    $head_class = htmlspecialchars("" ?? '');
    $js_locs = array();
    include('resource/template/html/html_head.html');
    userLoginDisplay();
?>
<main class="cart-cont">
<?php
    $csrf_token = bin2hex(random_bytes(32));
    $csrf_expire = time() + 60 * 15;
    $_SESSION['csrf_token'] = $csrf_token;
    $_SESSION['csrf_expire'] = $csrf_expire;
    cart_order_error_display();
    include('./resource/template/cart-page/cart-page.html');
?>
</main>
<?php
    include('./resource/template/footer/footer.html');
    include('./resource/template/html/html_foot.html');
?>