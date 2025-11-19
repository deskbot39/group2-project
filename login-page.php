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

    $csrf_token = bin2hex(random_bytes(32));
    $csrf_expire = time() + 60 * 15;
    $_SESSION['csrf_token'] = $csrf_token;
    $_SESSION['csrf_expire'] = $csrf_expire;

    include('./resource/template/login-page/login-form.html');
    include('./resource/template/html/html_foot.html');
?>