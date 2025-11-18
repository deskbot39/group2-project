<?php
    require_once './resource/php/conf_session.php';
    require_once './resource/php/loginviewer.php';
    require_once './resource/php/pwd-resetviewer.php';
    $head_desc = htmlspecialchars("Login Page of Wang Scent PH" ?? '');
    $head_title = htmlspecialchars("Wang Scent PH | Login" ?? '');
    $head_class = htmlspecialchars("d-flex align-items-center justify-content-center py-4 bg-body-tertiary min-vh-100" ?? '');
    $js_locs = array();
    include('resource/template/html/html_head.html');
    login_error_display();
    reset_pwd_error_display();
    include('./resource/template/login-page/login-form.html');
    include('./resource/template/html/html_foot.html');
?>