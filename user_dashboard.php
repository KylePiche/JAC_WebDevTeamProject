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
    <title>Syntax Store - User Dashboard</title>
    <!--cdn bootstrap 5.1.x-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!--cdn bootstrap icon-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">

    <link rel="stylesheet" href="./assets/css/style.css">

</head>

<body>
<?php require 'header.php';?>
    <div class="container">
        <div class="row">
            <div class="col-xs-4 col-xs-offset-4">
                <h1><b>USER DASHBOARD</b></h1>
                <h5>Settings For: <b><?php echo $_SESSION['username'] ?></b></h5>
                <form method="post" action="user_dashboard_updateInfo.php">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" class="form-control" name="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" value="<?php echo $_SESSION['email'] ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" class="form-control" name="username" value="<?php echo $_SESSION['username'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Credit Card</label>
                        <input type="text" class="form-control" name="creditcard" value="<?php echo $_SESSION['creditcard'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" name="address" value="<?php echo $_SESSION['address'] ?>">
                    </div>
                    <div class="form-group">
                        <label>City</label>
                        <input type="text" class="form-control" name="city" value="<?php echo $_SESSION['city'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Postal Code</label>
                        <input type="text" class="form-control" name="postalCode" value="<?php echo $_SESSION['postalCode'] ?>">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $_SESSION['id']; ?>">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="submit-updateUser" value="Update Info">
                    </div>
                    <br>
                </form>
                <form method="post" action="">   
                    <h5>Reset Password</h5>
                    <div class="form-group">
                        <label>Old Password</label>
                        <input type="password" class="form-control" name="oldPass" placeholder="Password(min. 8 characters)" required="true" pattern=".{8,}">
                    </div>
                    <div class="form-group">
                    <label>New Password</label>
                        <input type="password" class="form-control" name="newPass" placeholder="Password(min. 8 characters)" required="true" pattern=".{8,}">
                    </div>
                    <div class="form-group">
                    <label>Confirm New Password</label>
                        <input type="password" class="form-control" name="confirmPass" placeholder="Password(min. 8 characters)" required="true" pattern=".{8,}">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="submit-changePass" value="Change Password">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>