<?php
session_start();

include 'conn.php'; 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';
function  send_password_reset($get_name,$get_email,$token)
{
    
    $mail = new PHPMailer(true);
    //$mail->SMTPDebug = 2;                     
    $mail->isSMTP();                                           
    $mail->SMTPAuth   = true;    
      
      $mail->Host       = 'smtp.gmail.com';
      $mail->Username   = 'footmalaysia@gmail.com';                     
      $mail->Password   = 'Foot@2023';        
      
      $mail->SMTPSecure       = "tls";      
      $mail->Port       =   587;                       
  
     
      $mail->setFrom('footmalaysia@gmail.com', $get_name);
      $mail->addAddress($get_email);     

      $mail->isHTML(true);
      $mail->Subject = "Reset Password Notification";

 
      $email_template = "
      <h2>Hello</h2>
      <h3>You are receiving this email because we received a password reset requested for your account.</h3>
      <br/><br/>
      <a href='http://localhost/FYP/reset.phppassword-change.php?token=$token&email=$get_email'> Click Me</a>

      ";

      $mail->Body = $email_template;
      $mail->send();
  
}

if(isset($_POST['password_reset_link']))
{

    $email = mysqli_real_escape_string($conn, $_POST['email_address']);
    $token = md5(rand());

    $check_email = "SELECT full_name, email_address FROM `user` WHERE email_address='$email' LIMIT 1";
    $check_email_run = mysqli_query($conn, $check_email);

    if(mysqli_num_rows($check_email_run) >0)
    {
        $row = mysqli_fetch_array($check_email_run);
        $get_name = $row["full_name"];
        $get_email = $row["email_address"];

        $update_token = "Update user SET verify_token='$token' WHERE email_address='$get_email' LIMIT 1 ";
        $update_token_run = mysqli_query($conn, $update_token);

        if( $update_token_run)
        {
            send_password_reset($get_name,$get_email,$token);
            $_SESSION["status"] = "We e-mailed you a password reset link";
            header("Location: reset.php");
            exit(0);

        }
        else{
            $_SESSION["status"] = "Something went wrong";
            header("Location: reset.php");
            exit(0);
        }

    }
    else
    {
        $_SESSION["status"] = "No Email Found";
        header("Location: reset.php");
        exit(0);
    }

}

if(isset($_POST['password_update']))
{
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $new_password = mysqli_real_escape_string($conn, $_POST['new_password']);
    $confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);
    $token = mysqli_real_escape_string($conn, $_POST['password_token']);

    if(!empty($token))
    {
        if(!empty($email) && !empty($new_password) && !empty($confirm_password) )
      {
        //checking token is valid or not
        $check_token = "SELECT verify_token FROM user WHERE verify_token='$token' LIMIT 1";
        $check_token_run = mysqli_query($conn, $check_token);

        if(mysqli_num_rows($check_token_run)> 0)
        {
            if($new_password == $confirm_password)
            {
                $update_password = "UPDATE user SET userpassword='$new_password' WHERE verify_token='$token' LIMIT 1";
                $update_password_run = mysqli_query($conn, $update_password);

                if ( $update_password_run)
                {
                    $_SESSION["status"] = "New password Successfully Updated.! ";
                    header("Location: login.php");
                    exit(0);

                }
                else
                {
                    $_SESSION["status"] = "Did not update password.Something went wrong";
                    header("Location: password-change.php?token=$token&email=$email");
                    exit(0);

                }


            }
            else
            {
        $_SESSION["status"] = "Password and Confirm Password does not match";
        header("Location: password-change.php?token=$token&email=$email");
        exit(0);
            }

        }
        else
        {
        $_SESSION["status"] = "Invalid Token";
        header("Location: password-change.php?token=$token&email=$email");
        exit(0);
        }
      }
    
    else
    {
        $_SESSION["status"] = "AllFilled are Mandetory";
        header("Location: password-change.php?token=$token&email=$email");
        exit(0);
    }
    
    else
    {
        $_SESSION["status"] = "No Token Avaiable";
        header("Location: password-change.php");
        exit(0);

    }
}
}
?>