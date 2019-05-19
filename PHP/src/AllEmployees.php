<?php
include('session.php');

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
  <title>Dionysus Employees</title>
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
          <a href="Employees.php">
            <li class="nav-title">Employees</li>
          </a>
          <li class="nav-item">
            <a class="nav-link" href="Managers.php">
              <i class="nav-icon icon-drop"></i> Managers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Brewers.php">
              <i class="nav-icon icon-drop"></i> Brewers</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="SalesTeam.php">
              <i class="nav-icon icon-pencil"></i> Sales Team</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="AllEmployees.php">
              <i class="nav-icon icon-pencil"></i> All</a>
          </li>
        </ul>
      </nav>
    </div>
    <main class="main">
         <!-- Breadcrumb-->
         </br>
         <div class="container-fluid">
            <div class="animated fadeIn">
               <div class"row">
                  <div class="card">
                     <img src="IMG/BarleyField2.jpg" style="width:100%;">
                  </div>
               </div>
               <?php for ($i = 0; $i < sizeof($array); $i++): ?>
               <div class="row">
                  <div class="card">
                     <h1><?php echo $array[$i][name]; ?></h1>
                  </div>
               </div>
               
                  <!-- /.col-->
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