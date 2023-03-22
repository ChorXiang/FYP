<?php
include 'header.php'; 
include 'conn.php'; 

// Initialize variables
$email = "";
$emailErr = "";
$shipping_ratingErr = "";
$customer_service_ratingErr = "";
$product_quality_ratingErr = "";

// Check if the user has submitted a rating
if (isset($_POST['submit_rating'])) {

  // Validate email
  if (empty($_POST["email"])) {
    $emailErr = " * Email is required";
  } else {
    $email = test_input($_POST["email"]);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $emailErr = "*Invalid Email Format!"; 
    }
  }

  // Validate shipping rating
  if (empty($_POST["shipping_rating"])) {
    $shipping_ratingErr = " * Rating is required";
  }

  // Validate customer service rating
  if (empty($_POST["customer_service_rating"])) {
    $customer_service_ratingErr = " * Rating is required";
  }

  // Validate product quality rating
  if (empty($_POST["product_quality_rating"])) {
    $product_quality_ratingErr = " * Rating is required";
  }

  // If all fields are valid, store the ratings in the session
  if ($emailErr == "" && $shipping_ratingErr == "" && $customer_service_ratingErr == "" && $product_quality_ratingErr == "") {
    $shipping_rating = $_POST['shipping_rating'];
    $customer_service_rating = $_POST['customer_service_rating'];
    $product_quality_rating = $_POST['product_quality_rating'];

    $_SESSION['email'] = $email;
    $_SESSION['shipping_rating'] = $shipping_rating;
    $_SESSION['customer_service_rating'] = $customer_service_rating;
    $_SESSION['product_quality_rating'] = $product_quality_rating;

    // Display a message to the user
    echo "Thank you for rating our services!";
  }
}

// This PHP function takes a string input and applies various sanitization techniques, such as removing whitespace and special characters, to ensure that the data is safe and secure for further processing.
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<!DOCTYPE html>
<html>
<head>
  <style>
    fieldset{
    background-color: lightblue;
    color: black;
  }
  </style>  
</head>
<body>
<fieldset> 
	<h1>Online Shoe Selling Store Service Rating</h1>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <br><br>
  Email：<input type="email" name="email" value="<?php echo $email;?>">
  <span class="error"><?php echo $emailErr;?></span>
  <br><br>
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

		<input type="submit" name="submit_rating" value="Submit Rating">
	</form>
</fieldset>
</body>
</html>

<?php
include 'footer.php'; 
?>