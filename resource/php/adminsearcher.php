<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $search = $_GET['search'];

        include 'classes/conf_db.php';
        $db = new conf_db();
        $query = "SELECT";
    } else {
        header('location: ../../admin-dashboard.php');
        die();
    }
?>