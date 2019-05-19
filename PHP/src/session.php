<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_id'];
   
   $ses_sql = pg_query($db,"select * from employee where employeeid = $user_check ");
   $row = pg_fetch_array($ses_sql, PSQL_ASSOC);
   $login_session = $row['firstname'];
   $breweryid = $row['breweryid'];
   
   if(!isset($_SESSION['login_id'])){
      header("location:login.php");
      die();
   }
?>