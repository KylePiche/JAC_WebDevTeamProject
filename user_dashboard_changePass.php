<?php
    include_once 'connection-config.php';
    session_start();

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){

        if(isset($_POST['submit-changePass'])){

            $id = $_POST['id'];

            // Old Password empty & length check
            if(empty($_POST['oldPass'])){
                echo "Enter current password";
            }else{
                $oldPassCheck = $_POST['oldPass'];
                if(strlen($oldPassCheck)<8){
                    echo "password should be bigger than 8 char";
                }else{
                    $oldPass =md5(mysqli_real_escape_string($mysqli,$oldPassCheck)); 
                }
            }

            // New Password empty & length check
            if(empty($_POST['newPass'])){
                echo "Enter a new password";
            }else{
                $newPassCheck = $_POST['newPass'];
                if(strlen($newPassCheck)<8){
                    echo "password should be bigger than 8 char";
                }else{
                    $newPass =md5(mysqli_real_escape_string($mysqli,$newPassCheck)); 
                }
            }

            // Confirm Password empty & length check
            if(empty($_POST['confirmPass'])){
                echo "Confirm new password";
            }else{
                $confirmPassCheck = $_POST['confirmPass'];
                if(strlen($confirmPassCheck)<8){
                    echo "password should be bigger than 8 char";
                }else{
                    $confirmPass =md5(mysqli_real_escape_string($mysqli,$confirmPassCheck)); 
                }
            }

            
            $pass_query = "SELECT id FROM users WHERE `password`='$oldPass' AND id=$id";
            $result = mysqli_query($mysqli ,$pass_query );
            if(mysqli_num_rows($result)==0){ // check if user exists
                echo "wrong password";
            }else{
                if($oldPass==$newPass){ // check if new password is the same as old password
                    echo "must select new password";
                }else{
                    if($newPass!=$confirmPass){ // check that new password and confirm password match
                        echo "New password and confirmation password must match";
                    }else{
                        $user_password_query = "UPDATE users SET `password`='$newPass' WHERE id=$id";
                        if(mysqli_query($mysqli, $user_password_query)){
                            echo "password changed<br><a href=\"user_dashboard.php\">Return to Dashboard</a>";
                        }else{
                            echo "something went wrong<br><a href=\"user_dashboard.php\">Return to Dashboard</a>";
                        }
                    }
                }
            }

                
                
        }       
    }
       
?>