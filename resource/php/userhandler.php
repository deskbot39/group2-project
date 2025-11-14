<?php
    include "classes/conf_db.php";
    include "classes/usermodel.php";

    $user = new usermodel();

    if (isset($_GET['role-sort']) && !Empty($_GET['role-sort'])) {
        $role = $_GET['role-sort'];
        $usr_table = $user->getByRole($role);
    } else {
        $usr_table = $user->getAllUsers();
    }
?>