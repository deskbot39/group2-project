<?php
    require_once './resource/php/loader.php';
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
        <main class="reg-cont d-flex align-items-center justify-content-center w-100 m-auto shadow">
            <form class="reg-form p-5" action="" method="post">
                <h1 class="h2 mb-4 fw-normal">Sign Up</h1>
                <div class="form-floating">
                    <input class="form-control mb-2" type="text" name="regusr_box" id="regusr_input" placeholder="Enter your name">
                    <label for="regusr_input">Username</label>
                </div>
                <div class="form-floating mb-2">
                    <input class="form-control" type="email" name="regemail_box" id="regmail_input" placeholder="Enter your email">
                    <label for="regemail_input">Email Address</label>                    
                </div>
                <div class="form-floating mb-2">
                    <input class="form-control" type="tel" name="regphone_box" id="regphone_input" placeholder="Enter your phone number">
                    <label for="regphone_input">Phone Number</label>                    
                </div>
                <div class="form-floating mb-2">
                    <input class="form-control" type="password" name="regpwd_box" id="regpwd_input" placeholder="Enter your password">
                    <label for="regpwd_input">Password</label>
                </div>
                <div class="form-floating mb-2">
                    <input class="form-control" type="password" name="validpwd_box" id="validpwd_input" placeholder="Repeat your password" aria-describedby="pwdinfo">
                    <label for="validpwd_input">Repeat Password</label>
                    <span class="form-text" id="pwdinfo">Your password must be <b>8-20 characters long</b> and have <br> at least <b>one uppercase</b>, <b>one lowercase</b>, and <b>one number</b></span>
                </div>
                <button class="btn btn-primary w-100 my-4 py-2 text-align-center" type="submit">Sign Up</button>
                <p class="text-center">Already have an account? Sign In <a class="logreg-link" href="./login-page.php">here.</a></p>
            </form>
        </main>
        <footer class="foot-cont container-fluid">
            <div class="py-2">
                <ul class="footah nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item">
                        <a class="nav-link px-2 text-white" href="./index.php">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-2 text-white" href="https://www.facebook.com/profile.php?id=100091438737182"  target="_blank" rel="noopener">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-2 text-white" href="https://www.instagram.com/wangscentph/" target="_blank" rel="noopener">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-2 text-white" href="https://www.tiktok.com/@wangscentph" target="_blank" rel="noopener">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tiktok" viewBox="0 0 16 16">
                            <path d="M9 0h1.98c.144.715.54 1.617 1.235 2.512C12.895 3.389 13.797 4 15 4v2c-1.753 0-3.07-.814-4-1.829V11a5 5 0 1 1-5-5v2a3 3 0 1 0 3 3z"/>
                            </svg>
                        </a>
                    </li>
                </ul>
                <p class="text-center text-white">&copy; 2025 Wang Scent PH</p>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>