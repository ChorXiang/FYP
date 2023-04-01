<?php
 
    include 'conn.php'; 
    include 'header.php'; 

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
    include 'footer.php';
?>
