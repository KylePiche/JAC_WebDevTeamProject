<?php
  include_once("../../connection-config.php");

   $id = $_GET['id'];
   $result = mysqli_query($mysqli , "DELETE FROM spec_memory WHERE id = $id");

   // get back to memory.php
   header("location:/JAC_WebDevTeamProject/admin/memory/memory.php");
?>