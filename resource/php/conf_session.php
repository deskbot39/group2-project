<?php
    // Cookie Configuration
    ini_set('session.use_only_cookies', 1);
    ini_set('session.use_strict_mode', 1);
    ini_set('session.cookie_secure', 1);
    date_default_timezone_set('Asia/Manila');

    // Turn off Errors During Prod, Comment these off during Dev
    ini_set('display_errors', false);
    ini_set('ignore_repeated_errors', true);
    ini_set('log_errors', true);
    ini_set('error_log', './resource/logs/errors.log');
    
    // Change domain depending on site
    $domain = $_SERVER['SERVER_NAME'];
    session_set_cookie_params([
        'lifetime' => 21600,
        'domain' => $domain,
        'path' => '/',
        'secure' => true,
        'httponly' => true
    ]);


    session_start();

    // Session ID regen
    function regenerate_id() {
        session_regenerate_id();
        $_SESSION['last_regeneration'] = time();
    }
    $time_interval = 60 * 15;


    if (isset($_SESSION['user_id'])) {
        // Login Regen
        regenerate_id();

    } elseif (isset($_SESSION['user_id']) && !isset($_SERVER['last_regeneration'])) {
        regenerate_id();

    } elseif (isset($_SESSION['user_id']) && time() - $_SESSION['last_regeneration'] >= $time_interval) {
        regenerate_id();

    } elseif (!isset($_SERVER['last_regeneration'])) {
        regenerate_id();

    } elseif (time() - $_SESSION['last_regeneration'] >= $time_interval) {
        regenerate_id();

    }

?>