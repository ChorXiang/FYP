<?php
// include database connection file
include_once 'conn.php';

$emailErr = $fullnameErr = $contactErr = $existsErr = "";
$usernameErr = $passErr = $CompassErr  = "";
$img = $status= "";
$email = $fullname = $contact = "";
$postcode = $username = $pass = $cpass = "";

if (isset($_POST['signupbtn'])) {


    // insert user data into database
    if (empty($_POST["full_name"])) {
        $fullnameErr = 'Full Name is required';
    } else {
        $fullname = test_input($_POST["full_name"]);
    }

    if (empty($_POST["contact_no"])) {
        $contactErr = 'Contact Number is required';
    } else {
        $contact = test_input($_POST['contact_no']);
    }

    if (empty($_POST['email_address'])) {
        $emailErr = 'Email is required';
    } else {
        $email = test_input($_POST['email_address']);
    }

    if (empty($_POST['username'])) {
        $usernameErr = 'Username is required';
    } else {
        $username = test_input($_POST['username']);
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
        $NotmatchErr = 'Password does not match with confirm password!'; 
    }
    
    if (empty($_POST["email_address"])) {
        $emailErr = 'Email is required';
    } else {
        $email = test_input($_POST["email_address"]);

        $result = mysqli_query($conn, "SELECT * FROM `user` WHERE `email_address`='$email'");
        if (mysqli_num_rows($result) > 0) {
            // Display error message and stop further processing
            $msg = "<div class='error-msg'>Email address is already registered. Please choose a different email address.</div>";
        } else {
            // Insert new user record
            $fullname = test_input($_POST["full_name"]);
            $contact = test_input($_POST['contact_no']);
            $username = test_input($_POST['username']);
            $pass = test_input($_POST['userpassword']);
            $cpass = test_input($_POST['confirm_password']);
            $img = test_input($_POST['img']);
            $status = test_input($_POST['status']); 

            $sql = "INSERT INTO user (full_name, email_address, contact_no, username, userpassword, confirm_password, image, status) VALUES ('$fullname', '$email', '$contact', '$username', '$pass', '$cpass', '$img', '$status')";

            if (mysqli_query($conn, $sql)) {
                // Display success message and redirect to login.php
                $msg = "<div class='success-msg'>Successfully registered!</div>";

                echo '<script>alert("Registered Successfully!");</script>';

                echo '<script>
                    function confirmRedirect() {
                        window.location.href = "login.php";
                    }
                    confirmRedirect();
                </script>';
            } else {
                // Display error message if the query fails
                $msg = "<div class='error-msg'>Error: " . mysqli_error($conn) . "</div>";
            }
        }
    }
}

// define the test_input function
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
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
        .form-container h2 {
            margin-top: 0;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
        }

        /* Error message */
        .error-msg {
            color: #FF0000;
            margin-top: 5px;
            font-size: 14px;
        }

        /* Success message */
        .success-msg {
            color: #008000;
            margin-top: 5px;
            font-size: 14px;
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
</head>

<body>

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

    if ($emailErr == "" && $fullnameErr == "" && $contactErr == "" && $usernameErr == "" && $passErr == "" && $CompassErr == "" && $NotmatchErr == "") {
        $sql = "INSERT INTO user (full_name, email_address, contact_no, username, userpassword, confirm_password, image, status) VALUES ('$fullname', '$email', '$contact', '$username', '$pass', '$cpass', '$img', '$status')";
    }
    
}
?>
    <div class="container">
        <div class="main">
            <div class="form-container">
                <h2>Sign up</h2>
                <hr/>
                <?php if (isset($msg)) {
                    echo $msg;

                } ?>
                <form method="post" action="">
                
                    <div class="input-group">
                        <label>Full Name :</label>
                        <input type="text" name="full_name" placeholder="Enter your name" class="input-field">
                        <span class="error-msg"><?php echo $fullnameErr; ?></span>
                    </div>

                    <div class="input-group">
                        <label>Contact Number :</label>
                        <input type="text" name="contact_no" placeholder="Enter your contact number" class="input-field">
                        <span class="error-msg"><?php echo $contactErr; ?></span>
                    </div>

                    <div class="input-group">
                        <label>Email Address :</label>
                        <input type="email" name="email_address" placeholder="Enter your email" class="input-field">
                        <span class="error-msg"><?php echo $emailErr; ?></span>
                    </div>

                    <div class="input-group">
                        <label>Username :</label>
                        <input type="text" name="username" placeholder="Enter your username" class="input-field">
                        <span class="error-msg"><?php echo $usernameErr; ?></span>
                    </div>

                    <div class="input-group">
                        <label>Password :</label>
                        <input type="password" name="userpassword" placeholder="Enter your password" class="input-field">
                        <input type="hidden" name="img" value="profile.jpg">  
                        <input type="hidden" name="status" value="active"> 
                        <span class="error-msg"><?php echo $passErr; ?></span>
                    </div>

                    <div class="input-group">
                        <label>Confirm Password :</label>
                        <input type="password" name="confirm_password" placeholder="Enter your confirm password" class="input-field">
                        <span class="error-msg"><?php echo $CompassErr; ?></span>
                      
                        
                      
                    </div>
                    
                    <input type="submit" name="signupbtn" class="submit-btn" value="Sign up">
                    <br/><br/>
                    <a href="login.php"><span class="fgpw">Already have an account? Log in</span></a>
                    <br><br>
                    <a href="homepage.php"><span class="fgpw">Back To Previous Page</span></a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
