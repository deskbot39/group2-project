<?php
    require_once 'resource/php/sesh_conf.php';
    require_once 'resource/php/signupviewer.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="User registration page of Wang Scent PH">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link href="./vendor/tailwind-normalize/css/preflight.css" rel="stylesheet">
        <link rel="stylesheet" href="./resource/css/style.css">
        <title>Register</title>
    </head>
    <body>
        <main class="reg-cont d-flex align-items-center justify-content-center w-100 m-auto">
            <div class="container-fluid">
                <div class="container w-25">
                    <?php signup_error_checker(); ?>
                </div>
                <form class="container reg-form p-5 w-25" action="resource/php/signuphandler.php" method="post">
                    <h1 class="h2 mb-4 fw-normal text-center">Sign Up</h1>
                    <?php signup_saved_input(); ?>
                    <div class="d-flex align-items-center justify-content-center">
                        <button class="btn btn-primary w-50 my-4 py-2 text-align-center rounded-pill" type="submit">Sign Up</button>
                    </div>
                    <p class="text-center">Already have an account? Sign In <a class="logreg-link" href="./login-page.php">here.</a></p>
                </form>
            </div>
        </main>
        <?php include('./resource/template/footer/footer.html'); ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        <script src="./resource/js/register-validation.js"></script>
    </body>
</html>