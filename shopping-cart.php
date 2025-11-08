<?php
    require_once './resource/php/loader.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link href="./vendor/tailwind-normalize/css/preflight.css" rel="stylesheet">
        <link rel="stylesheet" href="./resource/css/style.css">
        <title>Shopping Cart</title>
    </head>
    <body>
        <div class="container-fluid fixed-top">
            <nav class="py-2 bg-body-tertiary border-bottom">
                <div class="container d-flex flex-wrap">
                    <ul class="nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link px-2 link-body-emphasis" href="./index.php#home">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2 link-body-emphasis" href="./index.php#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2 link-body-emphasis" href="./product-page.php" aria-current="page">Products</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-2 link-body-emphasis" href="./index.php#contacts">Contacts</a>
                        </li>
                    </ul>
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link link-body-emphasis px-2" href="./login-page.php">Sign In</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link link-body-emphasis px-2" href="./register-page.php">Sign Up</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <header class="py-3 mb-4 border-bottom">
                <div class="container d-flex flex-wrap justify-content-center">
                    <a class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto link-body-emphasis text-decoration-none" href="">
                        <span class="bi me-2">LOGO</span>
                        <span class="fs-4">Wang Scent PH</span>
                    </a>
                    <form class="col-12 col-lg-auto mb-3 mb-lg-0" action="" method="post" role="search">
                        <div class="input-group">
                            <input class="form-control" type="text" name="" id="" placeholder="Search..." aria-label="Search..." aria-describedby="btn-search">
                            <button class="btn btn-outline secondary" type="button" id="btn-search">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                            </button>
                        </div>
                    </form>
                </div>
            </header>
        </div>
        <main class="cart-cont d-flex align-items-center justify-content-center shadow">
            <div class="table-responsive w-50 p-5">
                <h1 class="h2">Shopping Cart</h1>
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col"">Product</th>
                            <th scope="col"">Price</th>
                            <th scope="col"">Quantity</th>
                            <th scope="col"">Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                Sample Product 1
                            </td>
                            <td>&#8369;450.00</td>
                            <td>
                                <input class=" form-control" type="number" name="" id="" min="0" max="10" value="1">
                            </td>
                            <td>
                                &#8369;450.00
                            </td>
                            <td class="d-flex justify-content-center" scope="col">
                                <button class="btn btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Sample Product 2
                            </td>
                            <td>&#8369;350.00</td>
                            <td>
                                <input class=" form-control" type="number" name="" id="" min="0" max="10" value="2">
                            </td>
                            <td>
                                &#8369;700.00
                            </td>
                            <td class="d-flex justify-content-center" scope="col">
                                <button class="btn btn-secondary">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class=" h-100">
                    <div class="cart-total shadow mb-3 p-3">
                        <h2 class="text-center border-bottom mb-3 pb-1 h2">Order Summary</h2>
                        <div class="mb-3">
                            <p class="h3"><b>Order Total:</b> &#8369;1150.00</p>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary w-25">Order Now</button>
                        </div>
                    </div>
                    <a class="logreg-link d-flex" href="./product-page.php">
                        Go back to shopping <svg class="bi" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>
                    </a>
                </div>
            </div>
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