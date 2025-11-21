<?php
    require_once './resource/php/conf_session.php';
    require_once './resource/php/loginviewer.php';
    require_once './resource/php/pwd-resetviewer.php';
    include "./resource/php/classes/conf_db.php";
    $head_desc = htmlspecialchars("Email Verification");
    $head_title = htmlspecialchars("Wang Scent PH | Email Verification");
    $head_class = htmlspecialchars("d-flex align-items-center justify-content-center py-4 bg-body-tertiary min-vh-100");
    $js_locs = array();

    
    include('resource/template/html/html_head.html');
    reset_pwd_error_display();
    if (isset($_GET['token'])) {
        $token = $_GET['token'];
    } else {
        $token = '0';
    }

    $verify_hash = hash("sha256", $token);

    function emailhashMatch($str) {
        $db = new conf_db();
        $query = "SELECT * FROM users WHERE email_hash = :token";
        $stmt = $db->connect()->prepare($query);
        $stmt->bindParam(":token", $str);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function emailUpdater($id) {
        $db = new conf_db();
        $query = "UPDATE users SET email_hash = NULL WHERE user_id = :id";
        $stmt = $db->connect()->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
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

    $result = emailhashMatch($verify_hash);
    if ($result == NULL) {
        errorSetter("email_null", "Email Not Found");
        header('location: register-page.php');
        die();
    } else {
        $id = (int)$result['user_id'];
        emailUpdater($id);
        include('./resource/template/verification/email-activated.html');
    }
    include('./resource/template/html/html_foot.html');
?>