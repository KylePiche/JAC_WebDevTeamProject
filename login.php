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
    <title>Login</title>
    <!--cdn bootstrap 5.1.x-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--cdn bootstrap icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <!-- <link rel="stylesheet" href="./assets/css/style.css"> -->
</head>

<body>
    <?php require 'header.php'; ?>
    <div class="container-md">
        <div class="d-flex justify-content-center">
            <h3>LOGIN</h3>
        </div>
        <div class="row ">


            <div class="panel-body text-center mb-3 tab-content">
                <p>Login to make a purchase.</p>
                <form method="post" action="login_submit.php">
                    <div class="form-group col-md-3 d-flex justify-content-center">
                        <input type="email" class="form-control col-xs-3" name="email" placeholder="Email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$">
                    </div>
                    <div class="form-group col-md-3 d-flex justify-content-center">
                        <input type="password" class="form-control col-md-3" name="password" placeholder="Password(min. 8 characters)" pattern=".{8,}">
                    </div>
                    <?php if (isset($_SESSION['login_err_msg'])) { ?>
                        <span><?= $_SESSION['login_err_msg'] ?></span>
                    <?php } ?>
                    <div class="form-group mt-5">
                        <input type="submit" value="Login" class="btn btn-primary">
                    </div>
                </form>
            </div>
            <div class="panel-footer">Don't have an account yet? <a href="signup.php">Register</a></div>

        </div>
    </div>

</body>

</html>