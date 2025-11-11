<?php
    require_once 'resource/php/conf_session.php';
    require_once 'resource/php/registerviewer.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="User registration page of Wang Scent PH">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="./resource/css/style.css">
        <title>Register</title>
    </head>
    <body class="d-flex align-items-center justify-content-center py-4 bg-body-tertiary min-vh-100">
        <div class="position-fixed top-0 end-0 container-fluid my-4 z-3">
            <?php register_error_display(); ?>
        </div>
        <main class="form-cont card w-100 m-auto shadow">
            <form action="resource/php/registerhandler.php" method="post">
                <div class="card-header">
                    <h1 class="h2 text-center">Sign Up</h1>
                </div>
                <div class="card-body">
                    <?php register_saved_input(); ?>
                    <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>" >
                    <div class="d-flex align-items-center justify-content-center">
                        <button class="btn btn-primary w-50 my-4 py-2 text-align-center rounded-pill" name="register-btn" type="submit">Sign Up</button>
                    </div>
                    <p class="text-center">Already have an account? Sign In <a class="text-decoration-none" href="./login-page.php">here.</a></p>
                    <div class="d-flex justify-content-center align-items-center">
                        <a class="text-decoration-none" href="./index.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5"/>
                            </svg>
                            Return to home
                        </a>
                    </div>
                </div>
            </form>
        </main>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
        <script src="./resource/js/register-validation.js"></script>
    </body>
</html>