<?php
  include_once("../../connection-config.php");

   $id = $_GET['id'];
   $result = mysqli_query($mysqli , "DELETE FROM spec_gpu WHERE id = $id");

   // get back to gpu.php
   header("location:/JAC_WebDevTeamProject/admin/gpu/gpu.php");
?>