<?php
    require_once './resource/php/sesh_conf.php';
    require_once './resource/php/loginviewer.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Login Page of Wang Scent PH">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link href="./vendor/tailwind-normalize/css/preflight.css" rel="stylesheet">
        <link rel="stylesheet" href="./resource/css/style.css">
        <title>Login</title>
    </head>
    <body>
        <main class="login-cont d-flex col align-items-center justify-content-center w-100 m-auto">
            <div class="container-fluid">
                <div class="container w-25">
                    <?php login_error_checker(); ?>
                </div>
                <form class="container-fluid login-form p-5 w-25" action="./resource/php/loginhandler.php" method="post">
                    <h1 class="h2 mb-4 fw-normal text-center">Sign In</h1>
                    <div class="form-floating mb-2">
                        <input class="form-control" type="email" name="email" id="logemail_input" placeholder="Enter your email" required>
                        <label for="logemail_input">Email Address</label>
                    </div>
                    <div class="form-floating ">
                        <input class="form-control" type="password" name="password" id="logpwd_input" placeholder="Enter your password" required>
                        <label for="logpwd_input">Password</label>
                    </div>
                    <div class="d-flex justify-content-center align-items-center">
                        <button class="btn btn-primary w-50 my-4 py-2 text-align-center rounded-pill" type="submit">Sign In</button>
                    </div>
                    <p class="text-center">Don't have an account? Sign Up <a class="logreg-link" href="./register-page.php">here.</a></p>
                </form>
            </div>
        </main>
        <?php include('./resource/template/footer/footer.html'); ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>