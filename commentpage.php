<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {
  color: #FF0000;
}
</style>
</head>
<body>  
  
  <?php
    include 'conn.php'; 
    include 'header.php'; 
    $msg = "";
?>


<?php

$nameErr = $emailErr = $subjectErr = $messageErr = "";
$name = "";
$email = "";
$subject = "";
$message = "";


if (isset($_POST['submit'])) {

  if (empty($_POST["name"])) {
    $nameErr = "* Name is required";
  } else {
    $nameErr ="";
  }

  if (empty($_POST["email"])) {
    $emailErr = " * Email is required";
  } else {
    $emailErr ="";
  }

  if (empty($_POST["subject"])) {
    $subjectErr = "*Subject is required";
  } else {
    $subjectErr="";
  }

  if (empty($_POST["message"])) {
    $messageErr = "*Your valuable message is required";
  } else {
    $messageErr = "";
  }
}
?>


<?php
if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  if ($nameErr == "" && $emailErr == "" && $subjectErr == "" && $messageErr == "") {
    mysqli_query($conn,"INSERT INTO `messages`(name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')");  
    $msg = "<div style='text-align:center;background-color: green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Message Send Successfully !</div>";
  }
}
?>


<style>
body {
  background-color: white;
  color: black;
}

.txt_field {
  width: 80%;
  margin: 0 auto;
}

fieldset {
  border: 2px solid black;
  padding: 20px;
}

h1, h3 {
  text-align: center;
}

table {
  margin: 0 auto;
}

th {
  padding: 5px;
}

.left {
  float: left;
  padding-left: 80px;
}

.right {
  float: right;
  padding-right: 80px;
}

input[type="text"],
input[type="email"],
textarea {
  border: 1px solid black;
  padding: 10px;
  width: 100%;
  color: black;
  background-color: white;
}

input[type="submit"] {
  width: 100%;
  height: 50px;
  border: 1px solid black;
  background: white;
  border-radius: 25px
  <!DOCTYPE HTML>  
<html>
<head>
<style>
.error {
  color: #FF0000;
}
}
</style>
</head>
<body>  
  


<?php
if (isset($_POST['submit'])) {

  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  if ($nameErr == "" && $emailErr == "" && $subjectErr == "" && $messageErr == "") {
    mysqli_query($conn,"INSERT INTO `messages`(name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')");  
    $msg = "<div style='text-align:center;background-color: green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Message Send Successfully !</div>";
  }
}
?>


<style>
body {
  background-color: white;
  color: black;
}

.txt_field {
  width: 80%;
  margin: 0 auto;
}

fieldset {
  border: 2px solid black;
  padding: 20px;
}

h1, h3 {
  text-align: center;
}

table {
  margin: 0 auto;
}

th {
  padding: 5px;
}

.left {
  float: left;
  padding-left: 80px;
}

.right {
  float: right;
  padding-right: 80px;
}

input[type="text"],
input[type="email"],
textarea {
  border: 1px solid black;
  padding: 10px;
  width: 100%;
  color: black;
  background-color: white;
}

input[type="submit"] {
  width: 100%;
  height: 50px;
  border: 1px solid black;
  background: white;
  border-radius: 25px
  font-size: 18px;
  color: black;
  font-weight: 700;
  cursor: pointer;
  outline: none;
}

input[type="submit"]:hover {
  background-color: black;
  color: white;
  transition: .5s;
}

.container {
  background-color: #f2f2f2;
  display: flex;
  justify-content: space-between;
  width: 80%;
  margin: 0 auto;
  border: 1px solid black;
  padding: 20px;
}

.success {
  background-color: black;
  color: white;
  padding: 10px;
  margin-bottom: 20px;
  border-radius: 5px;
}

p {
  color: black;
  font-weight: bold;
  margin-top: 10px;
  margin-bottom: 10px;
}

</style>

<div class="container">
  <div class="left">
    <fieldset>
      <?php echo "<div>".$msg."</div>"?>
      <h1>Contact Us</h1>
      <br>Please fill in your contact information below and send us your message:<br>
      <form method="post" action="">  
        <div class="txt_field">
          Name：<input type="text" name="name" >
          <span class="error"><?php echo $nameErr;?></span>
          <br><br>
          Email：<input type="email" name="email">
          <span class="error"><?php echo $emailErr;?></span>
          <br><br>
          Subject：<input type="text" name="subject">
          <span class="error"><?php echo $subjectErr;?></span>
          <br><br>
          Message：<br>
          <textarea name="message" rows="5" cols="80"></textarea>
          <span class="error"><?php echo $messageErr;?></span>
          <br><br>
          <input type="submit" name="submit" value="SEND">  
          <p>Company Information</p>
          <p>ROOT MALAYSIA SDN. BHD.</p>
          <p>Email: shop@foot-mlk.com</p>
          <p>Contact Number: 03-21817618</p>
          <p>Address: Lot 155, First Floor, Suria KLCC, 50088, Kuala Lumpur, Malaysia.</p>
          <p>Operating Hours: 10:00 AM — 06:00 PM (Monday – Friday)</p>
        </div>
      </form>
    </fieldset>
  </div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
