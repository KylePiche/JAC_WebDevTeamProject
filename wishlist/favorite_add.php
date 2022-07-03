<?php
include_once "connection-config.php";
session_start();

$userID = $_SESSION['id'];
$listID = $_SESSION['listID']; // Not sure where the IDs will come from: saved in SESSION or set by POST
//$listID = $_POST['listID'];
$productID = $_SESSION['productID']; // Not sure where the IDs will come from: saved in SESSION or set by POST
//$productID = $_POST['productID'];

$dupcheck = "SELECT id as faveID FROM favorites WHERE listID=$listID AND productID=$productID";
$result = mysqli_query($mysqli, $dupcheck);
if (mysqli_num_rows($result) > 0) {
    echo "this item is already in this wishlist";
} else {
    $add_favorite_query= "INSERT INTO favorites (listID,productID) VALUES ($listID, $productID)";

    if(mysqli_query($mysqli, $add_favorite_query)){
        $id_query = "SELECT id as faveID, dateAdded FROM favorites WHERE listID=$listID AND productID=$productID";
        $result = mysqli_query($mysqli ,$id_query);
        $myarray = mysqli_fetch_array($result);
        $_SESSION['faveID'] = $myarray['faveID'];
        $_SESSION['dateAdded'] = $myarray['dateAdded'];
        //$_SESSION['listID'] = $listID; //if POST is used above
        //$_SESSION['productID'] = $productID; //if POST is used above
        echo "Wishlist item added<br><a href=\"wishlists.php\">Return to Wishlists</a>";
    }else{
        echo "Error: Item not added to wishlist<br><a href=\"wishlists.php\">Return to Wishlists</a>";
    }
}
?>