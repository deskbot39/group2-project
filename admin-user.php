<?php
    require_once './resource/php/conf_session.php';
    require_once './resource/php/adminuserviewer.php';
    require_once './resource/php/loginviewer.php';
    roleLock();
    highRoleLock();
    $head_desc = htmlspecialchars("Dashboard Users Page");
    $head_title = htmlspecialchars("Dashboard | Users");
    $head_class = htmlspecialchars("");
    $js_locs = array();
    include('resource/template/html/html_head.html');
    admin_product_error_display();
    include('./resource/template/admin-dashboard/admin-header.html');
    include('./resource/template/admin-dashboard/admin-table-user.html');
    include('./resource/template/html/html_foot.html');
?>