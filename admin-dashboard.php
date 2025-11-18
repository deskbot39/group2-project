<?php
    require_once './resource/php/conf_session.php';
    require_once './resource/php/loginviewer.php';
    require_once './resource/php/dashboardviewer.php';
    roleLock();
    highRoleLock();
    $head_desc = htmlspecialchars("Admin Dashboard");
    $head_title = htmlspecialchars("Dashboard | Home");
    $head_class = "";
    $js_locs = array("./resource/js/chart-display.js");
    include('resource/template/html/html_head.html');
    include('./resource/template/admin-dashboard/admin-header.html');
    include('./resource/template/admin-dashboard/admin-dashboard.html');
    include('./resource/template/html/html_foot.html');
?>