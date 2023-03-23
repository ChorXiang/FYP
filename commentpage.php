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

$emailErr = $shipping_ratingErr = $customer_service_ratingErr = $product_quality_ratingErr = $user_interface_ratingErr = $messageErr = "";
$email = $shipping_rating = $customer_service_rating = $product_quality_rating = $user_interface_rating = $message = "";

if (isset($_POST['submit_rating'])) {

  if (empty($_POST["email"])) {
      $emailErr = " * Email is required";
  } else {
      $email = test_input($_POST["email"]);

  }

  if (empty($_POST["shipping_rating"])) {
    $shipping_ratingErr = "*shipping_rating is required";
  } else {
      $shipping_rating = test_input($_POST["shipping_rating"]);
  }

  if (empty($_POST["customer_service_rating"])) {
    $customer_service_ratingErr = "*customer_service_rating is required";
  } else {
    $customer_service_rating = test_input($_POST["customer_service_rating"]);
  }

  if (empty($_POST["product_quality_rating"])) {
    $product_quality_ratingErr = "*product_quality_rating is required";
  } else {
    $product_quality_rating = test_input($_POST["product_quality_rating"]);
  }

  if (empty($_POST["user_interface_rating"])) {
      $user_interface_ratingErr = "*user_interface_rating is required";
  } else {
      $user_interface_rating = test_input($_POST["user_interface_rating"]);
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
  
</style>

<fieldset> 
	<h1>Online Shoe Selling Store Service Rating</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <br><br>
  Email：<input type="email" name="email" value="<?php echo $email;?>">
  <span class="error"><?php echo $emailErr;?></span>
  <br><br>

    <h2>User Interface</h2>
    <input type="radio" name="user_interface_rating" value="1">1
    <input type="radio" name="user_interface_rating" value="2">2
    <input type="radio" name="user_interface_rating" value="3">3
    <input type="radio" name="user_interface_rating" value="4">4
    <input type="radio" name="user_interface_rating" value="5">5
    <span class="error"><?php echo $user_interface_ratingErr;?></span>
    <br>

		<h2>Shipping Service</h2>
		<input type="radio" name="shipping_rating" value="1">1
		<input type="radio" name="shipping_rating" value="2">2
		<input type="radio" name="shipping_rating" value="3">3
		<input type="radio" name="shipping_rating" value="4">4
		<input type="radio" name="shipping_rating" value="5">5
    <span class="error"><?php echo $shipping_ratingErr;?></span>
		<br>

		<h2>Customer Service</h2>
		<input type="radio" name="customer_service_rating" value="1">1
		<input type="radio" name="customer_service_rating" value="2">2
		<input type="radio" name="customer_service_rating" value="3">3
		<input type="radio" name="customer_service_rating" value="4">4
		<input type="radio" name="customer_service_rating" value="5">5
    <span class="error"><?php echo $customer_service_ratingErr;?></span>
		<br>

		<h2>Product Quality</h2>
		<input type="radio" name="product_quality_rating" value="1">1
		<input type="radio" name="product_quality_rating" value="2">2
		<input type="radio" name="product_quality_rating" value="3">3
		<input type="radio" name="product_quality_rating" value="4">4
		<input type="radio" name="product_quality_rating" value="5">5
    <span class="error"><?php echo $product_quality_ratingErr;?></span>
		<br>

    <h2>Message</h2>
    <textarea name="message" rows="5" cols="40"></textarea>
    <span class="error"><?php echo $messageErr;?></span>
    <br><br>

		<input type="submit" name="submit_rating" value="Submit Rating">
	</form>
</fieldset>

<?php
if (isset($_POST['submit_rating'])) {

    $email = $_POST['email'];
    $shipping_rating = $_POST['shipping_rating'];
    $customer_service_rating = $_POST['customer_service_rating'];
    $product_quality_rating = $_POST['product_quality_rating'];
    $user_interface_rating = $_POST['user_interface_rating'];
    $message = $_POST['message'];

    if ($emailErr == "" && $shipping_ratingErr == "" && $customer_service_ratingErr == "" && $product_quality_ratingErr == "" && $user_interface_ratingErr == "" && $messageErr == "") {
      $sql = "INSERT INTO comment (email, shipping_rating, customer_service_rating, product_quality_rating, user_interface_rating, message)VALUES ('$email', '$shipping_rating', '$customer_service_rating', '$product_quality_rating', '$user_interface_rating', '$message' )";

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
