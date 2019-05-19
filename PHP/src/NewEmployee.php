<?php
include('session.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = pg_escape_string($db, $_POST['firstname']);
    $middlename = pg_escape_string($db, $_POST['middlename']);
    $lastname = pg_escape_string($db, $_POST['lastname']);
    $birthday = pg_escape_string($db, $_POST['birthday']);
    $position = pg_escape_string($db, $_POST['position']);
    $ssn = pg_escape_string($db, $_POST['SSN']);
    $street = pg_escape_string($db, $_POST['street']);
    $city = pg_escape_string($db, $_POST['city']);
    $state = pg_escape_string($db, $_POST['state']);
    $zipcode = pg_escape_string($db, $_POST['zip']);
    
    pg_query($db, "select * from insertemployee('$firstname', '$middlename', '$lastname', '$birthday','$position', $ssn, '$street', '$city', '$state', $zipcode);");
}

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
    <title>Dionysus Welcome</title>
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
                </ul>
            </nav>
        </div>
        <main class="main">
            <!-- Breadcrumb-->
            </br>
            <div class="container-fluid">
                <div class="animated fadeIn">
                    <div class="card">
                        <div class="align: center; width:50%;">
                            </br>
                            <h1 class="text-center"> New Employee </h1>
                            <form action="" method="post">
                                <input class="form-control" placeholder="First Name" type="text" name="firstname" class="box" />
                                <input class="form-control" placeholder="Middle Name" type="text" name="middlename" />
                                <input class="form-control" placeholder="Last Name" type="text" name="lastname" />
                                <input class="form-control" placeholder="DOB: YYYY-MM_DD" type="text" name="birthday" />
                                <input class="form-control" placeholder="Position" type="text" name="position" />
                                <input class="form-control" placeholder="SSN" type="number" name="SSN" />
                                <input class="form-control" placeholder="Street" type="text" name="street" />
                                <input class="form-control" placeholder="City" type="text" name="city" />
                                <input class="form-control" placeholder="State" type="text" name="state" />
                                <input class="form-control" placeholder="ZipCode" type="number" name="zip" />
                                <input class="form-control" type="submit" value="submit" /><br />
                            </form>
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