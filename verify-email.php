<?php
    require_once './resource/php/conf_session.php';
    require_once './resource/php/loginviewer.php';
    $head_desc = htmlspecialchars("Email Verification");
    $head_title = htmlspecialchars("Wang Scent PH | Email Verification");
    $head_class = htmlspecialchars("d-flex align-items-center justify-content-center py-4 bg-body-tertiary min-vh-100");
    $js_locs = array();
    include('resource/template/html/html_head.html');
    include('./resource/template/html/html_foot.html');
?>