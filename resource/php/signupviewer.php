<?php
    declare(strict_types=1);
    
    function signup_error_checker() {
        if (isset($_SESSION['errors_signup'])) {
            $error_arr = $_SESSION['errors_signup'];

            echo "<br>";
            foreach ($error_arr as $error) {
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">';
                echo '<p class=""fs-6>'.$error .'</p>';
                echo '<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button></div>';
            } 
            unset($_SESSION['errors_signup']);
        } elseif (isset($_GET['signup']) && $_GET['signup'] === "success") {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                echo '<p class=""fs-6>Successfully Signed In</p>';
                echo '<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    }
?>