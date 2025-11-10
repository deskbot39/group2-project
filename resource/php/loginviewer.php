<?php
    function user_login_output() {
        if (isset($_SESSION['user_id'])) {
            include ('./resource/template/login-page/nav_info-logged.html');                
        } 
        else {
            include ('./resource/template/login-page/nav_info.html');                
        }
    }

    function login_error_checker() {
        if (isset($_SESSION['login_errors'])) {
            $error_arr = $_SESSION['login_errors'];
            foreach ($error_arr as $error) {
                include ('./resource/template/alerts/alert-warning.html');                
            }
            unset($_SESSION['login_errors']);
        }
    }
?>