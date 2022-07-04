<?php
session_start();
include_once 'connection-config.php';

$userID = $_SESSION['id'];
$result = mysqli_query($mysqli, "SELECT * FROM favorite_lists WHERE userID=$userID ORDER BY id");

$numofrow = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syntax Shop - Wishlists</title>

    <!--cdn bootstrap 5.1.x-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--cdn bootstrap icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body>
    <?php require 'header.php';?>


    <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Your Wishlists</span>
                <!--<span class="badge bg-primary rounded-pill">3</span>-->
            </h4>
            <table class="table">
                <thead>
                    <th scope="col">List Number</th>
                    <th scope="col">Date Created</th>
                    <th scope="col"></th>
                </thead>
                <?php
                  if($numofrow > 0){
                    while($user_data = mysqli_fetch_array($result)){
                      echo "<tr>";
                      echo "<td>".$user_data['id']."</td>";
                      echo "<td>".$user_data['dateCreated']."</td>";
                      echo "<td><a href='wishlist_details.php?id=$user_data[id]'>View</a>";
                      echo "</tr>"; 
                    }
                  }else{
                    echo "<tr>";
                    echo "<td>No Wishlists</td>";
                  }
                ?>
            </table>
        </div>
    </div>
    <?php require 'footer.php';?>
</body>