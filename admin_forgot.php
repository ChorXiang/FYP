<!DOCTYPE html>
<?php require_once("conn.php");
if(isset($_SESSION["admin_id"])) 
{
  header("location:adminlogin.php"); 
}
?>
<html>
<head>
<title> Reset Password</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style type="text/css">

    h2
    {
      font-family: 'FontAwesome', sans-serif;
      font-size: 20pt;
      text-align: center;
    }
    
    div.container 
    {
    margin: auto;
    position: absolute;
    top: 30%;
    left: 50%;
    margin-right: -50%;
    transform: translate(-50%, -50%) 
  }

    body
    {
      text-align: center;
      background-color: #f2f2f2;
      background-color: #f2f2f2;
    }


    fieldset
    {
      border: 1px solid;
      width: 400px;
      margin:auto;
    }

    form 
    {
      background-color: #fff;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
      margin: 50px auto;
      max-width: 400px;
      padding: 30px;
    }

    .submitbtn {
      background-color: #4caf50;
      border: none;
      border-radius: 5px;
      color: #fff;
      cursor: pointer;
      font-size: 16px;
      margin-top: 10px;
      padding: 10px;
      transition: all 0.2s ease-in-out;
    }

    .submitbtn:hover {
      background-color: #3e8e41;
    }

    .input-group {
      display: flex;
      flex-direction: column;
    }

    .input-field {
      background-color: #f2f2f2;
      border: none;
      border-radius: 5px;
      box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.3);
      color: #444;
      font-size: 16px;
      margin-bottom: 10px;
      padding: 10px;
      transition: all 0.2s ease-in-out;
    }

    .input-field:focus {
      box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.5), 0 0 5px rgba(0, 0, 0, 0.3);
      outline: none;
    }

    .msg
    {
      font-family: Arial, Helvetica, sans-serif;
      font-size: 12pt;
      color: red;
    }


  </style>

</head>
<body>
<div class="container">
 	<form action="admin_forgot.php" method="post">
  
 <!-- <img src="logo.png"  alt="ZPay" width="300px" height="100px">  -->
 <br><br>
<h2>Reset Password</h2>

 <?php 
 $message="";

 if(isset($_GET['not'])){
 $not=$_GET['not'];
 $message="User not found.";
} 
// If server error 
if(isset($_GET['server'])){ 
  $message="Server failed to sent the email. Please try again later.";
   }
   //if other issues 
   if(isset($_GET['error'])){ 
    $message="Error(s) occur.";
   }
// If Success | Link sent 
if(isset($_GET['sent'])){
  $message="Link for reset password had been sent to your email. Please check your email."; 
  }
  ?>
  <?php if(!isset($_GET['sent'])){ ?>
    <br><br>
    
    <input type="email" id="admin_email" class="input-field" placeholder="Admin Email" name="admin_email" required>
    <!-- <p><input type="text" name="userinfo" id="userinfo" value="<?php if(!empty($not)){ echo  $not; } ?>" placeholder="Email" class="input" required></p> -->
    <br><br>
  <button type="submit" name="submit" class="submitbtn">Send Link </button>
  <?php } ?>
  <div class="msg"><?php echo $message;?></div>
</form>
  </div>