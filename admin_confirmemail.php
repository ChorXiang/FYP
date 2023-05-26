<?php
    include 'conn.php'; 
    $msg = '';  
?>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = $_POST["email"];
    $secureCode = $_POST["secure"];

    $sql = "SELECT * FROM `admin` WHERE `admin_email` = '$email' AND `secure` = '$secureCode'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $email = $row['admin_email'];
        
        $msg = "<div style='text-align:center; background-color:green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text-align: center; margin-bottom: 20px;'>Validation Successful!</div>";
        header('Location: admin_confirmpass.php?admin_email=' . $email);
        exit(); 
    } else {
        $msg = "<div style='text-align:center; background-color:red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text-align: center; margin-bottom: 20px;'>Wrong Email or Secure Code   !</div>";
    }
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

    <h2>Forgot Password</h2>
        <label for=""></label>
        <input type="email" class="input-field" placeholder="Email" name="email" required>
        <br><br>
        <label for=""></label>
        <input type="password" class="input-field" placeholder="Secure Code" name="secure" pattern="[0-9]{6}" title="Please enter a 6-digit number" minlength="6" maxlength="6" required><br><br>
        
        <input type="submit" class="submitbtn" name="submit" value="Confirm">
        <br>
        <a href="adminlogin.php" style="float: right;">Back</a>

    </form>
    
</body>
</html>
