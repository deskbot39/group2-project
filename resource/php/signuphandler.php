<?php
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $cpassword = $_POST['confirm_password'];

        try {
            require_once 'db_conf.php';
            require_once 'signupmodel.php';
            require_once 'signupcontroller.php';
            
            $error_arr = [];
            if (emptyInput($username,$email,$phone,$password,$cpassword)) {
                $error_arr['empty_form'] = "Fill all fields!";
            } 
            elseif (emailCheck($email)) {
                $error_arr['invalid_email'] = "Invalid email!";
            } 
            elseif (uniqueUser($pdo, $username)) {
                $error_arr['user_taken'] = "Username already taken!";
            } 
            elseif (uniqueEmail($pdo, $email)) {
                $error_arr['email_taken'] = "Email already used!";
            }
            elseif (strlen($password < 8)) {
                $error_arr['invalid_password'] = "Password needs to be 8 characters";
            } 
            else if (!preg_match("@[A-Z]@", $password)) {
                $error_arr['no_uppercase'] = "Password requires at least one uppercase character";
            }
            else if (!preg_match("@[a-z]@", $password)) {
                $error_arr['no_lowercase'] = "Password requires at least one lowercase character";
            }
            else if (!preg_match("@[0-9]@", $password)) {
                $error_arr['no_number'] = "Password requires at least one number character";
            }
            else if (!preg_match("@[^\w]@", $password)) {
                $error_arr['no_character'] = "Password requires at least one special character";
            }
            elseif ($password !== $cpassword) {
                $error_arr['password_differ'] = "Passwords are not the same!";
            }
            
            require_once 'sesh_conf.php';

            if ($error_arr) {
                $_SESSION['errors_signup'] = $error_arr;
                header('Location: ../../register-page.php');
                die();
            }

            registerUser($pdo,$username,$email,$password,$phone);
            header('Location: ../../admin-dashboard.php?signup=sucess');
            $pdo = null;
            $stmt = null;
            die();

        } catch (PDOException $e) {
            die("Query failed:" . $e->$getMessage());
        } 
    } else {
        header('Location: ../../index.php');
        die();
    }
?>