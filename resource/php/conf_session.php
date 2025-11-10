<?php
    // Cookie Configuration
    ini_set('session.use_only_cookies', 1);
    ini_set('session.use_strict_mode', 1);
    session_set_cookie_params([
        'lifetime' => 21600,
        'domain' => 'localhost',
        'path' => '/',
        'secure' => true,
        'httponly' => true
    ]);
    
    session_start();

    function regenerate_id() {
        session_regenerate_id(true);
        $_SESSION['last_regeneration'] = time();
    }
    function regenerate_login_id() {
        session_regenerate_id(true);
        $user_id = $_SESSION['user_id'];
        $fresh_id = session_create_id();
        $login_session_id = $fresh_id . "_" . $user_id;
        $session_id($login_session_id);
    }

    // CSRF Token
    $csrf_token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $csrf_token;

    if (isset($_SESSION['user_id'])) {
        if (!isset($_SERVER['last_regeneration'])) {
            regenerate_login_id();
        } else {
            // Regenerates every 15mins
            $time_interval = 60 * 15;
    
            if (time() - $_SESSION['last_regeneration'] >= $time_interval) {
                regenerate_login_id();
            }
        }
    } else {
        if (!isset($_SERVER['last_regeneration'])) {
            regenerate_id();
        } else {
            // Regenerates every 15mins
            $time_interval = 60 * 15;
    
            if (time() - $_SESSION['last_regeneration'] >= $time_interval) {
                regenerate_id();
            }
        }
    }

?>