<?php
include 'header.php'; 
include 'conn.php'; 
?>

<?php

// Check if the user has submitted a rating
if (isset($_POST['submit_rating'])) {

  if (isset($_POST['email'])) {
    $email = $_POST['email'];
  }
    // Get the user's ratings for each service
    $shipping_rating = $_POST['shipping_rating'];
    $customer_service_rating = $_POST['customer_service_rating'];
    $product_quality_rating = $_POST['product_quality_rating'];

    // Store the ratings in the session
    $_SESSION['email'] = $email;
    $_SESSION['shipping_rating'] = $shipping_rating;
    $_SESSION['customer_service_rating'] = $customer_service_rating;
    $_SESSION['product_quality_rating'] = $product_quality_rating;

    // Display a message to the user
    echo "Thank you for rating our services!";
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
    <label for="email">Email:</label>
    <input type="text" name="email" id="email" required>
    <br>
		<h2>Shipping</h2>
		<input type="radio" name="shipping_rating" value="1">1
		<input type="radio" name="shipping_rating" value="2">2
		<input type="radio" name="shipping_rating" value="3">3
		<input type="radio" name="shipping_rating" value="4">4
		<input type="radio" name="shipping_rating" value="5">5
		<br>

		<h2>Customer Service</h2>
		<input type="radio" name="customer_service_rating" value="1">1
		<input type="radio" name="customer_service_rating" value="2">2
		<input type="radio" name="customer_service_rating" value="3">3
		<input type="radio" name="customer_service_rating" value="4">4
		<input type="radio" name="customer_service_rating" value="5">5
		<br>

		<h2>Product Quality</h2>
		<input type="radio" name="product_quality_rating" value="1">1
		<input type="radio" name="product_quality_rating" value="2">2
		<input type="radio" name="product_quality_rating" value="3">3
		<input type="radio" name="product_quality_rating" value="4">4
		<input type="radio" name="product_quality_rating" value="5">5
		<br>

		<input type="submit" name="submit_rating" value="Submit Rating">
	</form>
</fieldset>
</body>
</html>

<?php
include 'footer.php'; 
?>