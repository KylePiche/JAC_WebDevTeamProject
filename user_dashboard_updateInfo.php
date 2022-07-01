<?php
    include_once 'connection-config.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        if(isset($_POST['submit-updateUser'])){

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

                $id = $_POST['id'];
                $user_update_query = "UPDATE users SET userName='$username', creditCard='$creditcard', 
                                `address`='$address', city='$city', postalCode='$postalCode' WHERE id=$id";
                if(mysqli_query($mysqli, $user_update_query)){
                    $_SESSION['id'] = $id;
                    $_SESSION['username'] = $username;
                    //$_SESSION['email'] = $email;
                    $_SESSION['creditcard'] = $creditcard;
                    $_SESSION['address'] = $address;
                    $_SESSION['city'] = $city;
                    $_SESSION['postalCode'] = $postalCode;
                    echo "update successful<br><a href=\"user_dashboard.php\">Return to Dashboard</a>";
                }else{
                    echo "something went wrong<br><a href=\"user_dashboard.php\">Return to Dashboard</a>";
                }
                //$id_query = "SELECT id, userName, email, creditCard, `address`, city, postalCode FROM users WHERE id='$id'";
                //$result = mysqli_query($mysqli ,$id_query);
                //$myarray = mysqli_fetch_array($result);
                // $_SESSION['id'] = $myarray['id'];
                // $_SESSION['username'] = $myarray['userName'];
                // $_SESSION['email'] = $myarray['email'];
                // $_SESSION['creditcard'] = $myarray['creditCard'];
                // $_SESSION['address'] = $myarray['address'];
                // $_SESSION['city'] = $myarray['city'];
                // $_SESSION['postalCode'] = $myarray['postalCode'];

                
                //header('Location:user_dashboard.php');
        }
            
    }
       
?>