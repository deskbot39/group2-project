<?php
    require_once './resource/php/conf_session.php';
    require_once './resource/php/loginviewer.php';
    $head_desc = htmlspecialchars("Landing Page of Wang Scent PH");
    $head_title = htmlspecialchars("Wang Scent PH");
    $head_class = htmlspecialchars("");
    $js_loc = htmlspecialchars("");
    include('resource/template/html/html_head.html');
    userLoginDisplay();
?>
    <main class="index-cont">

    </main>
<?php 
    include('./resource/template/footer/footer.html');
    include('./resource/template/html/html_foot.html');
?>