<?php
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'fyp';
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
?>
<?php
// Retrieve the shoe information

//$shoe_id = $_GET["id"]; // assuming the shoe ID is passed as a query parameter
$sql = "SELECT * FROM shoes WHERE shoe_id = 1";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// $shoe_id = $_GET["id"]; // assuming the shoe ID is passed as a query parameter
// $sql = "SELECT * FROM shoes WHERE shoe_id = $shoe_id";
// $result = mysqli_query($conn, $sql);
// $row = mysqli_fetch_assoc($result);

// Display the shoe information
echo "<h1>" . $row["shoe_name"] . "</h1>";
echo "<p>Type: " . $row["shoe_type"] . "</p>";
echo "<p>Brand: " . $row["shoe_brand"] . "</p>";
echo "<p>Category: " . $row["category"] . "</p>";
echo "<img src='" . $row["shoe_image"] . "' alt='" . $row["shoe_name"] . "'>";
echo "<p>Price: $" . $row["shoe_price"] . "</p>";

// Display the shoe size buttons
$sizes = explode(",", $row["shoe_size"]);
echo "<p>Select a size:</p>";
foreach ($sizes as $size) {
  echo "<button>" . $size . "</button>";
}

// Display the shoe size checkboxes
$sizes = explode(",", $row["shoe_size"]);
echo "<p>Select sizes:</p>";
foreach ($sizes as $size) {
  echo "<label><input type='checkbox' name='sizes[]' value='" . $size . "'>" . $size . "</label><br>";
}


// Close the database connection
mysqli_close($conn);
?>
