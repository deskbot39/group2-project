<?php
    require_once './resource/php/conf_session.php';
    $head_desc = htmlspecialchars("Admin Dashboard");
    $head_title = htmlspecialchars("Administrator Dashboard");
    $head_class = "";
    $js_locs = array();
    include('resource/template/html/html_head.html');
    include('./resource/template/admin-dashboard/admin-header.html');
?>
        <div class="container-fluid">
            <div class="row">
                <?php include('./resource/template/admin-dashboard/admin-sidebar.html') ?>
                <main class="admdash-cont col-md-9 ms-sm-auto col-lg-10 px-md-4">
                    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        <h1 class="h2">
                        <?php
                            $get_arr = array("settings","products","orders", "users");
                            if (!isset($_GET['loc'])) {
                                echo 'Dashboard';
                            } else {
                                if (in_array($_GET['loc'], $get_arr)) {
                                    echo ucfirst($_GET['loc']);
                                }
                            }
                        ?>
                        </h1>
                        <?php
                            include('./resource/template/admin-dashboard/admin-toolbar.html');
                        ?>
                    </div>
                    <canvas class="my-4 w-100" id="myChart" width="747" height="315" style="display: block; box-sizing: border-box; height: 394px; width: 934px;"></canvas>
                    <?php
                        include('./resource/template/admin-dashboard/admin-table.html');
                    ?>
                </main>
            </div>
        </div>
<?php
    include('./resource/template/html/html_foot.html');
?>