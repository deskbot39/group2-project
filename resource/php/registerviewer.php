<?php
    function register_saved_input() {
        if (isset($_SESSION['saved_input']['username']) && !isset($_SESSION['register_errors']['invalid_name']) && !isset($_SESSION['register_errors']['user_taken'])) {
            include('./resource/template/register-page/user_box-value.html');

        } else {
            include('./resource/template/register-page/user_box.html');
        }
        if (isset($_SESSION['saved_input']['email']) && !isset($_SESSION['register_errors']['invalid_email']) && !isset($_SESSION['register_errors']['email_taken'])) {
            include('./resource/template/register-page/email_box-value.html');
        } else {
            include('./resource/template/register-page/email_box.html');
        }

        if (isset($_SESSION['saved_input']['phone']) && !isset($_SESSION['register_errors']['invalid_phone'])) {
            include('./resource/template/register-page/phone_box-value.html');
        } else {
            include('./resource/template/register-page/phone_box.html');
        }

        include('./resource/template/register-page/password_box.html');
    }

    function register_error_display() {
        if (isset($_SESSION['register_errors'])) {
            $errors = $_SESSION['register_errors'];
            foreach ($errors as $error) {
                include ('./resource/template/alerts/alert-warning.html');
            }
            unset($_SESSION['register_errors']);
        } elseif (isset($_SESSION['register_good'])) {
            $succs = $_SESSION['register_good'];
            foreach ($succs as $succ) {
                include ('./resource/template/alerts/alert-successOrder.html');
            }
            unset($_SESSION['register_good']);
            unset($_SESSION['saved_input']);
        }
    }

?>