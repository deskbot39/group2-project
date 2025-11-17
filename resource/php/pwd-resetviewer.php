<?php
    function reset_pwd_error_display() {
        if (isset($_SESSION['reset_errors'])) {
            $error_arr = $_SESSION['reset_errors'];
            foreach ($error_arr as $error) {
                include ('./resource/template/alerts/alert-warning.html');
            }
            unset($_SESSION['reset_errors']);
        } elseif(isset($_SESSION['reset_good'])) {
            $succ_arr = $_SESSION['reset_good'];
            foreach ($succ_arr as $succ) {
                include ('./resource/template/alerts/alert-successOrder.html');
            }
            unset($_SESSION['reset_good']);
        }
    }
?>