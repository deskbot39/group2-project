<?php
    require_once './resource/php/conf_session.php';
    require_once './resource/php/loginviewer.php';
    $head_desc = htmlspecialchars("Landing Page of Wang Scent PH");
    $head_title = htmlspecialchars("Wang Scent PH");
    $head_class = htmlspecialchars("");
    $js_locs = array();
    include('resource/template/html/html_head.html');
    userLoginDisplay();
?>
    <main id="home">
        <?php
            include('./resource/template/landing-page/hero1.html');
            include('./resource/template/landing-page/product-section.html');
            include('./resource/template/landing-page/about-section.html');
            include('./resource/template/landing-page/contact-section.html');
        ?>
    </main>
<?php 
    include('./resource/template/footer/footer.html');
    include('./resource/template/html/html_foot.html');
?>