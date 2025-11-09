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
    function emailValid(string $email) {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }
    function existingUsername(object $pdo, string $user) {
        if (fetchUsername($pdo, $user)) {
            return true;
        } else {
            return false;
        }
    }
    function existingEmail(object $pdo, string $email) {
        if (fetchEmail($pdo, $email)) {
            return true;
        } else {
            return false;
        }
    }
    function phoneValid(string $phone) {
        $clean_phone = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
        if (!preg_match('/^[0-9]{11}$/', $clean_phone)) {
            return true;
        } else {
            return false;
        }
    }
    function passwordLength(string $pass, int $length) {
        if (strlen($pass) < $length) {
            return true;
        } else {
            return false;
        }
    }
    function passwordUpper(string $pass) {
        if (!preg_match("@[A-Z]@", $pass)) {
            return true;
        } else {
            return false;
        }
    }
    function passwordLower(string $pass) {
        if (!preg_match("@[a-z]@", $pass)) {
            return true;
        } else {
            return false;
        }
    }
    function passwordNum(string $pass) {
        if (!preg_match("@[0-9]@", $pass)) {
            return true;
        } else {
            return false;
        }
    }
    function passwordChar(string $pass) {
        if (!preg_match("@[^\w]@", $pass)) {
            return true;
        } else {
            return false;
        }
    }
    function registerUser(object $pdo, string $user, string $email, string $pass, string $phone) {
        insertUser($pdo,$user,$email,$pass,$phone);
        insertUserRoles($pdo,$user);
    }
?>