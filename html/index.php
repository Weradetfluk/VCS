<?php
   $servername = "db";
   $username = "team2";
   $password = "team2@2021";

   $dbhandle = mysqli_connect($servername, $username, $password);
   $selected = mysqli_select_db($dbhandle, "vcs_db");
   
   echo "Connected database server<br>";
   echo "Selected database";
?>