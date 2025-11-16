<?php
    require_once './resource/php/conf_session.php';
    require_once './resource/php/loginviewer.php';
    require_once './resource/php/productviewer.php';
    require_once './resource/php/productdetailviewer.php';
    roleLock();
    $head_desc = htmlspecialchars("Detail of a Product of Wang Scent PH");
    $head_title = htmlspecialchars("Wang Scent PH | ". $details['name']);
    $head_class = htmlspecialchars("");
    $js_locs = array();
    include('resource/template/html/html_head.html');
    userLoginDisplay();
?>
<main class="min-vh-100 my-5 py-5">
<?php
    include('./resource/template/product-detail/product-detail.html');
?>
</main>
<?php
    include('./resource/template/footer/footer.html'); 
    include('./resource/template/html/html_foot.html');
?>