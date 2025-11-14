<?php
    require_once './resource/php/conf_session.php';
    $head_desc = htmlspecialchars("Dashboard Products Page");
    $head_title = htmlspecialchars("Dashboard | Products");
    $head_class = "";
    $js_locs = array();
    include('resource/template/html/html_head.html');
    include('./resource/template/admin-dashboard/admin-header.html');
    include('./resource/template/admin-dashboard/admin-table-product.html');
    include('./resource/template/html/html_foot.html');
?>