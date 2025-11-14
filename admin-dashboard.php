<?php
    require_once './resource/php/conf_session.php';
    require_once './resource/php/loginviewer.php';
    userAdminLock();
    $head_desc = htmlspecialchars("Admin Dashboard");
    $head_title = htmlspecialchars("Dashboard | Home");
    $head_class = "";
    $js_locs = array();
    include('resource/template/html/html_head.html');
    include('./resource/template/admin-dashboard/admin-header.html');
    include('./resource/template/admin-dashboard/admin-dashboard.html');
    include('./resource/template/html/html_foot.html');
?>