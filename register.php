<?php
// include database connection file
include_once 'conn.php';

$errors = array();

if (isset($_POST['signupbtn'])) {
    // check if user already exists
    if (isset($_POST['email'])) {
        $email = ($_POST['email']);
        $select = "SELECT * FROM user WHERE email_address = '$email'";
        $result = mysqli_query($conn, $select);
        if (mysqli_num_rows($result) > 0) {
            $errors[] = 'User already exists';
        }
    } else {
        $errors[] = 'Email is required';
    }

    // insert user data into database
    if (isset($_POST['fullname'])) {
        $fullname = ( $_POST['fullname']);
    } else {
        $errors[] = 'Full Name is required';
    }

    if (isset($_POST['contactno'])) {
        $contact =($_POST['contactno']);
    } else {
        $errors[] = 'Contact Number is required';
    }

    if (isset($_POST['address'])) {
        $address = ($_POST['address']);
    }

    if (isset($_POST['postcode'])) {
        $postcode = ($_POST['postcode']);
    }

    if (isset($_POST['username'])) {
        $name = ($_POST['username']);
    } else {
        $errors[] = 'Username is required';
    }

    if (isset($_POST['userpassword'])) {
        $pass = ($_POST['userpassword']);
    } else {
        $errors[] = 'Password is required';
    }

    if (isset($_POST['confirm_password'])) {
        $cpass = ($_POST['confirm_password']);
    } else {
        $errors[] = 'Confirm Password is required';
    }

    if (isset($_POST['status'])) {
        $status = ($_POST['status']);
    }

    if ($pass !== $cpass) {
        $errors[] = 'Passwords do not match';
    }

    if (empty($errors)) {
        $insert = "INSERT INTO user(full_name, contact_no, email_address, username, userpassword, confirm_password, status) 
                   VALUES('$fullname', '$contact',  '$email', '$name', '$pass', '$cpass', '$status')";
        if (mysqli_query($conn, $insert)) {
            header('Location: login.php');
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
.error-msg
{
  position:relative;
  top:10px;
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
         <input type="tel" class="input-field" placeholder="Phone Number" name="contactno" maxlength="10">
         <input type="email" class="input-field" placeholder="Email" name="email">
         <input type="text" class="input-field" placeholder="User Name" name="username">
         <input type="password" class="input-field" placeholder="Password" name="userpassword" id="pw">
         <input type="hidden" name="status" value="active">
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