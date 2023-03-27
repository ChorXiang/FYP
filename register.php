<?php
// include database connection file
include_once 'conn.php';

$errors = array();

if (isset($_POST["signupbtn"])) {

    // validate input data
    if (empty($_POST['fullname'])) {
        $errors[] = 'Full Name is required';
    }
    if (empty($_POST['contactno'])) {
        $errors[] = 'Phone Number is required';
    }
   
    if (empty($_POST['email'])) {
        $errors[] = 'Email is required';
    } elseif (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Invalid email format';
    }
    if (empty($_POST['username'])) {
        $errors[] = 'Username is required';
    }
    if (empty($_POST['userpassword'])) {
        $errors[] = 'Password is required';
    }
    
    // check if user already exists
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = mysqli_real_escape_string($conn, $_POST['userpassword']);
    $select = "SELECT * FROM user WHERE email_address = '$email'";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
        $errors[] = 'User already exists';
    } else {
        // insert user data into database
        $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
        $contact = mysqli_real_escape_string($conn, $_POST['contactno']);
        $address = mysqli_real_escape_string($conn, $_POST['address']);
        $postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
        $name = mysqli_real_escape_string($conn, $_POST['username']);
        $pass_hash = password_hash($_POST['userpassword'], PASSWORD_DEFAULT);
        $insert = "INSERT INTO user(full_name, contact_no, address, postcode, email_address, username, userpassword) 
                   VALUES('$fullname', '$contact', '$address', '$postcode', '$email', '$name', '$pass_hash')";
        if (mysqli_query($conn, $insert)) {
            header('Location: user.php');
            exit();
        } else {
            $errors[] = 'Database error: '.mysqli_error($conn);
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
   
   body {
  margin: 0;
  padding: 0;
  font-family: Arial, sans-serif;
  background-color: #f7f7f7;
}

   /* Form container */
.form-container {
  max-width: 500px;
  margin: 0 auto;
  padding: 20px;
  background-color: #f2f2f2;
  border-radius: 5px;
}

/* Form header */
.form-container h3 {
  margin-top: 0;
  margin-bottom: 20px;
  font-size: 24px;
  font-weight: bold;
  text-align: center;
}

/* Error message */
.error-msg {
  display: block;
  margin-bottom: 10px;
  color: red;
}

/* Input fields */
.input-group {
  margin-bottom: 20px;
}

.input-field {
  width: 100%;
  padding: 10px;
  font-size: 16px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
}

/* Show password checkbox */
.showpw {
  margin-left: 10px;
  font-size: 14px;
  color: #666;
  cursor: pointer;
}

/* Submit button */
.submit-btn {
  width: 100%;
  padding: 10px;
  background-color: #4CAF50;
  color: #fff;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
}

.submit-btn:hover {
  background-color: #3e8e41;
}

/* Login link */
p a {
  color: #4CAF50;
  text-decoration: none;
}

p a:hover {
  text-decoration: underline;
}

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

     
     </div>
     
</body>
</html>