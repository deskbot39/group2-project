<?php
    require_once './resource/php/loader.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Landing page of Wang Scent PH">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link href="./vendor/tailwind-normalize/css/preflight.css" rel="stylesheet">
        <link href="./resource/css/style.css" rel="stylesheet">
        <title>Wang Scent PH</title>
    </head>
    <body>
        <!-- <header class="d-flex flex-row">
            <nav class="navi-cont navbar fixed-top navbar-expand-lg bg-primary" id="navigator">
                <div class="container-fluid py-2">
                    <a class="navbar-brand" href="#">Wang Scent PH</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navtoggler" aria-controls="navtoggler" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="navbar-collapse collapse" id="navtoggler">
                        <ul class="navi navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#home">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#about">About Us</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#products">Products</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#contacts">Contacts</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header> -->
        <div class="navi-cont container-fluid fixed-top">
            <header class="d-flex flex-wrap justify-content-center py-2">
                <a class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-decoration-none" href="">
                    <span class="bi me-2 text-white">LOGO</span>
                    <span class="fs-4 text-white">Wang Scent PH</span>
                </a>
                <ul class="navi nav nav-pills id="scroller">
                    <li class="nav-item">
                        <a class="nav-link px-3" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="#about">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="#products">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3" href="#contacts">Contacts</a>
                    </li>
                </ul>
            </header>
        </div>
        <main data-bs-spy="scroll" data-bs-target="#scroller" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" tabindex="0">
            <section id="home">
                <h1>Home</h1>
            </section>
            <section id="about">
                <h1>About</h1>
            </section>
            <section id="products">
                <h1>Products</h1>
                <p>will link to <a href="./product-page.php">product page</a></p>
            </section>
            <section id="contacts">
                <h1>Contacts</h1>
            </section>
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
                        <a class="nav-link px-2 text-white" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-2 text-white" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram"><rect x="2" y="2" width="20" height="20" rx="5" ry="5"/><path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"/><line x1="17.5" y1="6.5" x2="17.51" y2="6.5"/></svg>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-2 text-white" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter"><path d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z"/></svg>
                        </a>
                    </li>
                </ul>
                <p class="text-center text-white">&copy; 2025 Wang Scent PH</p>
            </div>
        </footer>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>