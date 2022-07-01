<?php
include_once 'connection-config.php';
session_start();
$sql = "SELECT * FROM products";
$sqlResult = mysqli_query($mysqli, $sql);
$count = 1;
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
    <div class="container mt-5">
        <div class="card-group">
            <?php while ($row = mysqli_fetch_array($sqlResult)) { ?>
                <div class="card m-2" style="width: 18rem;">
                    <img class="card-img-top" src="<?php echo $row['imageUrl'] ?>" alt="Promo image of <?php echo $row['name'] ?>">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['name'] ?></h5>
                        <p class="card-text"><?php echo $row['desc'] ?></p>
                        <a href="#" class="btn btn-primary">Buy</a>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

    <!-- </div> -->
</body>

</html>