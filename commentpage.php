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
      $msg='';
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
function test_input($data) 
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<style>
  fieldset
  {
    background-color: lightgrey;
    color: black;
  }

  input[type="submit"]
  {
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

  input[type="submit"]:hover
  {
    border-color: #2691d9;
    transition: .5s;
  }

  .black
  {
    text-align: center;
    color: black;
  }
  sup
  {
    color:red;
  }
  table 
  {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th 
{
  border: 1px solid lightgrey;
  text-align: left;
  padding: 8px;
  font-size: 25px;

}
td.let
{
  width: 25%;
}


  
</style>

<fieldset> 
  <div class="black">
    
<h1>Online Shoe Selling Store Service Rating</h1>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <table>
      <tr>
        <td class="let"> </td>
        <td><b>Email<sup>* </sup> </b></td>
        <td>: <input type="email" name="email" value="<?php echo $email;?>"> <span class="error"><?php echo $emailErr;?></span></td>
        <td class="let"> </td>
      </tr>
      <tr>
        <td class="let"> </td>
        <td><label for="Shipping Service"><b>Shipping Service Rating (1-5) <sup>* </sup></b></label></td>
        <td>: <input type="number" name="shipping_rating" id="shipping_rating" min="1" max="5" required><span class="error"><?php echo $shipping_ratingErr;?></span></td>
        <td class="let"> </td>
      </tr>
      <tr>
        <td class="let"> </td>
        <td><label for="Customer Service"><b>Customer Service Rating (1-5) <sup>* </sup></b></label></td>
        <td>: <input type="number" name="customer_service_rating" id="customer_service_rating" min="1" max="5" required><span class="error"><?php echo $customer_service_ratingErr;?></span></td>
        <td class="let"> </td>
      </tr>
      <tr>
        <td class="let"> </td>
        <td><label for="Product Quality"><b>Product Quality Rating (1-5) <sup>* </sup></b></label></td>
        <td>: <input type="number" name="product_quality_rating" id="product_quality_rating" min="1" max="5" required><span class="error"><?php echo $product_quality_ratingErr;?></span></td>
        <td class="let"> </td>
      </tr>
      <tr>
        <td class="let"> </td>
        <td><label for="User Interface"><b>User Interface Rating (1-5) <sup>* </sup></b></label></td>
        <td>: <input type="number" name="user_interface_rating" id="user_interface_rating" min="1" max="5" required><span class="error"><?php echo $user_interface_ratingErr;?></span></td>
        <td class="let"> </td>
      </tr>
      <tr>
        <td class="let"> </td>
        <td><b>Message: <sup>* </sup></b></td>
        <td> <textarea name="message" rows="5" cols="40"></textarea><span class="error"><br><?php echo $messageErr;?></span></td>
        <td class="let"> </td>
      </tr>
    </table>

		<input type="submit" name="submit_rating" value="Submit Rating">
    
<?php echo "<div>".$msg."</div>"?>
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
           
            $msg = "<div style='background-color: green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Rating Send Successfully !</div>";
   
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
