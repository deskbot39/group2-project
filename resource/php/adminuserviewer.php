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

    function admin_product_error_display() {
        if (isset($_SESSION['admin_errors'])) {
            $error_arr = $_SESSION['admin_errors'];
            foreach ($error_arr as $error) {
                include ('./resource/template/alerts/alert-warning.html');
            }
            unset($_SESSION['admin_errors']);
        } elseif(isset($_SESSION['admin_good'])) {
            $succ_arr = $_SESSION['admin_good'];
            foreach ($succ_arr as $succ) {
                include ('./resource/template/alerts/alert-successOrder.html');
            }
            unset($_SESSION['admin_good']);
        }
    }

?>