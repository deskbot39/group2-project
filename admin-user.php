<?php
    require_once './resource/php/conf_session.php';
    require_once './resource/php/userhandler.php';
    require_once './resource/php/loginviewer.php';
    userAdminLock();
    $head_desc = htmlspecialchars("Dashboard Users Page");
    $head_title = htmlspecialchars("Dashboard | Users");
    $head_class = "";
    $js_locs = array();
    include('resource/template/html/html_head.html');
    include('./resource/template/admin-dashboard/admin-header.html');
    include('./resource/template/admin-dashboard/admin-table-user.html');
    include('./resource/template/html/html_foot.html');
?>