<?php
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
        $email = $_POST['email'];
        $pwd = $_POST['password'];
        
        try {
            require_once 'db_conf.php';
            require_once 'loginmodel.php';
            require_once 'logincontroller.php';

        } catch (PDOException $e){
            die("Query failed: " . $e->getMessage());
        }
    } else {
        header('Location: ../../product-page.php');
        die();
    }
?>