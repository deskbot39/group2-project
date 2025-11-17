<?php
    function userLoginDisplay() {
        if (isset($_SESSION['user_id'])) {
            // include ('./resource/template/nav/nav-logged.html');
            include ('./resource/template/header/header.html');
        } 
        else {
            include ('./resource/template/nav/nav.html');
        }
    }

    function roleLock() {
        if (!isset($_SESSION['role'])) {
            header('location: ./index.php');
            die();
        }
    }

    function highRoleLock() {
        $roles = array('Admin', 'Staff');
        if (!in_array($_SESSION['role'], $roles)) {
            header('location: ./product-page.php');
            die();
        }
    }

    function login_error_display() {
        if (isset($_SESSION['login_errors'])) {
            $error_arr = $_SESSION['login_errors'];
            foreach ($error_arr as $error) {
                include ('./resource/template/alerts/alert-warning.html');
            }
            unset($_SESSION['login_errors']);
        }
    }
?>