<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once 'conf_session.php';
        include "classes/conf_db.php";

        $token = $_POST['token'];
        $pwd = $_POST['reset-pass'];
        $confirm_pwd = $_POST['reset-cpass'];
        $verify_hash = hash("sha256", $token);
        $db = new conf_db();

        function hashMatch($str) {
            $db = new conf_db();
            $query = "SELECT * FROM users WHERE pwd_token = :token";
            $stmt = $db->connect()->prepare($query);
            $stmt->bindParam(":token", $str);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }

        function passwordInvalid($pwd) {
            $reg_upper = "@[A-Z]@";
            $reg_lower = "@[a-z]@";
            $reg_schar = "@[^\W]@";
            $reg_num = "@[0-9]@";
            if (!preg_match($reg_upper, $pwd) || !preg_match($reg_lower, $pwd) || !preg_match($reg_schar, $pwd) || !preg_match($reg_num, $pwd) || strlen($pwd) < 8) {
                return true;
            } else {
                return false;
            }
        }

        function passwordDiff($pwd, $cpwd) {
            if ($pwd !== $cpwd) {
                return true;
            } else {
                return false;
            }
        }

        function errorSetter($code, $text) {
            $error_arr = [];
            $error_arr[$code] = $text;
            $_SESSION['reset_errors'] = $error_arr;
        }
        
        function successSetter($code, $text) {
            $succ_arr = [];
            $succ_arr[$code] = $text;
            $_SESSION['reset_good'] = $succ_arr;
        }

        $result = hashMatch($verify_hash);
        if ($result == NULL) {
            errorSetter("no_toke", "Reset Token not found");
            header('location: ../../forgot-pass.php');
            die();
        }elseif (strtotime($result['pwd_token_expire']) <= time()) {
            errorSetter("exp_toke", "Reset Token has expired");
            header('location: ../../forgot-pass.php');
            die();
        }
        
        if (empty($pwd) || empty($confirm_pwd) || empty($token)) {
            errorSetter("empty_form", "Empty Form");
            header('location: ../../change-pass.php');
            die();
        } elseif (passwordDiff($pwd, $confirm_pwd)) {
            errorSetter("diff_pwd", "Passwords are not the same");
            header('location: ../../change-pass.php');
            die();
        } elseif (passwordInvalid($pwd)) {
            errorSetter("invalid_pwd", "Invalid password");
            header('location: ../../change-pass.php');
            die();
        } else {
            $hashed_pwd = password_hash($pwd, PASSWORD_BCRYPT);
            $query = "UPDATE users SET password = :pwd, pwd_token = NULL, pwd_token_expire = NULL WHERE user_id = :uid";
            $stmt = $db->connect()->prepare($query);
            $stmt->bindParam(":pwd", $hashed_pwd);
            $stmt->bindParam(":uid", $result['user_id']);
            $stmt->execute();
            successSetter("reset_succ", "Password has been reset");
            header('location: ../../login-page.php');
            die();
        }

} else {
    header('location: ../../forgot-pass.php');
    die();
}
?>