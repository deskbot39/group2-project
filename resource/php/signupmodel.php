<?php
// Sign Up Database Actions
    declare(strict_types=1);

    function fetchUser(object $pdo, string $user) {
        $query = "SELECT `username` FROM `users` WHERE username = :username";
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
        $option = [
            "cost" => 12
        ];
        $hashed_pwd = password_hash($pass, PASSWORD_BCRYPT, $option);
        $query = "INSERT INTO users (`username`, `email`, `password`, `phone_number`) VALUES (:username, :email, :password1, :phone)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $user);
        $stmt->bindParam(":email", $email);
        $stmt->bindParam(":password1", $hashed_pwd);
        $stmt->bindParam(":phone", $phone);
        $stmt->execute();
    }
?>