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
$email = "";
$shipping_rating = "";
$customer_service_rating = "";
$product_quality_rating = "";
$user_interface_rating = "";
$message = "";

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

  .black{
    text-align: center;
    color: black;
  }
  
</style>

<fieldset> 
  <div class="black">
    <h1>Online Shoe Selling Store Service Rating</h1>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <br><br>
    <b>Email：</b><input type="email" name="email" value="<?php echo $email;?>">
    <span class="error"><?php echo $emailErr;?></span>
    <br><br>
    <label for="Shipping Service"><b>Shipping Service Rating (1-5):</b></label>
    <input type="number" name="shipping_rating" id="shipping_rating" min="1" max="5" required>
    <span class="error"><?php echo $shipping_ratingErr;?></span>
    <br><br>
    <label for="Customer Service"><b>Customer Service Rating (1-5):</b></label>
    <input type="number" name="customer_service_rating" id="customer_service_rating" min="1" max="5" required>
    <span class="error"><?php echo $customer_service_ratingErr;?></span>
    <br><br>
    <label for="Product Quality"><b>Product Quality Rating (1-5):</b></label>
    <input type="number" name="product_quality_rating" id="product_quality_rating" min="1" max="5" required>
    <span class="error"><?php echo $product_quality_ratingErr;?></span>
    <br><br>
    <label for="User Interface"><b>User Interface Rating (1-5):</b></label>
    <input type="number" name="user_interface_rating" id="user_interface_rating" min="1" max="5" required>
    <span class="error"><?php echo $user_interface_ratingErr;?></span>
    <br><br>
  
    <h2><b>Message:</b></h2>
    <textarea name="message" rows="5" cols="40"></textarea>
    <span class="error"><br><?php echo $messageErr;?></span>
    <br><br>

		<input type="submit" name="submit_rating" value="Submit Rating">
	</form>
</div>
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
