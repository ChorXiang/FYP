<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
session_start();
require 'PHPMailer/PHPMailer-master/src/Exception.php';
require 'PHPMailer/PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer/PHPMailer-master/src/SMTP.php';

require_once 'conn.php';
                
                if(isset($_POST["sendbtn"]))
                {
                    $_SESSION["input_email"]=$_POST["inputemail"];
                    
                    $sql="SELECT email_address FROM user";
                    $result=mysqli_query($conn, $sql);
                    if(empty($_SESSION["input_email"]))
                    {
                        header("location: forgotpw.php?error=emptyinput");
                        exit();
                    }
                    while($row=mysqli_fetch_assoc($result))
                    {
                        if($row['email_address']==$_SESSION["input_email"])
                        {
                            session_start();

                            $_SESSION["code"]=mt_rand(100000,999999);
                            //send email//
                            $mail=new PHPMailer(true);
                            $mail->isSMTP();
                            $mail->Host='smtp.gmail.com';
                            $mail->SMTPAuth=true;
                            $mail->Username='footmalaysia@gmail.com';
                            $mail->Password='qkklqhlyerottbqt';
                            $mail->SMTPSecure='ssl';
                            $mail->Port=465;
                            $mail->setFrom('footmalaysia@gmail.com');
                            $mail->addAddress($_SESSION["input_email"]);
                            $mail->isHTML(true);
                            $mail->Subject = "Email Verification Code";
                            // Add the verification code to the email body
                            $mail->Body = "<span style='font-size: 16px;'><strong>Hi!</strong><br><br>
                            You are resetting your FOOT account password. Your verification code is: <strong><span style='color: #1CC8F3;'>" . $_SESSION["code"] . "</strong><br><br>
                            FOOT <br><br>
                            <span style='color: grey;'>This is an automated email. Please do not reply to this email.";
                            
                            $mail->send();
                            header("location: verifycode.php?code=send");
                            
                            exit();

                        }
                        
                    }

                    header("location: forgotpw.php?error=emaildoesnotexist");
                    exit();
                    


                }


?>