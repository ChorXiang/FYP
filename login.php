<?php

include_once 'conn.php';

session_start();

if(isset($_POST['loginbtn'])){

    $name = $_POST['username'];
    $pass = $_POST['password'];
 
    $select = "SELECT * FROM user WHERE username = '$name' && userpassword = '$pass'";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) == 1){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['userpassword'] = $row['userpassword'];
        header('Location: user.php');
    }else{
        $error[] = "Incorrect username or password";
    }
}
    


   

 


?> 
<html lang="en">
<head>
<!DOCTYPE
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="form-container">

             
    <form id="login" class="input-group" action="" method="POST" autocomplete="off">
    <h3>Login now</h3>
    <?php
      if(isset($error)){
         foreach($error as $error){
            echo '<span class="error-msg">'.$error.'</span>';
         };
      };
      ?>
            <br>
            <input type="text" class="input-field" placeholder="Username" name="username">
            <input type="password" class="input-field" placeholder="Password" name="password" id="p">
            <input type="checkbox" onclick="loginshowpw()"><span class="showpw">Show Password</span>
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
            
            </div>
            <div class="alignfgpw">
                <br>
            <a href="forgotpw.php"><span class="fgpw">forgot password?</span></a>
            </div>
        

           <p>don't have an account? <a href="register.php">register now</a></p>
        </form>
     
     </div>
    
</body>
</html>