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
      
          $_SESSION['admin_email'] = $row['admin_email'];
          $_SESSION['admin_password'] = $row['admin_password'];

          $admin_id = $row['admin_id'];
          $_SESSION['user_id'] = $user_id; 
          header('Location: manageuser.php?admin_id='.$row['admin_id']);
        
  } else {
    // Display an error message if the email or password is incorrect
    $error_msg = "Invalid email address or password. Please try again.";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Admin Login</title>
</head>
<body>
  <h1>Admin Login</h1>
  <?php if (isset($error_msg)) { ?>
    <p><?php echo $error_msg; ?></p>
  <?php } ?>
  <form method="post">
    <label for="admin_email">Email:</label>
    <input type="email" id="admin_email" name="admin_email" required>
    <br><br>
    <label for="admin_password">Password:</label>
    <input type="password" id="admin_password" name="admin_password" required>
    <br><br>
    <input type="submit" name="submit" value="Log In">
  </form>
</body>
</html>
