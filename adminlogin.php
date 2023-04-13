<?php

include_once 'conn.php';

session_start();

if(isset($_POST['loginbtn'])){

    $name = $_POST['admin_id'];
    $pass = $_POST['admin_password'];
 
    $select = "SELECT * FROM admin WHERE admin_id = '$name' && admin_password = '$pass'";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['admin_id'] = $row['admin_id'];
        $_SESSION['admin_password'] = $row['admin_password'];
        header('Location: manageuser.php');
    }else{
        $error[] = "Incorrect AdminId or password";
    }
}
    


   

 


?> 
<html lang="en">
<head>
<!DOCTYPE
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
</head>
<style>
    /* Global styles */
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
}

body {
  background-color: #f2f2f2;
}

/* Form container */
.form-container {
  background-color: #fff;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  margin: 50px auto;
  max-width: 400px;
  padding: 30px;
}

/* Form elements */
.input-group {
  display: flex;
  flex-direction: column;
}

h3 {
  font-size: 28px;
  font-weight: 600;
  margin-bottom: 20px;
  text-align: center;
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

.showpw {
  color: #444;
  cursor: pointer;
  font-size: 14px;
  
}

.error-msg {
  color: #ff5555;
  font-size: 14px;
  margin-bottom: 10px;
}

.btnsubmit {
  text-align: center;
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

.alignfgpw {
  text-align: center;
  margin-top: 10px;
}

.fgpw {
  color: #2196f3;
  font-size: 14px;
}

p {
  font-size: 14px;
  margin-top: 20px;
  text-align: center;
}

a {
  color: #2196f3;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}
</style>

<body>
    <div class="form-container">

             
    <form id="login" class="input-group" action="manageuser.php" method="POST" target="_blank" autocomplete="off">
    <h3>Login now</h3>
    <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
            <br>
            <input type="text" class="input-field" placeholder="AdminId" name="admin_id">
            <input type="password" class="input-field" placeholder="Password" name="admin_password" id="p">
            <div style="display: flex; align-items: center;">
  <input type="checkbox" onclick="loginshowpw()">
  <span class="showpw">Show Password</span>
</div>
<br>
            
            <script>
                function loginshowpw() {
                var x = document.getElementById("p");
                if (x.type === "password") {
                x.type = "text";
                } else {
                x.type = "password";
                }
                }
            </script>
            <br><br>
             
            <div class="btnsubmit" style="padding-top:20px;">
            <button type="submit" class="submitbtn" name="loginbtn">Log In</button>
            
          
        </form>
     
     </div>
    
</body>
</html>