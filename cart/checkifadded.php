<?php
function check_if_added_to_cart($productID){
    include_once "connection-config.php";

    $orderID = $_SESSION['id'];
    $result = "SELECT * FROM order_details where productID='$productID' and orderID='$orderID'";
    $test = mysqli_query($mysqli,$result);
    if(mysqli_num_rows($test)>=1){
        return 1;
    }else{
    return 0;
    }
}


?>