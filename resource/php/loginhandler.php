<?php
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        try {
            require_once 'db_conf.php';
            require_once 'loginmodel.php';
            require_once 'logincontroller.php';
            
            $error_arr = [];
            $result = fetchUser($pdo, $email);
            if (emptyInput($email,$password)) {
                $error_arr['empty_form'] = "Fill all fields!";
            }
            elseif ($result == 0) {
                $error_arr['no_user'] = "Incorrect Email or User does not exist";
            }
            elseif (!wrongMail($result) && !password_verify($password,$result['password'])) {
                $error_arr['wrong_info'] = "Incorrect password";
            } 

            require_once 'sesh_conf.php';

            if ($error_arr) {
                $_SESSION['errors_login'] = $error_arr;

                header('Location: ../../login-page.php');
                die();
            }

            $new_seshId = session_create_id();
            $sessionId = $new_seshId . "_" . $result['user_id'];
            $usr_role = fetchUserRole($pdo, $result['user_id']);
            session_id($sessionId);

            $_SESSION['user_id'] = $result['user_id'];
            $_SESSION['username'] = htmlspecialchars($result['username']);
            $_SESSION['email'] = htmlspecialchars($result['email']);
            $_SESSION['phone'] = htmlspecialchars($result['phone_number']);
            $_SESSION['role'] = $usr_role['role_id'];
            $_SESSION['last_regeneration'] = time();

            if ($_SESSION['role'] > 1) {
                header('Location: ../../admin-dashboard.php?login=success');
                
                $pdo = null;
                $stmt = null;
                die();
            } else {
                header('Location: ../../user-dashboard.php?login=success');
                
                $pdo = null;
                $stmt = null;
                die();
            }
        } catch (PDOException $e){
            die("Query failed: " . $e->getMessage());
        }
    } else {
        header('Location: ../../product-page.php');
        die();
    }
?>