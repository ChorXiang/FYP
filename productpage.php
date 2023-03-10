<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shoesshop";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

include 'config.php'; 
include 'header.php'; 

// SQL query to retrieve all data from shoes table
$sql = "SELECT * FROM shoes";
$result = $conn->query($sql);

// Check if there are any rows returned
if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {

?>

<?php
    echo "Shoe ID: " . $row["shoe_id"]. " - Shoe Name: " . $row["shoe_name"]. " - Shoe Type: " . $row["shoe_type"]. " - Shoe Image: " . $row["shoe_image"]. " - Shoe Size: " . $row["shoe_size"]. " - Shoe Price: $" . $row["shoe_price"]. "<br>";
  }
} else {
  echo "0 results";
}

// Close connection
$conn->close();

include 'footer.php'; 
?>
