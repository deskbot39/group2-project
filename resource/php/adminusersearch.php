<?php
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        include "classes/conf_db.php";
        include "classes/adminmodeluser.php";

        if (isset($_GET['search'])) {
            $user = new adminmodeluser();
            $query = $_GET['search'];
            $usr_table = $user->searchUser($query);
            return $usr_table;
        } else {
            $usr_table = $user->getAllUsers();
            return $usr_table;
        }
    } else {
        header('location: admin-dashboard.php');
        die();
    }
?>