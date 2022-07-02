<?php
    include_once 'connection-config.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        if(isset($_POST['submit-updateUser'])){

            $id = $_POST['id'];

            if(empty($_POST['email'])){
                echo "Enter email";
            }else{
                $reg_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
                $emailCheck = mysqli_real_escape_string($mysqli, $_POST['email']);
                if(!preg_match($reg_email , $emailCheck)){
                    echo "Incorrect email format";
                }else{
                    $email = mysqli_real_escape_string($mysqli, $_POST['email']);
                }    
            }

            if(empty($_POST['username'])){
                echo "Enter username";
            }else{
                $username = mysqli_real_escape_string($mysqli, $_POST['username']);
            }

            if(empty($_POST['creditcard'])){
                $creditcard = "Enter a credit card";
            }else{
                $creditcard = mysqli_real_escape_string($mysqli, $_POST['creditcard']);
            }
            
            if(empty($_POST['address'])){
                $address = "Enter an address";
            }else{
                $address = mysqli_real_escape_string($mysqli, $_POST['address']);
            }

            if(empty($_POST['city'])){
                $city = "Enter a city";
            }else{
                $city = mysqli_real_escape_string($mysqli, $_POST['city']);
            }

            if(empty($_POST['postalCode'])){
                $postalCode = "Enter a postal code";
            }else{
                $postalCode = mysqli_real_escape_string($mysqli, $_POST['postalCode']);
            }

            $dupcheck = "SELECT id FROM users WHERE email = '$email'";
            $result = mysqli_query($mysqli, $dupcheck);
            if (mysqli_num_rows($result) > 0 && $_SESSION['email'] != $_POST['email']) { // checks for duplicates only if email field was updated
                echo "this email is already registered.";
            } else {
                $user_update_query = "UPDATE users SET email='$email', userName='$username', creditCard='$creditcard', 
                                `address`='$address', city='$city', postalCode='$postalCode' WHERE id=$id";
                if(mysqli_query($mysqli, $user_update_query)){
                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;
                    $_SESSION['creditcard'] = $creditcard;
                    $_SESSION['address'] = $address;
                    $_SESSION['city'] = $city;
                    $_SESSION['postalCode'] = $postalCode;
                    echo "update successful<br><a href=\"user_dashboard.php\">Return to Dashboard</a>";
                }else{
                    echo "something went wrong<br><a href=\"user_dashboard.php\">Return to Dashboard</a>";
                }
            }
        }       
    }
       
?>