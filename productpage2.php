<?php

// Replace the values in brackets with your own database credentials
$host = "localhost";
$dbname = "fyp";
$username = "root";
$password = "";

try {
  $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
  // Set the PDO error mode to exception
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

// Get the shoe ID from the request, or use a default of 1
$shoe_id = isset($_REQUEST['shoe_id']) ? $_REQUEST['shoe_id'] : 1;

// Prepare a SQL statement to retrieve the shoe with the specified ID
$stmt = $pdo->prepare("SELECT * FROM shoes WHERE shoe_id = ?");
$stmt->execute([$shoe_id]);

// If the shoe was found, display its information
if ($shoe = $stmt->fetch(PDO::FETCH_ASSOC)) {
    echo "<h2>" . $shoe['shoe_name'] . "</h2>";
    echo "<p>Brand: " . $shoe['shoe_brand'] . "</p>";
    echo "<p>Type: " . $shoe['shoe_type'] . "</p>";
    echo "<p>Category: " . $shoe['category'] . "</p>";
    echo "<p>Size: " . $shoe['shoe_size'] . "</p>";
    echo "<p>Price: $" . $shoe['shoe_price'] . "</p>";
    echo "<img src='" . $shoe['shoe_image'] . "' alt='" . $shoe['shoe_name'] . "'>";
} else {
    // If no shoe was found with the given ID, display an error message
    echo "<p>Sorry, we could not find a shoe with ID " . $shoe_id . ".</p>";
}
?>
