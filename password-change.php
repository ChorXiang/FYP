<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>


<style>
    body {
      background-color: #f2f2f2;
      font-family: Arial, sans-serif;
    }
    .card {
      margin: 0 auto;
      max-width: 500px;
      border: 1px solid #ccc;
      border-radius: 5px;
      background-color: #fff;
      box-shadow: 2px 2px 5px rgba(0,0,0,0.1);
    }
    .card-header {
      background-color: #2c3e50;
      color: #fff;
      padding: 10px;
      border-top-left-radius: 5px;
      border-top-right-radius: 5px;
    }
    .card-header h5 {
      margin: 0;
      font-weight: normal;
    }
    .card-body {
      padding: 20px;
    }
    .form-group {
      margin-bottom: 20px;
    }
    label {
      display: block;
      margin-bottom: 5px;
      font-weight: bold;
    }
    input[type="email"],
    input[type="text"] {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
      color: #333;
      background-color: #f9f9f9;
      box-sizing: border-box;
    }
    input[type="email"]:focus,
    input[type="text"]:focus {
      outline: none;
      border-color: #2c3e50;
      box-shadow: 0 0 5px rgba(44, 62, 80, 0.5);
    }
    .btn {
      display: block;
      width: 100%;
      padding: 10px;
      border: none;
      border-radius: 5px;
      font-size: 16px;
      font-weight: bold;
      text-transform: uppercase;
      color: #fff;
      background-color: #2c3e50;
      cursor: pointer;
    }
    .btn:hover {
      background-color: #34495e;
    }
  
</style>
<body>

<div class="card">
    <div class="card-header">
    <h5>Change Password</h5>
    
    <div class="card-body p-4">

    <input type="hidden" name="password_token" value="<?php 
if(isset($_GET['token'])){echo $_GET["token"];}?>">

    <form action="password-reset-code.php" method="POST">

    
    <div class="form-group mb-3">
        <label >Email Address</label>
        <input type="email" class="input-field" placeholder="Enter Email Address" name="email_address" value="<?php 
if(isset($_GET['email'])){echo $_GET["email"];}?>">


    </div>

    <div class="form-group mb-3">
        <label >New Password</label>
        <input type="text" class="form_control" placeholder="Enter New Password" name="new_password">
        </div>

        <div class="form-group mb-3">
        <label >Confirm Address</label>
        <input type="text" class="form-control" placeholder="Enter Confirm Password" name="confirm_password">

        
        <div class="form-group mb-3">
            <button type="submit" name="password_update" class="btn btn-sucess w-100">Update Password</button>
    </form>
    </div>

   
</div>
    
</body>
</html>