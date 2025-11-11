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

    // CSRF Token
    $csrf_token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $csrf_token;
    $time_interval = 60 * 15;

    if (isset($_SESSION['user_id'])) {
        // Login Regen
        regenerate_id();
    } elseif (isset($_SESSION['user_id']) && !isset($_SERVER['last_regeneration'])) {
        // Login Regen
        regenerate_id();
    } elseif (isset($_SESSION['user_id']) && time() - $_SESSION['last_regeneration'] >= $time_interval) {
        // Login Regen
        regenerate_id();
    } elseif (!isset($_SERVER['last_regeneration'])) {
        regenerate_id();
    } elseif (time() - $_SESSION['last_regeneration'] >= $time_interval) {
        regenerate_id();
    }

?>