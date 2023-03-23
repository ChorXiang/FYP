<?php
include 'header.php'; 
include 'conn.php'; 
?>

<?php
// Retrieve comments from database
$sql = "SELECT * FROM comment";
$result = $conn->query($sql);

// Check if there are any comments
if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "<p><strong>Email:</strong> " . $row["email"] . "</p>";
    echo "<p><strong>User Interface Rating:</strong> " . $row["user_interface_rating"] . "</p>";
    echo "<p><strong>Shipping Rating:</strong> " . $row["shipping_rating"] . "</p>";
    echo "<p><strong>Customer Service Rating:</strong> " . $row["customer_service_rating"] . "</p>";
    echo "<p><strong>Product Quality Rating:</strong> " . $row["product_quality_rating"] . "</p>";
    echo "<p><strong>Message:</strong> " . $row["message"] . "</p>";
    echo "<p><strong>Created At:</strong> " . $row["created_at"] . "</p>";
    echo "<hr>";
  }
} else {
  echo "No comments yet.";
}

$conn->close();
?>

<?php
include 'footer.php'; 
?>