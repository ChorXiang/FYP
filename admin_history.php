<style>
        fieldset{
            color: black;      
            text-align: center;    
            margin-left: auto;
            margin-right: auto;
            width: 50%;
            background-color: #f2f2f2;
        }

    </style>
<?php
 
    include 'conn.php'; 
    include 'header.php'; 
?>

<?php
  $statusErr = "";
  $status = "";

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
$sql = "SELECT * FROM history where her_id=16";
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
    </fieldset>

    <form action="" method="post">
      <input type="radio" name="status" value="6">Pending
      <input type="radio" name="status" value="7">Delivering
      <input type="radio" name="status" value="7">Deliverd
      <span class="error"><?php echo $statusErr;?></span>
      <br><br>
      <input type="submit" name="order_status" value="Update Status">
    </form>
    <?php
    /*
    echo $her_id; 
    echo $her_shoesname; 
    echo $her_size; 
    echo $her_quantity; 
    echo $her_price; 
    echo $total; 
    echo $her_email; 
    */

    /*echo "Order ID: " . $row["her_id"]. "<br>";
    echo" - Shoes Name: " . $row["her_shoesname"]. "<br>";
    echo" - Shoes Size: " . $row["her_size"]. "<br>";
    echo" - Quantity: " . $row["her_quantity"]. "<br>";
    echo" - Shoes Price: RM" . $row["her_price"]. "<br>";
    //echo" - Total Price: " . $row[" "]. "<br>"
    echo" - Email: " . $row["her_email"]. "<br>";*/
    
  }
} else {
  echo "0 results";
}

?>
<?php
if (isset($_POST['order_status'])) {


// perform database insertion
if ($statusErr == "" ) {
// $sql = "INSERT INTO wishlist (shoesname, price, size) VALUES ('$shoe_name', '$shoe_price', '$size')";
mysqli_query($conn," INSERT INTO history set order_status='" . $_POST['status'] . "'");

if (mysqli_query($conn, $sql)) {

  $msg = "<div style='text-align:center; background-color:green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Add Successfully!</div>";
} else {
  $msg = "<div style='text-align:center; background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Error</div>";
}

mysqli_close($conn);
}  
}
?>
<?php echo "<div>".$msg."</div>"?>

<?php
    include 'footer.php';
?>
