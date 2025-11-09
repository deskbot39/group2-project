<?php
    $db_usr = "root";
    $db_pwd = "";
    $db_info = "mysql:host=localhost;dbname=testing;";
    
    try {
        $pdo = new PDO ($db_info, $db_usr, $db_pwd);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Connection error:".$e->getMessage());
    } finally {
        return $pdo;
    }
    
?>