<?php
    include "classes/conf_db.php";
    include "classes/usermodel.php";

    $user = new usermodel();
    $role_arr = array('Admin', 'Customer', 'Staff');
    if (isset($_GET['role-sort']) && in_array($_GET['role-sort'], $role_arr)) {
        $role = $_GET['role-sort'];
        $usr_table = $user->getByRole($role);
    } else {
        $role = "";
        $usr_table = $user->getAllUsers();
    }

?>