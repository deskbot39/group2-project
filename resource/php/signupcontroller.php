<?php
// Sign Up Input Validation
    declare(strict_types=1);

    function emptyInput(string $user, string $email, string $phone, string $pass, string $cpass) {
        if (empty($user) || empty($email) || empty($phone) || empty($pass) || empty($cpass)) {
            return true;
        } else {
            return false;
        }
    }
    function emailCheck(string $email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
    function uniqueUser(object $pdo, string $user) {
        if (fetchUser($pdo, $user)) {
            return true;
        } else {
            return false;
        }
    }
    function uniqueEmail(object $pdo, string $email) {
        if (fetchEmail($pdo, $email)) {
            return true;
        } else {
            return false;
        }
    }
    function registerUser(object $pdo, string $user, string $email, string $pass, string $phone) {
        insertUser($pdo,$user,$email,$pass,$phone);
    }
?>