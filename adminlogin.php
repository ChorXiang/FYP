<?php
include_once 'conn.php';
// Start the session
session_start();

// Check if the user is already logged in
//  

// Check if the login form was submitted
if (isset($_POST['submit'])) {
  // Retrieve the email and password entered by the user
  $admin_email = $_POST['admin_email'];
  $admin_password = $_POST['admin_password'];
  $select = "SELECT * FROM admin WHERE admin_email = '$admin_email' && admin_password = '$admin_password'";
  $result = mysqli_query($conn, $select);

  // TODO: Verify the admin's email and password against the database
  if(mysqli_num_rows($result) == 1)
      {
        
      $row = mysqli_fetch_assoc($result);
      $status = $row['status'];

        if($status=="active")
        {
          $_SESSION['admin_email'] = $row['admin_email'];
          $_SESSION['admin_password'] = $row['admin_password'];

          $admin_id = $row['admin_id'];
          $_SESSION['user_id'] = $user_id; 
          header('Location: manageuser.php?admin_id='.$row['admin_id']);
        }
        else
        {
          echo '<script>alert("This admin account is Inactive !");</script>';
        }
  } else {
    // Display an error message if the email or password is incorrect
    //$error_msg = "Invalid email address or password. Please try again.";
    $error_msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Invalid email address or password. Please try again.</div>";

  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>

  <style>
    body
    {
      text-align: center;
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
  </style>
</head>
<body>
<form method="post">
    <?php if (isset($error_msg)) { ?>
      <p><?php echo $error_msg; ?></p>
    <?php } ?>
    <h1>Admin Login</h1>
  
    <label for="admin_email"></label>
    <input type="email" id="admin_email" class="input-field" placeholder="Email" name="admin_email" required>
    <br><br>
    <label for="admin_password"></label>
    <input type="password" id="admin_password" class="input-field" placeholder="Password" name="admin_password" required>
    <br><br>
    <button type="submit" class="submitbtn" name="submit">Log In</button>
    <!-- <div class="submitbtn">
    <input type="submit" name="submit" value="Log In">
    </div> -->
  </form>

</body>
</html>
