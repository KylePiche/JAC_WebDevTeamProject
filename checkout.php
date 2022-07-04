<?php
include_once 'connection-config.php';
session_start();
$userId = $_SESSION['id'];
$result = "SELECT od2.id, p.name, p.price, od2.quantity
FROM (SELECT od.id, od.productID, o.status, od.quantity
    FROM orders as o
    INNER JOIN order_details as od
      ON o.id = od.orderID
    WHERE o.userID = $userId
    AND o.status = 'in cart') as od2
LEFT JOIN products as p
ON od2.productID = p.id";

            
$dbresult = mysqli_query($mysqli,$result) or die($result);  
$numofrow = mysqli_num_rows($dbresult);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Syntax Shop Checkout</title>

    <!--cdn bootstrap 5.1.x-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--cdn bootstrap icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="./assets/css/style.css">
    <style>.error {color: #FF0000; font-size: 16px;}</style>
    
</head>

<body>
<?php 
                        if (isset($_POST["submit"])) {
                          if (empty($nameErr) && empty($emailErr) && empty($addressErr) && empty($countryErr) && empty($stateErr) && empty($zipErr)
                          && empty($cardErr) && empty($ccNameErr) && empty($ccNumErr) && empty($ccExpErr) && empty($ccCvvErr)) {
                            $userId = $_SESSION['id'];
                            $update = "UPDATE orders SET `status` = 'purchased'
                            WHERE userID = $userId";

                            mysqli_query($mysqli, $update);
                            header('Location: checkout_complete.php');

                          } else {
                            echo("<span class='error'>You must fill out the form</span></br></br>");
                          }
                        }
                        ?>
    <?php require 'header.php';?>
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <h2>Checkout form</h2>
                <p class="lead">
                    <!-- INSERT SMALL PARAGRAPH HERE-->
                </p>
            </div>

            <div class="row g-5">
                <div class="col-md-5 col-lg-4 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-primary">Your cart</span>
                        <!--<span class="badge bg-primary rounded-pill">3</span>-->
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
                        </tr>
                        <?php $counter=$counter+1;}?>
                        <tr>
                            <th></th>
                            <th>Total</th>
                            <th>$ <?php echo $sum;?></th>
                            <th>
                        </tr>
                    </table>
                <?php require 'checkout_validation.php'?>
                    <form class="card p-2">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Promo code">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-7 col-lg-8">
                    <h4 class="mb-3">Billing address</h4>
                    <form method="post">
                        <div class="row g-3">
                            <div class="col-12">
                                <label for="firstName" class="form-label">Full Name</label>
                                <span class="error">* <?php echo $nameErr;?></span>
                                <input type="text" class="form-control" name="name" placeholder="" value="" <?php echo $name;?>>
                            </div>

                            <div class="col-12">
                                <label for="email" class="form-label">Email</label>
                                <span class="error">* <?php echo $emailErr;?></span>
                                <input type="email" class="form-control" name="email" placeholder="you@example.com">
                            </div>

                            <div class="col-12">
                                <label for="address" class="form-label">Address</label>
                                <span class="error">* <?php echo $addressErr;?></span>
                                <input type="text" class="form-control" name="address" placeholder="1234 Main St">
                            </div>

                            <div class="col-12">
                                <label for="address2" class="form-label">Address 2 <span
                                        class="text-muted">(Optional)</span></label>
                                <input type="text" class="form-control" name="address2" placeholder="Apartment or suite">
                            </div>

                            <div class="col-md-5">
                                <label for="country" class="form-label">Country</label>
                                <span class="error">* <?php echo $countryErr;?></span>
                                <select class="form-select" name="country">
                                    <option disabled selected value="">Choose...</option>
                                    <option>Canada</option>
                                    <option>United States</option>
                                </select>
                            </div>

                            <div class="col-md-4">
                                <label for="state" class="form-label">State/Province</label>
                                <span class="error">* <?php echo $stateErr;?></span>
                                <select class="form-select" name="state">
                                    <option disabled selected value="">Choose...</option>
                                    <option>Quebec</option>
                                    <option>Ontario</option>
                                    <option>Alberta</option>
                                    <option>British Columbia</option>
                                    <option>Nova Scotia</option>
                                    <option>New York</option>
                                    <option>California</option>
                                    <option>Florida</option>
                                    <option>Texas</option>
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="zip" class="form-label">Postal Code/ZIP</label>
                                <span class="error">* <?php echo $zipErr;?></span>
                                <input type="text" class="form-control" name="zip" placeholder="">
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="same-address">
                            <label class="form-check-label" for="same-address">Shipping address is the same as my
                                billing address</label>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="save-info">
                            <label class="form-check-label" for="save-info">Save this information for next time</label>
                        </div>

                        <hr class="my-4">

                        <h4 class="mb-3">Payment<span class="error">* <?php echo $cardErr;?></span></h4>
                        
                        <div class="my-3">
                        
                            <div class="form-check">
                                <input type="radio" name="card" class="form-check-input" <?php if (isset($card) && $card=="Credit") echo "checked";?> value="Credit">
                                <label class="form-check-label" for="credit">Credit card</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="card" class="form-check-input" <?php if (isset($card) && $card=="Paypal") echo "checked";?> value="Paypal">
                                <label class="form-check-label" for="paypal">PayPal</label>
                            </div>
                        </div>

                        <div class="row gy-3">
                            <div class="col-md-6">
                                <label for="cc-name" class="form-label">Name on card</label>
                                <span class="error">* <?php echo $ccNameErr;?></span>
                                <input type="text" class="form-control" name="ccName" placeholder="">
                                <small class="text-muted">Full name as displayed on card</small>
                            </div>

                            <div class="col-md-6">
                                <label for="cc-number" class="form-label">Credit card number</label>
                                <span class="error">* <?php echo $ccNumErr;?></span>
                                <input type="text" class="form-control" name="ccNum" placeholder="">
                            </div>

                            <div class="col-md-3">
                                <label for="cc-expiration" class="form-label">Expiration</label>
                                <span class="error">* <?php echo $ccExpErr;?></span>
                                <input type="text" class="form-control" name="ccExp" placeholder="">
                            </div>

                            <div class="col-md-3">
                                <label for="cc-cvv" class="form-label">CVV</label>
                                <span class="error">* <?php echo $ccCvvErr;?></span>
                                <input type="text" class="form-control" name="ccCvv" placeholder="">
                            </div>
                        </div>

                        <hr class="my-4">

                        <input class="w-100 btn btn-primary btn-lg" type="submit" name="submit" value="Checkout"></input>
                        </br></br>
                    </form>
                        
                </div>
            </div>
        </main>

        <?php require 'footer.php';?>
    </div>


</body>

</html>