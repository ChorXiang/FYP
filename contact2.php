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
  border-radius: 25px;
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
  background-color: ;
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
<?php
if (isset($_POST['submit'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if ($nameErr == "" && $emailErr == "" && $subjectErr == "" && $messageErr == "") {
        $sql = "INSERT INTO messages (name, email, subject, message)VALUES ('$name', '$email', '$subject', '$message')";

        if (mysqli_query($conn, $sql)) {
          echo  "<div class='success'>New record created!</div>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }

        mysqli_close($conn);
    }
}
?>





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
  <textarea name="message" rows="5" cols="80"></textarea>
  <span class="error"><?php echo $messageErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="SEND">  
  <p>Company Information</p>
  <p>ROOT MALAYSIA SDN. BHD.</p>
  <p>Email: shop@root-mlk.com</p>
  <p>Contact Number: 03-21817618</p>
<p>Address: Lot 155, First Floor, Suria KLCC, 50088, Kuala Lumpur, Malaysia.</p>
  <p>Operating Hours: 10:00 AM — 06:00 PM (Monday – Friday)</p>
</div>
</form>


</fieldset>
</div>





</body>
</html>





