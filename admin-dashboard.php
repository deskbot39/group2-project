<?php
    require_once './resource/php/loader.php';
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Administrator Dashboard for Management Purposes">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link href="./vendor/tailwind-normalize/css/preflight.css" rel="stylesheet">
        <link rel="stylesheet" href="./resource/css/style.css">
        <title>Admin Dashboard</title>
    </head>
    <body>
        <header class="navbar flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 m-3 me-0 fs-6" href="#">Wang Scent PH</a>
            <ul class="navbar-nav flex-row d-md-none">
                <li class="nav-item text-nowrap">
                    <button class="nav-link px-3" type="button" data-bs-toggle="collapse" data-bs-target="#navsearch" aria-controls="navsearch" aria-expanded="false" aria-label="search toggler">
                        <svg class="bi" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
                    </button>
                </li>
                <li class="nav-item text-nowrap">
                    <button class="nav-link px-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="sidebar toggler">
                        <svg class="bi" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-list"><line x1="8" y1="6" x2="21" y2="6"></line><line x1="8" y1="12" x2="21" y2="12"></line><line x1="8" y1="18" x2="21" y2="18"></line><line x1="3" y1="6" x2="3.01" y2="6"></line><line x1="3" y1="12" x2="3.01" y2="12"></line><line x1="3" y1="18" x2="3.01" y2="18"></line></svg>
                    </button>
                </li>
            </ul>
            <div class="navbar-search w-100 collapse" id="navsearch">
                <input class="form-control w-75 rounded-0 border-0 m-3" type="text" name="admsearch_box" id="admsearch_input" aria-label="searchbar" placeholder="Search...">
            </div>
        </header>
        <div class="container-fluid">
            <div class="row">
                <div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
                    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebar" aria-labelledby="sidebarlabel">
                        <div class="offcanvas-header">
                            <h5 class="offcanvas-title" id="sidebarlabel">Wang Scent PH</h5>
                            <button class="btn-close" type="button" data-bs-dismiss="offcanvas" data-bs-target="#sidebar" aria-label="close"></button>
                        </div>
                        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2 active" href="" aria-current="page">
                                        <svg class="bi" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bar-chart"><line x1="12" y1="20" x2="12" y2="10"></line><line x1="18" y1="20" x2="18" y2="4"></line><line x1="6" y1="20" x2="6" y2="16"></line></svg>
                                        Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="">
                                        <svg class="bi" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-gift"><polyline points="20 12 20 22 4 22 4 12"></polyline><rect x="2" y="7" width="20" height="5"></rect><line x1="12" y1="22" x2="12" y2="7"></line><path d="M12 7H7.5a2.5 2.5 0 0 1 0-5C11 2 12 7 12 7z"></path><path d="M12 7h4.5a2.5 2.5 0 0 0 0-5C13 2 12 7 12 7z"></path></svg>
                                        Products
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="">
                                        <svg class="bi" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-package"><line x1="16.5" y1="9.4" x2="7.5" y2="4.21"></line><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"></path><polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline><line x1="12" y1="22.08" x2="12" y2="12"></line></svg>
                                        Orders
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="">
                                        <svg class="bi" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                        Users
                                    </a>
                                </li>
                            </ul>
                            <hr class="my-3">
                            <ul class="nav flex-column mb-auto">
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="">
                                        <svg class="bi" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                                        Settings
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center gap-2" href="./logout.php">
                                        <svg class="bi" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-log-out"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        Sign Out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <main class="admdash-cont col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">Dashboard</h1>
                        <div class="btn-toolbar mb-2 mb-2 mb-md-0">
                            <div class="btn-group me-2">
                                <button class="btn btn-sm btn-outline-secondary" type="button">Share</button>
                                <button class="btn btn-sm btn-outline-secondary" type="button">Export</button>
                            </div>
                            <button class="btn btn-sm btn-outline-secondary dropdown dropdown-toggle d-flex align-items-center gap-1" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <svg class="bi" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
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