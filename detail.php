<?php
include_once 'connection-config.php';
session_start();
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Syntax Shop - Shopping</title>

  <!--cdn bootstrap 5.1.x-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!--cdn bootstrap icon-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

  <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body>
  <?php require 'header.php'; ?>

  <?php
  // get record info first
  include_once("connection-config.php");
  $id = $_GET['id'];

  $result = mysqli_query($mysqli, "SELECT * FROM products WHERE id = $id");

  while ($user_data = mysqli_fetch_array($result)) {
    $name = $user_data['name'];
    $desc = $user_data['desc'];
    $type = $user_data['type'];
    $price = $user_data['price'];
    $cpuid = $user_data['CPUid'];
    $gpuid = $user_data['GPUid'];
    $memoryid = $user_data['memoryID'];
    $storageid = $user_data['storageID'];
    $screenid = $user_data['screenID'];
    $imageurl = $user_data['imageUrl'];

    $cpu = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM `spec_cpu` WHERE id = $cpuid"));
    $gpu = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM `spec_GPU` WHERE id = $gpuid"));
    $memory = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM `spec_memory` WHERE id = $memoryid"));
    $storage = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM `spec_storage` WHERE id = $storageid"));
    $screen = mysqli_fetch_array(mysqli_query($mysqli, "SELECT * FROM `spec_screen` WHERE id = $screenid"));
  }
  ?>
  <div class="bg-light py-3 breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0">Home<span class="mx-2 mb-0">/</span>Product<span class="mx-2 mb-0">/</span><strong class="text-black"><?php echo $name ?></strong></div>
      </div>
    </div>
  </div>

  <!--Products-->
  <section id="section-project" class="py-3 ">
    <div class="container ">

      <hr class="mb-3 text-dark br-dark" />
      <div class="row">
        <div class="col-sm-12 col-lg-6 col-md-6 mb-3">
          <div>
            <img src="<?php echo $imageurl ?>" class="img-fluid card-img-top" alt="<?php echo $name ?>" />
          </div>
        </div>
        <div class="col-sm-12 col-lg-6 col-md-6 mb-3">
          <div>
            <strong>
              <p>Price: $<?php echo $price ?></p>
            </strong>
            <p>CPU: <?php echo $cpu['desc'] ?></p>
            <p>GPU: <?php echo $gpu['desc'] ?></p>
            <p>Memory: <?php echo $memory['desc'] ?></p>
            <p>Storage: <?php echo $storage['desc'] ?></p>
            <p>Screen: <?php echo $screen['desc'] ?></p>
            <p>"Windows 11</p>
            <!-- <form action="cart/cart_add.php?id=<?php echo $_GET['id'] ?>" method="get">
              <button class="custombtn" type="submit">Add to Cart</button>
            </form> -->
            <a href="cart/cart_add.php?id=<?php echo $_GET['id'] ?>" class="btn btn-sm card-btn">Add to Cart</a><br>

            <?php if (isset($_SESSION['listID'])) { ?>
              <!-- <a href="cart/cart_add.php?id=<?php echo $_GET['id'] ?>" class="btn btn-sm card-btn">Add to Wishlist</a> -->
              <form action="wishlist/favorite_add.php?productId=<?php echo $id?>" method="post">
                <label for="wishID">Select a wishlist to add</label>
                <select name="wishID" id="wishID">
                  <?php
                  $favQuery = "SELECT * FROM favorite_lists where userID = {$_SESSION['id']}";
                  $favResult = mysqli_query($mysqli, $favQuery);
                  while ($favList = mysqli_fetch_array($favResult)) {
                    echo "<option value='".$favList['id']."'>".$favList['id']."</option>";
                  }
                  
                  ?>
                  
                </select>
                <button type="submit" class="btn btn-sm card-btn">Add to Wishlist</button>
              </form>
            <?php } ?>
          </div>
        </div>
      </div>
  </section>

  <!--Footer-->
  <?php require 'footer.php'; ?>



  <!--cdn bootstrap 5.1.x-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>

</html>