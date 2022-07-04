<?php
session_start();
include_once 'connection-config.php';

$userId = $_SESSION['id'];
$result = "SELECT od2.id, p.name, p.price, od2.quantity
FROM (SELECT od.id, od.productID, o.status, od.quantity
    FROM orders as o
    INNER JOIN order_details as od
      ON o.id = od.orderID
    WHERE o.userID = $userId) as od2
LEFT JOIN products as p
ON od2.productID = p.id";
/*$result = "SELECT od2.id, p.name, p.price, od.quantity
FROM (orders as o, 
products as p)
INNER JOIN order_details as od
  ON o.id = od.orderID
INNER JOIN order_details as od2
  on od2.productID = p.id
WHERE o.userID = $userId";*/

            
$dbresult = mysqli_query($mysqli,$result) or die($result);  
$numofrow = mysqli_num_rows($dbresult);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syntax Shop Cart</title>

    <!--cdn bootstrap 5.1.x-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--cdn bootstrap icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="./assets/css/style.css">
    <style>#cart {color: white; text-decoration: none;}</style>

</head>

<body>
  <?php require 'header.php';?>

  <div class="container">
    <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-primary">Your cart</span>
            </h4>
            <table class="table">
                <thead>
                    <th scope="col">Product</th>
                    <th scope="col">Price of each product</th>
                    <th scope="col">quantity</th>
                </thead>
                <?php
            $sum = 0;
            if($numofrow == 0) {
                echo "";
            } else {
              while($row = mysqli_fetch_array($dbresult)){
          
                $total = $row['price'] * $row['quantity'];
                $sum = $sum + $total;
              }
            }
                $test = mysqli_query($mysqli,$result) or die(mysqli_error($mysqli));
                $numofProduct = mysqli_num_rows($test);
                $counter = 1;
               while($row = mysqli_fetch_array($test)){
                ?>
                <tr>
                    <th><?php echo $row['name']?></th>
                    <th><?php echo $row['price']?></th>
                    <th><?php echo $row['quantity']?></th>
                    <th><a href='cart/cart_remove.php?id=<?php echo $row['id'] ?>'>Remove</a></th>
                </tr>
                <?php $counter=$counter+1;}?>
                <tr>
                    <th></th>
                    <th>Total</th>
                    <th>$ <?php echo $sum;?></th>
                    <th>
                </tr>
            </table>
            <?php
            if($numofrow == 0) {
              echo "cart is empty";
            } else {
            echo '<button class="w-100 btn btn-primary btn-lg" id="cart"><a href="checkout.php">Proceed to Checkout</a></button>';
          }
            ?>
            </br></br>
        </div>
    </div>
  </div>
  <?php require 'footer.php';?>
    
</body>