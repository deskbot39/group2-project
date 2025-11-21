<?php
    require_once 'conf_session.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        include "classes/conf_db.php";
        include "classes/loginmodel.php";
        include "classes/logincontroller.php";

        $login = new logincontroller($email,$password);
        $login->loginUser();
        if ($_SESSION['role'] === 'Admin' || $_SESSION['role'] === 'Staff') {
            header("location: ../../admin-dashboard.php");
            die();
        } else {
            header("location: ../../user-dashboard.php");
            die();
        }
        
    } elseif (time() >= $_SESSION['csrf_expire']) {
        header('location: ../../index.php');
        die();
    } else {
        header('location: ../../index.php');
        die();
    }
?>