<?php
    if (isset($_POST['login-btn']) || $_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        require_once 'conf_session.php';
        include "classes/conf_db.php";
        include "classes/loginmodel.php";
        include "classes/logincontroller.php";

        $login = new logincontroller($email,$password);
        $login->loginUser();

        if ($_SESSION['role'] > 1) {
            header("location: ../../admin-dashboard.php");
            die();
        } else {
            header("location: ../../user-dashboard.php");
            die();
        }

    } else {
        header('location: ../index.php');
        die();
    }
?>