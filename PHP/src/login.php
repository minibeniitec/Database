<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myemployeeid = pg_escape_string($db,$_POST['employeeid']);
      $mypassword = pg_escape_string($db,$_POST['password']); 
      
      $psql = "SELECT employeeid FROM employee WHERE employeeid = $myemployeeid and passwords = '$mypassword'";
      $result = pg_query($db,$psql);
      $row = pg_fetch_array($result);
      $active = $row['active'];

      $count = pg_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) {
         //session_register("myusername");
         $_SESSION['login_id'] = $myemployeeid;
         
         header("location: dionysusbrewingco.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html lang = "en">  
   <head>
      <title>Login Page</title>           
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
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>      
   </head>    
   <body background="IMG/hops.jpg">
      <div style = "width:100%; ">
         <br></br>
         <h1 align="center" >Dionysus Brewing Company</h1>
         <h2 align="center">Manager Sign-In</h1>
      </div>
      </br></br></br></br>
      <div align = "center" >
         <div style = "opacity: 0.8; width:300px; border: solid 1px #333333; border-color:#000000; background-color:#333333;    " align = "left">
            <div style = "background-color:#333333; border: solid 1px; border-color:#000000; color:#FFFFFF; padding:5px;">Login<b></b></div>				
            <div style = "margin:30px;">              
               <form action = "" method = "post">
                  <label>EmployeeID :</label><input type = "number" name = "employeeid" class = "box"/><br /><br />
                  <label>Password :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>              
               <div style = "font-size:11px; color:#000000; margin-top:10px"><?php echo $error; ?></div>
            </div>
         </div>
      </div>   
   </body>
</html>