<?php
include 'conn.php'; 
include 'header.php'; 

// Select data from the history table
$sql = "SELECT * FROM history LIMIT 10"; // Retrieve the first 10 rows from the table
$result = mysqli_query($conn, $sql);

// Display the data in a table
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>ID</th><th>Shoes Name</th><th>Size</th><th>Quantity</th><th>Price</th><th>Email</th></tr>";
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>".$row["her_id"]."</td>";
        echo "<td>".$row["her_shoesname"]."</td>";
        echo "<td>".$row["her_size"]."</td>";
        echo "<td>".$row["her_quantity"]."</td>";
        echo "<td>".$row["her_price"]."</td>";
        echo "<td>".$row["her_email"]."</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No data found.";
}

// Close the database connection
mysqli_close($conn);
?>

<?php
    include 'footer.php';
?>