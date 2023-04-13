<?php
 
    include 'conn.php'; 
    
?>

<!DOCTYPE HTML>  
<html>
<head>
  <style>
        fieldset{
            color: black;      
            text-align: center;    
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            background-color: #f2f2f2;
        }

        .error {
          color: #FF0000;
        }

    </style>
</head>
<body>  

<?php
  $statusErr = "";
  $status = " ";
  $msg = "";
  
  if(isset($_POST["order_status"])){
    if (empty($_POST["status"])) {
      $statusErr = "* Order status is required";
    } else {
      $status = test_input($_POST["status"]);
    }
  } 
  

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<?php
// SQL query to retrieve all data from shoes table
$sql = "SELECT * FROM history where her_id=1";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {

    $her_id = $row["her_id"];
    $her_shoesname = $row["her_shoesname"];
    $her_size = $row["her_size"];
    $her_quantity = $row["her_quantity"];
    $her_price = $row["her_price"];
    $her_email = $row["her_email"];    
    $total =0;
    $subtotal=$her_price*$her_quantity;
    $total =  $total + $subtotal;
    $status = $row["order_status"];           
    ?>

    <fieldset>
    <br>Order ID: <?php echo $her_id; ?><br>
    <br>Shoes Name: <?php echo $her_shoesname; ?><br>
    <br>Shoes Size: <?php echo $her_size; ?><br>
    <br>Quantity: <?php echo $her_quantity; ?><br>
    <br>Shoes Price: RM <?php echo $her_price; ?><br>
    <br>Total Price: RM <?php echo $total; ?><br>
    <br>Email: <?php echo $her_email; ?><br>
    <br>Order Status: <?php echo $status; ?><br>

    <form action="" method="post">
      <input type="hidden" name="her_id" value="<?php echo $row['her_id']; ?>">
      <input type="hidden" name="her_shoesname" value="<?php echo $row['her_shoesname']; ?>">
      <input type="hidden" name="her_size" value="<?php echo $row['her_size']; ?>">
      <input type="hidden" name="her_quantity" value="<?php echo $row['her_quantity']; ?>">
      <input type="hidden" name="her_price" value="<?php echo $row['her_price']; ?>">
      <input type="hidden" name="her_email" value="<?php echo $row['her_email']; ?>">  
      <input type="hidden" name="user_id" value="<?php echo $row['user_id']; ?>">  
      <input type="radio" name="status" value="Pending">Pending
      <input type="radio" name="status" value="Delivering">Delivering
      <input type="radio" name="status" value="Deliverd">Deliverd
      <span class="error"><br><?php echo $statusErr;?></span>
      <br><br>
      <input type="submit" name="order_status" value="Update Status">
    </form>
    </fieldset>

    
    <?php
  
  }
} else {
  echo "0 results";
}

?>
<?php

$statusErr = "";
$msg = "";
$status = "";

if(isset($_POST["order_status"])){
  if (empty($_POST["status"])) {
    $statusErr = "* Order status is required";
  } else {
    $status = test_input($_POST["status"]);
  }


  // perform database update
  if ($statusErr == "") {
  
    $sql = "UPDATE history SET order_status='$status' WHERE her_id='1'";


    if (mysqli_query($conn, $sql)) {
      $msg = "<div style='text-align:center; background-color:green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Edit Successfully!</div>";
  } else {
    $msg = "<div style='text-align:center; background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Error</div>";
  }

  mysqli_close($conn);
  }  
}
?>
<?php echo "<div>".$msg."</div>"?>
</body>
</html>
