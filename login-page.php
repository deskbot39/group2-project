<?php
    require_once './resource/php/conf_session.php';
    require_once './resource/php/loginviewer.php';
    $head_desc = htmlspecialchars("Login Page of Wang Scent PH");
    $head_title = htmlspecialchars("Wang Scent PH | Login");
    $head_class = htmlspecialchars("d-flex align-items-center justify-content-center py-4 bg-body-tertiary min-vh-100");
    $js_loc = htmlspecialchars("");
    include('resource/template/html/html_head.html');
    login_error_display();
?>
<main class="form-cont card w-100 m-auto shadow">
    <form class="" action="./resource/php/loginhandler.php" method="post">
        <div class="card-header">
            <h1 class="h2 text-center">Sign In</h1>
        </div>
        <div class="card-body">
            <div class="form-floating mb-2">
                <input class="form-control" type="email" name="email" id="logemail_input" inputmode="email" placeholder="Enter your email" required>
                <label for="logemail_input">Email Address</label>
            </div>
            <div class="form-floating mb-2">
                <input class="form-control" type="password" name="password" id="logpwd_input" placeholder="Enter your password" required>
                <label for="logpwd_input">Password</label>
            </div>
            <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" >
            <div class="d-flex justify-content-center align-items-center">
                <button class="btn btn-primary w-50 my-4 py-2 text-align-center rounded-pill" name="login-btn" type="submit">Sign In</button>
            </div>
            <p class="text-center">Don't have an account? Sign Up <a class="text-decoration-none" href="./register-page.php">here.</a></p>
            <div class="d-flex justify-content-center align-items-center">
                <a class="text-decoration-none" href="./index.php">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/></svg>
                    Return to home
                </a>
            </div>
        </div>
    </form>
</main>
<?php 
    include('./resource/template/html/html_foot.html');
?>