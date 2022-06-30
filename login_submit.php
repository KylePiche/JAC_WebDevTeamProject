<?php
 include_once "connection-config.php";
 session_start();

 $email = mysqli_real_escape_string($mysqli,$_POST['email']);
 $reg_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
 if(!preg_match($reg_email , $email)){
     echo "Incorrect email";
 }

 $password =md5(mysqli_real_escape_string($mysqli,$_POST['password']));
if(strlen($password)<8){
    echo "password should be bigger than 8 char";
}

$user_query = "SELECT id,email FROM users WHERE email='$email' and password='$password'";
$result = mysqli_query($mysqli ,$user_query );

if(mysqli_num_rows($result)==0){
    echo "wrong email or pass";
    header('Location: login.php');
}else{
    $myarray = mysqli_fetch_array($result);
    $_SESSION['email']=$email;
    $_SESSION['id']=$myarray['id'];
    header('Location: index.php');
}


?>