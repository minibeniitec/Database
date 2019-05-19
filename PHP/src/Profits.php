<?php
include('session.php');
$days = 1;
$date;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = pg_escape_string($db, $_POST['range']);
    $days = pg_fetch_all(pg_query($db, "Select * from getdays('$date');"));
    $days = $days[0]['getdays'];
}

$array = pg_fetch_all(pg_query($db, "Select * from getprofit($days);"));
$profitmax = pg_fetch_all(pg_query($db, "Select * from getmaxprofit($days);"));
?>


<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v2.1.12
* @link https://coreui.io
* Copyright (c) 2018 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->

<html lang="en">

<head>
    <base href="./">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
    <meta name="author" content="Łukasz Holeczek">
    <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
    <title>Dionysus Sales</title>
    <!-- Icons-->
    <link href="node_modules/@coreui/icons/css/coreui-icons.min.css" rel="stylesheet">
    <link href="node_modules/flag-icon-css/css/flag-icon.min.css" rel="stylesheet">
    <link href="node_modules/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="node_modules/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
    <link href="IMG/favicon.ico" rel="stylesheet">
    <!-- Main styles for this application-->
    <link href="css/style.css" rel="stylesheet">
    <link href="vendors/pace-progress/css/pace.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Julius+Sans+One&display=swap" rel="stylesheet">
    <!-- Global site tag (gtag.js) - Google Analytics-->
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        // Shared ID
        gtag('config', 'UA-118965717-3');
        // Bootstrap ID
        gtag('config', 'UA-118965717-5');
    </script>
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <header class="app-header navbar">
        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item px-3">
                <a href="dionysusbrewingco.php"><img src="IMG/favicon.ico" height="42" width="42"></a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" href="Employees.php">Employees</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" href="Sales.php">Sales</a>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" href="Inventory.php">Inventory</a>
            </li>
        </ul>
        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item px-3">
                <h1 style="font-family:'Julius Sans One', sans-serif; align:center; font-size:23px;">Dionysus Brewing Company</h1>
            </li>
        </ul>
        <ul class="nav navbar-nav d-md-down-none">
            <li class="nav-item px-3">
                <?php echo "Welcome, $login_session!"; ?>
            </li>
            <li class="nav-item px-3">
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </header>
    <div class="app-body">
        <div class="sidebar">
            <nav class="sidebar-nav">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="dionysusbrewingco.php">
                            <i class="nav-icon icon-speedometer"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-title">Quick Options</li>
                    <li class="nav-item">
                        <a class="nav-link" href="NewEmployee.php">
                            <i class="nav-icon icon-drop"></i> New Employee</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="NewOrder.php">
                            <i class="nav-icon icon-pencil"></i> New Order</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ReportGenerator.php">
                            <i class="nav-icon icon-drop"></i> Quick Report</a>
                    </li>
                    <a href="Sales.php">
                        <li class="nav-title">Sales</li>
                    </a>
                    <li class="nav-item">
                        <a class="nav-link" href="Sales.php">
                            <i class="nav-icon icon-drop"></i> Today</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Week.php">
                            <i class="nav-icon icon-drop"></i> This Week</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Month.php">
                            <i class="nav-icon icon-pencil"></i> This Month</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Year.php">
                            <i class="nav-icon icon-drop"></i> This Year</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Custom.php">
                            <i class="nav-icon icon-drop"></i> Custom</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="Profits.php">
                            <i class="nav-icon icon-drop"></i> Profits</a>
                    </li>
                </ul>
            </nav>
        </div>
        <main class="main">
            <!-- Breadcrumb-->
            <form action="" method="post">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Date Range: </li>
                    <li class="breadcrumb-item"><input type="text" name="range" placeholder="yyyy-mm-dd" class="box" /></li>
                    <li class="breadcrumb-item"><input type="Submit" value="Submit" />
                    <li class="breadcrumb-menu d-md-down-none">Date Range: <?php echo "$date - Today"; ?></li>
                </ol>
            </form>
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="row">
                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-white bg-primary">
                                <div class="card-body pb-0">
                                    <div class="btn-group float-right">
                                    </div>
                                    <div class="text-value"><?php echo "$totalCustomers"; ?></div>
                                    <div>Total Customers</div>
                                </div>
                                <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                                    <canvas class="chart" id="card-chart1" height="70"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-->
                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-white bg-info">
                                <div class="card-body pb-0">
                                    <button class="btn btn-transparent p-0 float-right" type="button">
                                        <i class="icon-location-pin"></i>
                                    </button>
                                    <div class="text-value"><?php echo "$newCustomers"; ?></div>
                                    <div>New Customers</div>
                                </div>
                                <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                                    <canvas class="chart" id="card-chart2" height="70"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-->
                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-white bg-warning">
                                <div class="card-body pb-0">
                                    <div class="text-value"><?php echo "$retCustomers"; ?></div>
                                    <div>Returning Customers</div>
                                </div>
                                <div class="chart-wrapper mt-3" style="height:70px;">
                                    <canvas class="chart" id="card-chart3" height="70"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-->
                        <div class="col-sm-6 col-lg-3">
                            <div class="card text-white bg-danger">
                                <div class="card-body pb-0">
                                    <div class="text-value"><?php echo "$drinksSold"; ?></div>
                                    <div>Drinks Sold</div>
                                </div>
                                <div class="chart-wrapper mt-3 mx-3" style="height:70px;">
                                    <canvas class="chart" id="card-chart4" height="70"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- /.col-->
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <!-- /.row-->
                            <?php
                            for ($i = 0; $i < sizeof($array); $i++) {
                                echo "<li>";
                                echo $array[$i]['bname'];
                                echo " Profits:  \$";
                                echo ($array[$i]['bprice'] * $array[$i]['quantity']);
                                echo "</li>";
                            } ?>
                        </div>
                    </div>
                    <!-- /.row-->
                    <div class="card-group mb-4">
                        <div class="card">
                            </br>
                            <div class="text-value text-center">Profit Range's</div>
                            <h1 class="text-center">Top Beers</h1>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="h1 text-muted text-right mb-4">
                                    <i class="icon-people"></i>
                                </div>
                                <div class="text-value">1</div>
                                <small class="text-muted text-uppercase font-weight-bold">
                                    <?php if (sizeof($profitmax) > 0) {
                                        $tmp = $profitmax[0]['beername'];
                                        echo "$tmp";
                                    } ?>
                                    <div class="text-value text-center">
                                        <?php if (sizeof($profitmax) > 0) {
                                            echo "$";
                                            echo $profitmax[0]['profit'];
                                        } ?>
                                    </div>
                                </small>
                                <div class="progress progress-xs mt-3 mb-0">
                                    <div class="progress-bar bg-info" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="h1 text-muted text-right mb-4">
                                    <i class="icon-user-follow"></i>
                                </div>
                                <div class="text-value">2</div>
                                <small class="text-muted text-uppercase font-weight-bold">
                                    <?php if (sizeof($profitmax) > 1) {
                                        $tmp = $profitmax[1]['beername'];
                                        echo "$tmp";
                                    } ?>
                                    <div class="text-value text-center">
                                        <?php if (sizeof($profitmax) > 1) {
                                            echo "$";
                                            echo $profitmax[1]['profit'];
                                        } ?>
                                    </div>
                                </small>
                                <div class="progress progress-xs mt-3 mb-0">
                                    <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="h1 text-muted text-right mb-4">
                                    <i class="icon-basket-loaded"></i>
                                </div>
                                <div class="text-value">3</div>
                                <small class="text-muted text-uppercase font-weight-bold">
                                    <?php if (sizeof($profitmax) > 2) {
                                        $tmp = $profitmax[2]['beername'];
                                        echo "$tmp";
                                    } ?>
                                    <div class="text-value text-center">
                                        <?php if (sizeof($profitmax) > 2) {
                                            echo "$";
                                            echo $profitmax[2]['profit'];
                                        } ?>
                                    </div>
                                </small>
                                <div class="progress progress-xs mt-3 mb-0">
                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="h1 text-muted text-right mb-4">
                                    <i class="icon-pie-chart"></i>
                                </div>
                                <div class="text-value">4</div>
                                <small class="text-muted text-uppercase font-weight-bold">
                                    <?php if (sizeof($profitmax) > 3) {
                                        $tmp = $profitmax[3]['beername'];
                                        echo "$tmp";
                                    } ?>
                                    <div class="text-value text-center">
                                        <?php if (sizeof($profitmax) > 3) {
                                            echo "$";
                                            echo $profitmax[3]['profit'];
                                        } ?>
                                    </div>
                                </small>
                                <div class="progress progress-xs mt-3 mb-0">
                                    <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="h1 text-muted text-right mb-4">
                                    <i class="icon-speedometer"></i>
                                </div>
                                <div class="text-value">5</div>
                                <small class="text-muted text-uppercase font-weight-bold">
                                    <?php if (sizeof($profitmax) > 4) {
                                        $tmp = $profitmax[4]['beername'];
                                        echo "$tmp";
                                    } ?>
                                    <div class="text-value text-center">
                                        <?php if (sizeof($profitmax) > 4) {
                                            echo "$";
                                            echo $profitmax[4]['profit'];
                                        } ?>
                                    </div>
                                </small>
                                <div class="progress progress-xs mt-3 mb-0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <footer class="app-footer">
        <div>
            <a href="https://www.dionysusbrewing.com">The Real Dionysus Brewing</a>
            <span>&copy; 2019</span>
        </div>
    </footer>
    <!-- CoreUI and necessary plugins-->
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/pace-progress/pace.min.js"></script>
    <script src="node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
    <script src="node_modules/@coreui/coreui/dist/js/coreui.min.js"></script>
</body>


<!-- CoreUI and necessary plugins-->
<script src="node_modules/jquery/dist/jquery.min.js"></script>
<script src="node_modules/popper.js/dist/umd/popper.min.js"></script>
<script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="node_modules/pace-progress/pace.min.js"></script>
<script src="node_modules/perfect-scrollbar/dist/perfect-scrollbar.min.js"></script>
<script src="node_modules/@coreui/coreui/dist/js/coreui.min.js"></script>
<script src="node_modules/chart.js/dist/Chart.min.js"></script>
<script src="node_modules/@coreui/coreui-plugin-chartjs-custom-tooltips/dist/js/custom-tooltips.min.js"></script>
<script src="js/widgets.js"></script>
</body>

</html>