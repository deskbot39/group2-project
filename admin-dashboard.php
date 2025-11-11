<?php
    require_once './resource/php/conf_session.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Administrator Dashboard for Management Purposes">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="./resource/css/style.css">
        <title>Admin Dashboard</title>
    </head>
    <body>
        <?php include('./resource/template/admin-dashboard/admin-header.html') ?>
        <div class="container-fluid">
            <div class="row">
                <?php include('./resource/template/admin-dashboard/admin-sidebar.html') ?>
                <main class="admdash-cont col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Dashboard</h1>
                        <div class="btn-toolbar mb-2 mb-2 mb-md-0">
                            <div class="btn-group me-2">
                                <button class="btn btn-sm btn-outline-secondary" type="button">Share</button>
                                <button class="btn btn-sm btn-outline-secondary" type="button">Export</button>
                            </div>
                            <button class="btn btn-sm btn-outline-secondary dropdown dropdown-toggle d-flex align-items-center gap-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-calendar-fill" viewBox="0 0 16 16">
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V5h16V4H0V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5"/>
                                </svg>
                                This Week
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="">This Week</a></li>
                                <li><a class="dropdown-item" href="">Last Month</a></li>
                                <li><a class="dropdown-item" href="">Last 3 Months</a></li>
                                <li><a class="dropdown-item" href="">Last 6 Months</a></li>
                                <li><a class="dropdown-item" href="">Last Year</a></li>
                            </ul>
                        </div>
                    </div>
                    <canvas class="my-4 w-100" id="myChart" width="747" height="315" style="display: block; box-sizing: border-box; height: 394px; width: 934px;"></canvas>
                    <h2>Table Name</h2>
                        <div class="table-responsive small">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Sample</th>
                                        <th>Sample</th>
                                        <th>Sample</th>
                                        <th>Sample</th>
                                        <th>Sample</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                        <td>1</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>2</td>
                                        <td>2</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>3</td>
                                        <td>3</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>4</td>
                                        <td>4</td>
                                        <td>4</td>
                                        <td>4</td>
                                        <td>4</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>5</td>
                                        <td>5</td>
                                        <td>5</td>
                                        <td>5</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td>6</td>
                                        <td>6</td>
                                        <td>6</td>
                                        <td>6</td>
                                        <td>6</td>
                                        <td>6</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </main>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
    </body>
</html>