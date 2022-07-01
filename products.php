<?php
include_once 'connection-config.php';
session_start();
$sql = "SELECT * FROM products";
$sqlResult = mysqli_query($mysqli, $sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our products</title>
    <!--cdn bootstrap 5.1.x-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--cdn bootstrap icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <?php require 'header.php'; ?>
    <div class="col-sm-4">
        <div class="product-image-wrapper">
            <div class="single-products">
                <div class="productinfo text-center">
                    <?php while ($row = mysqli_fetch_array($sqlResult)) { ?>
                        <img src="<?php echo $row['imageUrl']; ?>" alt="Product Image of <?php echo $row['name']; ?>" />
                        <h2><?php echo $row['name']; ?></h2>
                        <p>Book 10</p>
                    <?php } ?>
                </div>
                <div class="product-overlay">
                    <div class="overlay-content">
                        <h2>Price</h2>
                        <p>Book 10</p>
                        <a href="#" class="btn btn-default view-item"><i class="glyphicon glyphicon-eye-open"></i>view Book</a>
                    </div>
                </div>

            </div>
            <div class="choose">
                <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                    <li><a href="#"><i class="fa fa-shopping-cart"></i>Add to cart</a></li>
                </ul>
            </div>
        </div>
    </div>
</body>

</html>