<?php
    require_once './resource/php/conf_session.php';
    require_once './resource/php/adminorderviewer.php';
    require_once './resource/php/loginviewer.php';
    roleLock();
    highRoleLock();
    $head_desc = htmlspecialchars("Dashboard Orders Page");
    $head_title = htmlspecialchars("Dashboard | Orders");
    $head_class = htmlspecialchars("");
    $js_locs = array();
    include('resource/template/html/html_head.html');
    admin_product_error_display();
    include('./resource/template/admin-dashboard/admin-header.html');
    include('./resource/template/admin-dashboard/admin-table-order.html');
    include('./resource/template/html/html_foot.html');
?>