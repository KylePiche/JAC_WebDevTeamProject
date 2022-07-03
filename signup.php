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
    <title>Sign up to Syntax Store</title>
    <!--cdn bootstrap 5.1.x-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--cdn bootstrap icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body>
    <?php require 'header.php'; ?>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-6 col-xs-offset-3">
            </div>
            <div class="col-md-6 col-xs-6 col-xs-offset-3">
                <h1><b>SIGN UP</b></h1>
                <form method="post" action="signup_script.php">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="username" placeholder="Username" required="true">
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" class="form-control" name="email" placeholder="Email" required="true" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password(min. 8 characters)" required="true" pattern=".{8,}">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-warning" style="width:100px;" value="Sign Up">
                    </div>
                </form>
            </div>
            <div class="col-md-3 col-xs-6 col-xs-offset-3">
            </div>
        </div>
    </div>
</body>

</html>