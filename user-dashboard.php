<?php
    require_once './resource/php/conf_session.php';
    require_once './resource/php/loginviewer.php';
    roleLock();
    $head_desc = htmlspecialchars("User Profile Page of Wang Scent PH");
    $head_title = htmlspecialchars("Wang Scent PH | User Profile");
    $head_class = htmlspecialchars("");
    $js_locs = array();
    include('resource/template/html/html_head.html');
    userLoginDisplay();
?>
<main class="usrdash-cont">
<?php
    include('./resource/template/user-dashboard/user-dashboard.html'); 
?>
</main>
<?php 
    include('./resource/template/footer/footer.html'); 
    include('./resource/template/html/html_foot.html');
?>