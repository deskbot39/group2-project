<?php
    require_once './resource/php/conf_session.php';
    require_once './resource/php/loginviewer.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="./resource/css/style.css">
        <title>Shopping Cart</title>
    </head>
    <body>
        <?php include('./resource/template/header/header.html'); ?>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                    </svg>
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
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                    <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5m-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5M4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06m6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528M8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5"/>
                                    </svg>
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
                    <a class="btn btn-primary gap-2 justify-content-left align-items-center" href="./product-page.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/></svg>
                        Go back to shopping 
                    </a>
                </div>
            </div>
        </main>
        <?php include('./resource/template/footer/footer.html'); ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>