<?php
session_start();
    include_once "../connection-config.php";
    $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    $parts = parse_url($url);
parse_str($parts['query'], $query);
$productId = $query['id'];

    $result = "DELETE FROM order_details where id=$productId";

    mysqli_query($mysqli, $result);
    header('Location: ../cart.php');
?>