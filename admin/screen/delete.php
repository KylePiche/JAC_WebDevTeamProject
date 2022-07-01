<?php
  include_once("../../connection-config.php");

   $id = $_GET['id'];
   $result = mysqli_query($mysqli , "DELETE FROM spec_screen WHERE id = $id");

   // get back to screen.php
   header("location:/JAC_WebDevTeamProject/admin/screen/screen.php");
?>