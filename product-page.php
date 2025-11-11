<?php
    require_once './resource/php/conf_session.php';
    require_once './resource/php/loginviewer.php';
    $head_desc = htmlspecialchars("A product page");
    $head_title = htmlspecialchars("Wang Scent PH | Products");
    $head_class = htmlspecialchars("");
    $js_loc = htmlspecialchars("");
    include('resource/template/html/html_head.html');
    userLoginDisplay();
?>
<main class="product-cont">

</main>
<?php
    include('./resource/template/footer/footer.html');
    include('./resource/template/html/html_foot.html');
?>