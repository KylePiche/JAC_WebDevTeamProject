<?php
include_once "connection-config.php";
session_start();


$faveID = $_GET['faveID'];

$delete_favorite_query = "DELETE FROM favorites WHERE id=$faveID";
if(mysqli_query($mysqli, $delete_favorite_query)){
    echo "Wishlist item removed<br><a href=\"wishlists.php\">Return to Wishlists</a>";
}else{
    echo "Error: Item not removed from wishlist<br><a href=\"wishlists.php\">Return to Wishlists</a>";
}

?>