<?php
// Sign Up Database Actions
    declare(strict_types=1);

    function fetchUsername(object $pdo, string $user) {
        $query = "SELECT `username` FROM `users` WHERE username = :username";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $user);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function fetchUserID(object $pdo, string $user) {
        $query = "SELECT `user_id` FROM `users` WHERE username = :username";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $user);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function fetchEmail(object $pdo, string $email) {
        $query = "SELECT `email` FROM `users` WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function insertUser(object $pdo, string $user, string $email, string $pass, string $phone) {
        $hashed_pwd = password_hash($pass, PASSWORD_BCRYPT);
        $query = "INSERT INTO users (`username`, `email`, `password`, `phone_number`) VALUES (:username, :email, :password1, :phone)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $user);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password1", $hashed_pwd);
        $stmt->bindParam(":phone", $phone);
        $stmt->execute();
    }
    function insertUserRoles($pdo, $user) {
        // Will always default new users to customer role
        $uid = fetchUserID($pdo, $user);
        $rid =  1;
        $query = "INSERT INTO user_roles(`user_id`, `role_id`) VALUES (:usrid, :roid)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":usrid", $uid['user_id']);
        $stmt->bindParam(":roid", $rid);
        $stmt->execute();
    }
?>