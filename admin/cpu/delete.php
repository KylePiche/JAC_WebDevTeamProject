<?php
  include_once("../../connection-config.php");

   $id = $_GET['id'];
   $result = mysqli_query($mysqli , "DELETE FROM spec_cpu WHERE id = $id");

   // get back to cpu.php
   header("location:/JAC_WebDevTeamProject/admin/cpu/cpu.php");
?>