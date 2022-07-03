<?php
include_once "connection-config.php";
session_start();

$orderId = $_SESSION['id'];
$productId = $_SESSION['id'];

$addquery= "INSERT INTO order_details(orderID,productID,quantity) values ('$orderid', '$productid','1')";

mysqli_query($mysqli, $addquery);
header('location: ../cart.php');

?>