<?php
  include_once("../../connection-config.php");

   $id = $_GET['id'];
   $result = mysqli_query($mysqli , "DELETE FROM spec_storage WHERE id = $id");

   // get back to storage.php
   header("location:/JAC_WebDevTeamProject/admin/storage/storage.php");
?>