<?php
// include database connection file
include_once 'conn.php';

$emailErr = $fullnameErr = $contactErr = $existsErr = "";
$usernameErr = $passErr = $CompassErr  = "";
$email = $fullname = $contact =   "";
$postcode = $username = $pass = $cpass =  "";

if (isset($_POST['signupbtn'])) {
    // check if user already exists
    if (isset($_POST['email_address'])) {
        $email = test_input($_POST["email_address"]);
        $select = "SELECT * FROM user WHERE email_address = '$email'";
        $result = mysqli_query($conn, $select);
        if (mysqli_num_rows($result) > 0) {
            $existsErr = 'User already exists';
        }
        
    } else  {
        $emailErr = 'Email is required';
       
    }

    // insert user data into database
    if (empty($_POST["full_name"])) {
        $fullnameErr = 'Full Name is required';
        
    } 
    else {
        $fullname = test_input($_POST["full_name"]);
    }

    if (empty($_POST["contact_no"])) {
        $contactErr = 'Contact Number is required';
        
    } else {
        $contact = test_input($_POST['contact_no']);
    }

    if (empty($_POST['email_address'])) {
        $emailErr= 'Email is required';
        
    }
    else{
        $email = test_input($_POST['email_address']);
}




    if (empty($_POST['username'])) {
        $usernameErr = 'Username is required';
       
    } else {
        $name = test_input($_POST['username']);
    }

    if (empty($_POST['userpassword'])) {
        $passErr = 'Password is required';
    } else if (strlen($_POST['userpassword']) < 8) {
        $passErr = 'Password must be at least 8 characters long';
    } else {
        $pass = test_input($_POST['userpassword']);
    }
    
        
        if (empty($_POST['confirm_password'])) {
            $CompassErr = 'Confirm Password is required';
            
        } else {
            $cpass = test_input($_POST['confirm_password']);
        }
        

        if ($pass !== $cpass) {
            echo 'Passwords do not match';
        }
        

    

    
  
}



 

// define the test_input function
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
.error {
  color: #FF0000;
  }
</style>
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

<?php





if (isset($_POST['signupbtn'])) {

    $email = $_POST['email_address'];
    $fullname = $_POST['full_name'];
    $contact = $_POST['contact_no'];
    $username = $_POST['username'];
    $pass = $_POST['userpassword'];
    $cpass = $_POST['confirm_password'];     
    $img = $_POST['img']; 
    $status = $_POST['status'];                                 

    if ($emailErr == "" && $fullnameErr == "" && $contactErr == "" && $usernameErr == "" && $passErr == "" && $cpassErr == "") {
        $sql = "INSERT INTO user (full_name, email_address, contact_no, username, userpassword, confirm_password,image,status)VALUES ('$fullname', '$email', '$contact', '$username', '$pass', '$cpass', '$img', '$status')";

        if (mysqli_query($conn, $sql)) {
            header('Location: login.php');
            exit();
        } else {
            $errors[] = 'Database error: '.mysqli_error($conn);
        }
    }
}
?>

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
         <input type="text" class="input-field" placeholder="Full Name" name="full_name">
         <span class="error"><?php echo $fullnameErr;?></span>
         <br><br>
         <input type="tel" class="input-field" placeholder="Phone Number" name="contact_no" maxlength="10">
         <span class="error"><?php echo $contactErr;?></span>
         <br><br>
         <input type="email" class="input-field" placeholder="Email" name="email_address">
         <span class="error"><?php echo $emailErr;?></span>
         <br><br>
         <input type="text" class="input-field" placeholder="User Name" name="username">
         <span class="error"><?php echo $usernameErr;?></span>
         <br><br>
         <input type="password" class="input-field" placeholder="Password" name="userpassword" id="pw">
         <input type="hidden" name="img" value="profile.jpg">  
         <input type="hidden" name="status" value="active">  
         <span class="error"><?php echo $passErr;?></span>
         <br><br>

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
<span class="error"><?php echo $CompassErr;?></span>
         <br><br>
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