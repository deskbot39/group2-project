<?php
    include "classes/conf_db.php";
    include "classes/dashboardmodel.php";

    $dash = new dashboardmodel();
    $month = date('m');
    $year = date('Y');
    $usr_count = $dash->getUserCount();
    $ord_count = $dash->getOrderCount($month, $year);
    $stock_total = $dash->getTotalStock($month, $year);
    $revenue_total = $dash->getTotalRevenue($month, $year);

?>