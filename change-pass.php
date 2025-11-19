<?php
    require_once './resource/php/conf_session.php';
    require_once './resource/php/loginviewer.php';
    require_once './resource/php/pwd-resetviewer.php';
    include "./resource/php/classes/conf_db.php";
    $head_desc = htmlspecialchars("Reset Password Page" ?? '');
    $head_title = htmlspecialchars("Wang Scent PH | Reset Password" ?? '');
    $head_class = htmlspecialchars("d-flex align-items-center justify-content-center py-4 bg-body-tertiary min-vh-100" ?? '');
    $js_locs = array("./resource/js/reset-validation.js");
    $csrf_token = bin2hex(random_bytes(32));
    $csrf_expire = time() + 60 * 15;
    $_SESSION['csrf_token'] = $csrf_token;
    $_SESSION['csrf_expire'] = $csrf_expire;
    
    if (isset($_GET['token'])) {
        $token = $_GET['token'];
    } else {
        $token = '0';
    }

    $verify_hash = hash("sha256", $token);

    function hashMatch($str) {
        $db = new conf_db();
        $query = "SELECT * FROM users WHERE pwd_token = :token";
        $stmt = $db->connect()->prepare($query);
        $stmt->bindParam(":token", $str);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
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
        errorSetter("no_toke", "Token Not Found");
        header('location: forgot-pass.php');
        die();
    }elseif (strtotime($result['pwd_token_expire']) <= time()) {
        errorSetter("toke_expire", "Token Link Expired");
        header('location: forgot-pass.php');
        die();
    }

    include('resource/template/html/html_head.html');
    reset_pwd_error_display();
    include('resource/template/verification/reset-pwd.html');
    include('./resource/template/html/html_foot.html');
?>