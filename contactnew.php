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

$emailErr = $shipping_ratingErr = $customer_service_ratingErr = $product_quality_ratingErr = $user_interface_ratingErr = $messageErr = "";
$email = "";
$shipping_rating = "";
$customer_service_rating = "";
$product_quality_rating = "";
$user_interface_rating = "";
$message = "";

if (isset($_POST['submit'])) {
  

  if (empty($_POST["email"])) {
      $emailErr = " * Email is required";
  } else {
    $emailErr ="";

  }

  if (empty($_POST["shipping_rating"])) {
    $shipping_ratingErr = "*Shipping_rating is required";
  } else {
    $shipping_ratingErr="";
  }

  if (empty($_POST["customer_service_rating"])) {
    $customer_service_ratingErr = "*Customer_service_rating is required";
  } else {
    $customer_service_ratingErr="";
  }

  if (empty($_POST["product_quality_rating"])) {
    $product_quality_ratingErr = "*Product_quality_rating is required";
  } else {
    $product_quality_ratingErr="";
  }

  if (empty($_POST["user_interface_rating"])) {
      $user_interface_ratingErr = "*User_interface_rating is required";
  } else {
    $user_interface_ratingErr="";
  }

  if (empty($_POST["message"])) {
      $messageErr = "*Your valuable message is required";
  } else {
    $messageErr = "";
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
sup
  {
    color:red;
  }

</style>

<div class="container">
  <div class="left">
    <fieldset>
    <?php

if (isset($_POST['submit'])) 
{

  // $id =$_GET['user_id']; 
  
    $email = $_POST['email'];
    $shipping_rating = $_POST['shipping_rating'];
    $customer_service_rating = $_POST['customer_service_rating'];
    $product_quality_rating = $_POST['product_quality_rating'];
    $user_interface_rating = $_POST['user_interface_rating'];
    $message = $_POST['message'];

    if ($emailErr == "" && $shipping_ratingErr == "" && $customer_service_ratingErr == "" && $product_quality_ratingErr == "" && $user_interface_ratingErr == "" && $messageErr == "") 
    {
      
      mysqli_query($conn,"INSERT INTO `comment`(email, shipping_rating, customer_service_rating, product_quality_rating, user_interface_rating, message) VALUES ('$email', '$shipping_rating', '$customer_service_rating', '$product_quality_rating', '$user_interface_rating', '$message' )");  
       
      $msg = "<div style='text-align:center;background-color: green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Rating Send Successfully !</div>";


    }
  }

?>

      <?php echo "<div>".$msg."</div>"?>
      <h1>Online Shoe Selling Store Service Rating</h1>
      <br>Please fill in your Rating or Leave the comment here :<br>
      <form method="post" action="">  
        <div class="txt_field">
          <br><br>
          Email：<sup>* </sup><input type="email" name="email">
          <span class="error"><?php echo $emailErr;?></span>
          <br><br>
          Shipping Service Rating (1-5) :<sup>* </sup>&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="shipping_rating" id="shipping_rating" min="1" max="5" >
          <span class="error"><?php echo $shipping_ratingErr;?></span>
          <br><br>
          Customer Service Rating (1-5) ：<sup>* </sup><input type="number" name="customer_service_rating" id="customer_service_rating" min="1" max="5">
          <span class="error"><?php echo $customer_service_ratingErr;?></span>
          <br><br>
          Product Quality Rating (1-5) :<sup>* </sup>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="number" name="product_quality_rating" id="product_quality_rating" min="1" max="5" >
          <span class="error"><?php echo $product_quality_ratingErr;?></span>
          <br><br>
          User Interface Rating (1-5) ：<sup>* </sup>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input input type="number" name="user_interface_rating" id="user_interface_rating" min="1" max="5" >
          <span class="error"><?php echo $user_interface_ratingErr;?></span>
          <br><br>
          Message: <sup>* </sup> <textarea name="message" rows="5" cols="40"></textarea>
          <span class="error"><?php echo $messageErr;?></span>
          <br><br>
          <input type="submit" name="submit" value="SEND">  

        </div>
      </form>
    </fieldset>
  </div>
</div>

<?php include 'footer.php'; ?>

</body>
</html>
