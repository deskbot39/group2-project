<?php
    require_once 'conf_session.php';
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $confirm_password = $_POST['confirm_password'];
        $password = $_POST['password'];

        include "classes/conf_db.php";
        include "classes/registermodel.php";
        include "classes/registercontroller.php";
        
        if (isset($_SESSION['register_errors'])) {
            $saved_arr = [
                'username' => $username,
                'email' => $email,
                'phone' => $phone
            ];
            $_SESSION['saved_input'] = $saved_arr;
        }

        $register = new registercontroller($username,$email,$password,$confirm_password,$phone);
        $register->registerUser();
        
        header("location: ../../register-page.php");
        die();

    } elseif(time() >= $_SESSION['csrf_expire']) {
        header('location: ../../index.php');
        die();
    } else {
        header('location: ../../index.php');
        die();
    }
?>