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
  
?>

<?php

$nameErr = $emailErr = $subjectErr = $messageErr = "";
$name = $email = $subject = $message = "";

if (isset($_POST['submit'])) {


  if (empty($_POST["name"])) {
      $nameErr = "* Name is required";
  } else {
      $name = test_input($_POST["name"]);

      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
          $nameErr = "*Only letters and spaces are allowed"; 
      }
  }

  if (empty($_POST["email"])) {
      $emailErr = " * Email is required";
  } else {
      $email = test_input($_POST["email"]);

      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $emailErr = "*Invalid Email Format!"; 
      }
  }

  if (empty($_POST["subject"])) {
      $subjectErr = "*Subject is required";
  } else {
      $subject = test_input($_POST["subject"]);
  }

  if (empty($_POST["message"])) {
      $messageErr = "*Your valuable message is required";
  } else {
      $message = test_input($_POST["message"]);
  }
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<style>
  fieldset{
    background-color: lightblue;
    color: black;
  }
  
  h1{
    text-align: center;
  }

  h3{
    text-align: center;
  }

  table{
    margin-left:50px;
    margin-right:50px;
  }

  th{
    padding:5px;
  }

  .left{
    float:left;
    padding-left:80px ;
  }

  .right{
    float:right;
    padding-right:80px ;
  }

  input[type="submit"]{
    width: 100%;
    height: 50px;
    border: 1px solid;
    background: #2691d9;
    border-radius: 25px;
    font-size: 18px;
    color: #e9f4fb;
    font-weight: 700;
    cursor: pointer;
    outline: none;
  }

  input[type="submit"]:hover{
    border-color: #2691d9;
    transition: .5s;
  }
  .container
  {
  background-color: lightblue;
  display: flex;
  justify-content: space-between;
  width: 100%;
  margin: 0 auto;
  border: 1px solid #ccc;
  padding: 20px;
  }
</style>
<div class="container">
<div class="left">
<fieldset>
<h1>Contact Us</h1>
<br>Please fill in your contact information below and send us your message:<br>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
 <div class="txt_field">
  Name：<input type="text" name="name">
  <span class="error"><?php echo $nameErr;?></span>
  <br><br>
  Email：<input type="email" name="email">
  <span class="error"><?php echo $emailErr;?></span>
  <br><br>
  Subject：<input type="text" name="subject">
  <span class="error"><?php echo $subjectErr;?></span>
  <br><br>
  Message：<br>
  <textarea name="message" rows="5" cols="40"></textarea>
  <span class="error"><?php echo $messageErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="SEND">  
</div>
</form>
</fieldset>
</div>

<div class='right'>
<fieldset>
<table border="1px">
<h1>-OR-</h1>
<h3>You can contact the creators during working hours.</h3>
<div class="center">
<tr>
  <th>PHOTO</th>
  <th>NAME</th>
  <th>CONTACT NO.</th>
  <th>EMAIL</th>
</tr>
<tr>
<th><img src="image/test.jpeg" alt=""></th>
  <th>TAN CHOR XIANG</th>
  <th>016-7782792</th>
  <th>1211201763@student.mmu.edu.my</th>
</tr>
<tr>
<th><img src="image/test.jpeg" alt=""></th>
  <th>ELWIN WONG</th>
  <th>016-4452493</th>
  <th>1211201078@student.mmu.edu.my</th>
</tr>
<tr>
<th><img src="image/test.jpeg" alt=""></th>
  <th>MURPHY SIM LE YANG</th>
  <th>014-6190390</th>
  <th>1211201894@student.mmu.edu.my</th>
</tr>
</table>
</div>
</fieldset>
</div>
</div>

<?php
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if ($nameErr == "" && $emailErr == "" && $subjectErr == "" && $messageErr == "") {
        $sql = "INSERT INTO messages (name, email, subject, message)VALUES ('$name', '$email', '$subject', '$message')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created!";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
  }

?>


</body>
</html>

<?php
    include 'footer.php';
   
?>