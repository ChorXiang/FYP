<?php
    include 'conn.php'; 
    $msg = '';  
    $email =$_GET['admin_email']; 
?>

<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $pass = $_POST["admin_password"];

    // Perform validation against the database records
    $sql = "UPDATE admin set admin_password='" . $_POST['admin_password'] . "' where admin_email = '$email'";            
    mysqli_query($conn, $sql);

    
        // The email and secure code match the database records
        // Proceed with further actions or redirect to a success page
        echo '<script>alert("Change New Password Successfully !");</script>';
        header('Location: adminlogin.php');
    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
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
    <form action="" method="POST">
    <?php echo "<div>".$msg."</div>"?>

    <h2>Confirm New Password</h2>
        <br><br>
        <label for=""></label>
        <input type="password" id="admin_password" class="input-field" placeholder="Password" name="admin_password" required>
        <br><br>        
        <input type="submit" class="submitbtn" name="submit" value="Confirm">
    </form>
    
</body>
</html>
