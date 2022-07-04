<?php
include_once "../connection-config.php";
session_start();

$faveID = $_GET['faveID'];
$listID = $_GET['listID'];

$delete_favorite_query = "DELETE FROM favorites WHERE productID=$faveID AND listID=$listID";
if($row = mysqli_query($mysqli, $delete_favorite_query)){
    var_dump($row);
    echo "Wishlist item removed<br><a href=\"../wishlists.php\">Return to Wishlists</a>";
}else{
    echo "Error: Item not removed from wishlist<br><a href=\"../wishlists.php\">Return to Wishlists</a>";
}

?>