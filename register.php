<?php
include_once 'conn.php';

if (isset($_POST["signupbtn"])) {

   $fullname = $_POST['fullname'];
   $contact = $_POST['contactno'];
   $email = $_POST['email'];
   $name = $_POST['username'];
   $pass = $_POST['userpassword'];
   $cpass = $_POST['confirm_password'];

   $select = "SELECT * FROM user WHERE email_address = '$email' AND userpassword = '$pass'";
   $result = mysqli_query($conn, $select);

   if(mysqli_num_rows($result) > 0){
      $error[] = 'User already exists!';
   } else {
      if(strtolower($pass) != strtolower($cpass)){
         $error[] = 'Passwords do not match!';
      } else {
         $insert = "INSERT INTO user(full_name, contact_no, email_address, username, userpassword, confirm_password) 
                    VALUES('$fullname', '$contact', '$email', '$name', '$pass', '$cpass')";
         mysqli_query($conn, $insert);
         header('location:user.php');
      }
   }

}
?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<style>
   
   
</style>
<body>
   <div class="form-container">
      <form id="signup" class="input-group" method="post" name="registerfrm" action="" autocomplete="off">
         <h3>Register now</h3>
         <?php
         if(isset($error)){
            foreach($error as $error){
               echo '<span class="error-msg">'.$error.'</span>';
            }
         }
         ?>
         <input type="text" class="input-field" placeholder="Full Name" name="fullname">
         <input type="tel" class="input-field" placeholder="Phone Number" name="contactno">
         <input type="email" class="input-field" placeholder="Email" name="email">
         <input type="text" class="input-field" placeholder="User Name" name="username">
         <input type="password" class="input-field" placeholder="Password" name="userpassword" id="pw">
         <br>
         <input type="checkbox" onclick="signshowpw()"><span class="showpw">Show Password</span>
         <script>
            function signshowpw() {
               var x = document.getElementById("pw");
               if (x.type === "password") {
                  x.type = "text";
               } else {
                  x.type = "password";
               }
            }
         </script>
         <input type="password" class="input-field" placeholder="Confirm Password" name="confirm_password" id="conpw">
         <input type="checkbox" onclick="signshowconpw()"><span class="showpw">Show Password</span>
         <script>
            function signshowconpw() {
               var x = document.getElementById("conpw");
              

    if (x.type === "password") {
    x.type = "text";
    } else {
    x.type = "password";
    }
    }
</script>
<div class="btnsubmit" style="padding-top:20px;">
    <input class="submit-btn" type="submit" name="signupbtn" value="Sign Up">
</div>

</form>
           <p>already have an account? <a href="login.php">login now</a></p>
        </form>
     
     </div>
     
</body>
</html>