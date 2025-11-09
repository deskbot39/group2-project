<?php
    declare(strict_types=1);

    function user_login_output() {
        if (isset($_SESSION['user_id'])) {
            include ('./resource/template/login-page/nav_info-logged.html');                
        } 
        else {
            include ('./resource/template/login-page/nav_info.html');                
        }
    }

    function login_error_checker() {
        if (isset($_SESSION['errors_login'])) {
            $error_arr = $_SESSION['errors_login'];
            foreach ($error_arr as $error) {
                include ('./resource/template/alerts/alert-warning.html');                
            }
            unset($_SESSION['errors_login']);
        }
    }
?>