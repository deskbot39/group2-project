<?php
    include "classes/conf_db.php";
    include "classes/adminmodeluser.php";

    $user = new adminmodeluser();
    $role_arr = array('Admin', 'Customer', 'Staff');
    if (isset($_GET['role-sort']) && in_array($_GET['role-sort'], $role_arr)) {
        $role = $_GET['role-sort'];
        $usr_table = $user->getByRole($role);
    } elseif (isset($_GET['search'])) {
        $query = $_GET['search'];
        $usr_table = $user->searchUser($query);
    } else {
        $role = "";
        $query = "";
        $usr_table = $user->getAllUsers();
    }
     
?>