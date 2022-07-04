<?php 

include_once "connection-config.php";
session_start();

$userID = $_SESSION['id'];

$list_create_query = "INSERT INTO favorite_lists (userID) VALUES ('$userID')";

if(mysqli_query($mysqli, $list_create_query)){
    $id_query = "SELECT id as listID, dateCreated FROM favorite_lists WHERE userID=$userID HAVING MAX(dateCreated) LIMIT 0,1";
    $result = mysqli_query($mysqli ,$id_query);
    $myarray = mysqli_fetch_array($result);
    $_SESSION['listID'] = $myarray['listID'];
    $_SESSION['dateCreated'] = $myarray['dateCreated'];
    echo "Wishlist created<br><a href=\"wishlists.php\">Return to Wishlists</a>";
}else{
    echo "Error: Wishlist not created<br><a href=\"wishlists.php\">Return to Wishlists</a>";
}

?>