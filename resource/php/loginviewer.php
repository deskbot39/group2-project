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