<?php
    declare(strict_types=1);

    function signup_saved_input() {
        if (isset($_SESSION['signup_data']['username']) && !isset($_SESSION['errors_signup']['user_taken'])) {
            echo '
                <div class="form-floating">
                    <input class="form-control mb-2" type="text" name="username" id="regusr_input" placeholder="Enter your name" value="'. $_SESSION['signup_data']['username'] .'">
                    <label for="regusr_input">Username</label>
                </div>
            ';
        } else {
            echo '
                <div class="form-floating">
                    <input class="form-control mb-2" type="text" name="username" id="regusr_input" placeholder="Enter your name">
                    <label for="regusr_input">Username</label>
                </div>
            ';
        }

        if (isset($_SESSION['signup_data']['email']) && !isset($_SESSION['errors_signup']['invalid_email']) && !isset($_SESSION['errors_signup']['email_taken'])) {
            echo '
                <div class="form-floating mb-2">
                    <input class="form-control" type="email" name="email" id="regmail_input" placeholder="Enter your email" value="'. $_SESSION['signup_data']['email'] .'">
                    <label for="regemail_input">Email Address</label>                    
                </div>
            ';
        } else {
            echo '
                <div class="form-floating mb-2">
                    <input class="form-control" type="email" name="email" id="regmail_input" placeholder="Enter your email">
                    <label for="regemail_input">Email Address</label>                    
                </div>
            ';
        }

        if (isset($_SESSION['signup_data']['phone']) && !isset($_SESSION['errors_signup']['invalid_phone'])) {
            echo '
                <div class="form-floating mb-2">
                    <input class="form-control" type="text" name="phone" id="regphone_input" placeholder="Enter your phone number" value="'. $_SESSION['signup_data']['phone'] .'">
                    <label for="regphone_input">Phone Number</label>                    
                </div>
            ';
        } else {
            echo '
                <div class="form-floating mb-2">
                    <input class="form-control" type="text" name="phone" id="regphone_input" placeholder="Enter your phone number">
                    <label for="regphone_input">Phone Number</label>                    
                </div>
            ';
        }

        echo '
            <div class="form-floating mb-2">
                <input class="form-control" type="password" name="password" id="regpwd_input" placeholder="Enter your password">
                <label for="regpwd_input">Password</label>
            </div>
            <div class="form-floating mb-2">
                <input class="form-control" type="password" name="confirm_password" id="validpwd_input" placeholder="Repeat your password" aria-describedby="pwdinfo">
                <label for="validpwd_input">Repeat Password</label>
            </div>
        ';
    }
    
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
        } elseif (isset($_GET['signup']) && $_GET['signup'] == "success") {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">';
                echo '<p class=""fs-6>Successfully Signed Up</p>';
                echo '<button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button></div>';
        }
    }
?>