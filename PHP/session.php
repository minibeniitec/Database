<?php
   include('config.php');
   session_start();
   
   $user_check = $_SESSION['login_user'];
   
   $ses_psql = pg_query($db,"SELECT firstname FROM employee WHERE employeeid=$user_check");

   if ($ses_psql) {
      $row = pg_fetch_array($ses_sql,PG_ASSOC);
      
      $login_session = $row['username'];
   } else {
      die();
      header("location:login.php");
   }
   if(!isset($_SESSION['login_user'])){
      die();
      header("location:login.php");
   }
?>