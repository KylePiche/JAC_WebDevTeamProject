<?php
  include_once("../../connection-config.php");

   $id = $_GET['id'];
   $result = mysqli_query($mysqli , "DELETE FROM products WHERE id = $id");

   // get back to product.php
   header("location:/JAC_WebDevTeamProject/admin/product/product.php");
?>