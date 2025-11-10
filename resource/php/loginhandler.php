<?php
    if (isset($_POST['login-btn']) || $_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['csrf_token'] === $_SESSION['csrf_token']) {
        
} else {
    header('location: ../index.php');
    die();
}
?>