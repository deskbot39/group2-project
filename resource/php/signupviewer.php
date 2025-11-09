<?php
    declare(strict_types=1);

    function signup_saved_input() {
        if (isset($_SESSION['signup_data']['username']) && !isset($_SESSION['errors_signup']['user_taken'])) {
            include('./resource/template/register-page/user_box-value.html');
        } else {
            include('./resource/template/register-page/user_box.html');
        }

        if (isset($_SESSION['signup_data']['email']) && !isset($_SESSION['errors_signup']['invalid_email']) && !isset($_SESSION['errors_signup']['email_taken'])) {
            include('./resource/template/register-page/email_box-value.html');
        } else {
            include('./resource/template/register-page/email_box.html');
        }

        if (isset($_SESSION['signup_data']['phone']) && !isset($_SESSION['errors_signup']['invalid_phone'])) {
            include('./resource/template/register-page/phone_box-value.html');
        } else {
            include('./resource/template/register-page/phone_box.html');
        }
        include('./resource/template/register-page/password_box.html');
    }
    
    function signup_error_checker() {
        if (isset($_SESSION['errors_signup'])) {
            $error_arr = $_SESSION['errors_signup'];
            foreach ($error_arr as $error) {
                include ('./resource/template/alerts/alert-warning.html');
            } 
            unset($_SESSION['errors_signup']);
        } elseif (isset($_GET['signup']) && $_GET['signup'] === "success") {
                include ('./resource/template/alerts/alert-success.html');
                unset($_SESSION['signup_data']);
        }
    }
?>