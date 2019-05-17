<?php
   //include('session.php');

   $dataPoints = array(
      array("x"=> 10, "y"=> 41),
      array("x"=> 20, "y"=> 35, "indexLabel"=> "Lowest"),
      array("x"=> 30, "y"=> 50),
      array("x"=> 40, "y"=> 45),
      array("x"=> 50, "y"=> 52),
      array("x"=> 60, "y"=> 68),
      array("x"=> 70, "y"=> 38),
      array("x"=> 80, "y"=> 71, "indexLabel"=> "Highest"),
      array("x"=> 90, "y"=> 52),
      array("x"=> 100, "y"=> 60),
      array("x"=> 110, "y"=> 36),
      array("x"=> 120, "y"=> 49),
      array("x"=> 130, "y"=> 41)
   );
?>

<style type = "text/css">
         @import url('https://fonts.googleapis.com/css?family=Cinzel&display=swap');
         h1{
            text-align: center;
            color: #012372;
            font-family: 'Cinzel', serif;
         }
         h2{
            text-align: center;
            color: #017572;
            font-family: 'Cinzel', serif;
         }
         body {
            height: 1000px;
         }
      </style>  
<html>
   <head>
      <title>Welcome</title>
      <title>Bootstrap Example</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
   </head>
   <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">DionysusBrewingCo</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="#">Employees</a></li>
      <li><a href="#">Sales</a></li>
      <li><a href="#">Orders</a></li>
   </ul>
   <ul class="nav navbar-nav navbar-right">
      <li><a align="right" href="#">Logout</a></li>
    </ul>
  </div>
</nav>
</br>
</br>
   <body>
      <h1>Welcome <?php echo $login_session; ?></h1> 
      <script>
         window.onload = function () {
         var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            exportEnabled: true,
            theme: "light1", // "light1", "light2", "dark1", "dark2"
            title:{
               text: "Simple Column Chart with Index Labels"
            },
            data: [{
               type: "column", //change type to bar, line, area, pie, etc
               //indexLabel: "{y}", //Shows y value on all Data Points
               indexLabelFontColor: "#5A5757",
               indexLabelPlacement: "outside",   
               dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }]
         });
         chart.render();
         }
      </script>
      <div id="chartContainer" style="height: 370px; width: 100%;"></div>
      <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
   </body>
   
</html>