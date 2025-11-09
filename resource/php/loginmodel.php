<?php
    declare(strict_types=1);

    function fetchUser(object $pdo, string $email) {
        $query = "SELECT * FROM `users` WHERE email = :email";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    function fetchUserRole(object $pdo, int $id) {
        $query = "SELECT * FROM `user_roles` WHERE user_id = :usid";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":usid", $id);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
?>