<?php
    require_once './resource/php/conf_session.php';
    require_once './resource/php/productviewer.php';
    require_once './resource/php/loginviewer.php';
    roleLock();
    highRoleLock();
    $head_desc = htmlspecialchars("Dashboard Products Page");
    $head_title = htmlspecialchars("Dashboard | Products");
    $head_class = htmlspecialchars("");
    $js_locs = array();
    include('resource/template/html/html_head.html');
    include('./resource/template/admin-dashboard/admin-header.html');
    include('./resource/template/admin-dashboard/admin-table-product.html');
    include('./resource/template/html/html_foot.html');
?>