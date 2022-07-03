<?php
  include_once("../../connection-config.php");

   $id = $_GET['id'];
   $result = mysqli_query($mysqli , "DELETE FROM users WHERE id = $id");

   // get back to user.php
   header("location:/JAC_WebDevTeamProject/admin/user/user.php");
?>