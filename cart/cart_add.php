<?php
include_once "../connection-config.php";
session_start();
//Check if page was accessed with GET
if(!$_GET){
    echo "no GET detected, sending back to shop";
    header('location:../shop.php');
}else{$productId = $_GET['id'];}
echo $productId;
// If cart is not assigned in cartID
if(!isset($_SESSION['cartID'])){
    echo 'No cart is found, checking database <br>';
    $cartquery = "SELECT MAX(id) AS cartID, status AS cartStatus FROM orders WHERE userID = {$_SESSION['id']} AND status = 1 LIMIT 0,1";
    $cartResult = mysqli_query($mysqli ,$cartquery);
    $myarray = mysqli_fetch_array($cartResult);
    var_dump($myarray);
    //Check if the result is null, if so, create a new cart in DB
    if($myarray['cartID'] == NULL){
        echo 'No cart detected, creating new one';
        $addCartQuery= "INSERT INTO orders(userID,status) values ('{$_SESSION['id']}', 1)";
        $addCartResult = mysqli_query($mysqli ,$addCartQuery);
        $myarray = mysqli_fetch_array($cartResult);
        $_SESSION['cartID'] = $myarray['cartID'];
        var_dump($myarray);
    }else{
        echo 'Cart found in database. Assigning <br>';
        $_SESSION['cartID'] = $myarray['cartID'];
    }
    // var_dump($cartquery);
    // echo json_encode($cartResult);
    // echo '<br>';
    // var_dump($cartResult);
}
echo "Cart id from session is " . $_SESSION['cartID'];
$orderId = $_SESSION['cartID'];
echo $orderId;
$addquery= "INSERT INTO order_details(orderID,productID,quantity) values ('$orderId', '$productId','1')";
echo $addquery;

$addResult = mysqli_query($mysqli, $addquery);
var_dump($addResult);
header('location: ../cart.php');

?>