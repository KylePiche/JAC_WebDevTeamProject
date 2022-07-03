<?php
include_once 'connection-config.php';
session_start();

$username = mysqli_real_escape_string($mysqli, $_POST['username']);
$email = mysqli_real_escape_string($mysqli, $_POST['email']);
$reg_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";
if (!preg_match($reg_email, $email)) {
    echo "Incorrect email";
}
$password = md5(mysqli_real_escape_string($mysqli, $_POST['password']));

if (strlen($password) < 8) {
    echo "Password should be bigger than 8 characters";
}
$dupcheck = "SELECT id FROM users WHERE email = '$email'";
$result = mysqli_query($mysqli, $dupcheck);
if (mysqli_num_rows($result) > 0) {
    echo "this email is already registered.";
} else {
    $user_reg_query = "INSERT into users(username,email,password)
                      values ('$username','$email','$password')";
    
    mysqli_query($mysqli, $user_reg_query);
    echo "success";
    $id_query = "SELECT id,email FROM users WHERE email='$email' and password='$password'";
    $id_result = mysqli_query($mysqli ,$id_query);
    $myarray = mysqli_fetch_array($id_result);
    $_SESSION['id']=$myarray['id'];
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['creditcard'] = "";
    $_SESSION['address'] = "";
    $_SESSION['city'] = "";
    $_SESSION['postalCode'] = "";

    header('Location: index.html');
}