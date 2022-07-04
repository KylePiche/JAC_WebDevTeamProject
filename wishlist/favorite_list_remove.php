<?php
include_once "../connection-config.php";
session_start();


$listID = $_GET['listID'];

$delete_favorite_query = "DELETE FROM favorite_lists WHERE id=$listID";
if(mysqli_query($mysqli, $delete_favorite_query)){
    echo "Wishlist List removed<br><a href=\"../wishlists.php\">Return to Wishlists</a>";
}else{
    echo "Error: List not removed from wishlist<br><a href=\"../wishlists.php\">Return to Wishlists</a>";
}

?>