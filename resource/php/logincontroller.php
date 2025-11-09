<?php
    declare(strict_types=1);

    function emptyInput(string $email, string $pass) {
        if (empty($email) || empty($pass)) {
            return true;
        } else {
            return false;
        }
    }
    function wrongMail(bool|array $result) {
        if (!$result) {
            return true;
        } else {
            return false;
        }
    }
?>