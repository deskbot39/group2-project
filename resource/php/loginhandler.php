<?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = $_POST['logemail_box'];
        $pwd = $_POST['logpwd_box'];
        
        
    } else {
        header('Location: ../../index.php');
        die();
    }
?>