<?php
 include_once "connection-config.php";
 session_start();

 $email = mysqli_real_escape_string($mysqli,$_POST['email']);
 $reg_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
 if(!preg_match($reg_email , $email)){
    $_SESSION['login_err_msg'] = "Incorrect email";
    header('Location: login.php');
 }

 $password =md5(mysqli_real_escape_string($mysqli,$_POST['password']));
if(strlen($password)<8){
    $_SESSION['login_err_msg'] = "Password must be longer than 8 characters.";
    header('Location: login.php');
}

$user_query = "SELECT id,email,userName,creditCard,address,city,postalCode FROM users WHERE email='$email' and password='$password'";
$result = mysqli_query($mysqli ,$user_query );

if(mysqli_num_rows($result)==0){
    $_SESSION['login_err_msg'] = "Invalid email or password.";
    header('Location: login.php');
}else{
    $myarray = mysqli_fetch_array($result);
    $_SESSION['email']=$email;
    $_SESSION['id']=$myarray['id'];
    $_SESSION['username']=$myarray['userName'];
    $_SESSION['creditcard']=$myarray['creditCard'];
    $_SESSION['address']=$myarray['address'];
    $_SESSION['city']=$myarray['city'];
    $_SESSION['postalCode']=$myarray['postalCode'];
    header('Location: index.php');
}


?>