<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $id = (int)$_POST['id'];

        require_once 'conf_session.php';
        include 'classes/conf_db.php';
        include 'classes/adminmodeluser.php';
        
        $adusr = new adminmodeluser();

        if ($adusr->deleteUser($id)) {
            $success_arr = [];
            $success_arr['del_good'] = 'User has been successfully deleted';
            $_SESSION['admin_good'] = $success_arr;
            header('location: ../../admin-user.php');
            die();
        } else {
            $error_arr = [];
            $error_arr['no_id'] = 'User does not exist';
            $_SESSION['admin_errors'] = $error_arr;
            header('location: ../../admin-user.php');
            die();
        }

    } else {
        header('location: ../../user.php');
        die();
    }
?>