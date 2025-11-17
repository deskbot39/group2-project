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

        $result = hashMatch($verify_hash);
        if ($result == NULL) {
            die('Token not found');
        }elseif (strtotime($result['pwd_token_expire']) <= time()) {
            die('Token has expired');
        }

        if (empty($pwd) || empty($confirm_pwd) || empty($token)) {
            die('Empty Form');
        } elseif (passwordDiff($pwd, $confirm_pwd)) {
            die('Pwd Not the same');
        } elseif (passwordInvalid($pwd)) {
            die('Invalid pwd');
        } else {
            $hashed_pwd = password_hash($pwd, PASSWORD_BCRYPT);
            $query = "UPDATE users SET password = :pwd, pwd_token = NULL, pwd_token_expire = NULL WHERE user_id = :uid";
            $stmt = $db->connect()->prepare($query);
            $stmt->bindParam(":pwd", $hashed_pwd);
            $stmt->bindParam(":uid", $result['user_id']);
            $stmt->execute();
        }

} else {
    echo 'Bar';
}
?>