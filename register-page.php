<?php
    require_once './resource/php/conf_session.php';
    require_once './resource/php/registerviewer.php';
    require_once './resource/php/pwd-resetviewer.php';
    $head_desc = htmlspecialchars("Registration Page of Wang Scent PH" ?? '');
    $head_title = htmlspecialchars("Wang Scent PH | Register" ?? '');
    $head_class = htmlspecialchars("d-flex align-items-center justify-content-center py-4 bg-body-tertiary min-vh-100" ?? '');
    $js_locs = array("./resource/js/register-validation.js");
    include('resource/template/html/html_head.html');
    register_error_display();
    reset_pwd_error_display();

    $csrf_token = bin2hex(random_bytes(32));
    $csrf_expire = time() + 60 * 15;
    $_SESSION['csrf_token'] = $csrf_token;
    $_SESSION['csrf_expire'] = $csrf_expire;
    
    include('./resource/template/register-page/register-form.html');
    include('./resource/template/html/html_foot.html');
?>