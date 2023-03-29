<?php
include 'header.php'; 
include 'conn.php'; 

// If the form is submitted, update the record
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $shoe_id = $_POST["shoe_id"];
  $shoe_name = $_POST["shoe_name"];
  $shoe_type = $_POST["shoe_type"];
  $shoe_brand = $_POST["shoe_brand"];
  $category = $_POST["category"];
  $shoe_image = $_POST["shoe_image"];
  $shoe_size = $_POST["shoe_size"];
  $shoe_price = $_POST["shoe_price"];
  $stock = $_POST["stock"];

  $sql = "UPDATE shoes SET shoe_name='$shoe_name', shoe_type='$shoe_type', shoe_brand='$shoe_brand', category='$category', shoe_image='$shoe_image', shoe_size='$shoe_size', shoe_price='$shoe_price', stock='$stock' WHERE shoe_id=$shoe_id";

  if ($conn->query($sql) === TRUE) {
    echo "Record updated successfully";
  } else {
    echo "Error updating record: " . $conn->error;
  }
}

// Get the shoe record to be edited
//$requested_shoe_id = $_GET["shoe_id"];

$sql = "SELECT * FROM shoes WHERE shoe_id=1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
} else {
  echo "No record found";
}

$conn->close();

?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
  <input type="hidden" name="shoe_id" value="<?php echo $row["shoe_id"]; ?>">
  Shoe Name: <input type="text" name="shoe_name" value="<?php echo $row["shoe_name"]; ?>"><br>
  Shoe Type: <input type="text" name="shoe_type" value="<?php echo $row["shoe_type"]; ?>"><br>
  Shoe Brand: <input type="text" name="shoe_brand" value="<?php echo $row["shoe_brand"]; ?>"><br>
  Category:
  <input type="radio" name="category" value="male" <?php if($row["category"]=="male"){echo "checked";} ?>> Male
  <input type="radio" name="category" value="female" <?php if($row["category"]=="female"){echo "checked";} ?>> Female<br>
  Shoe Image: <input type="text" name="shoe_image" value="<?php echo $row["shoe_image"]; ?>"><br>
  Shoe Size: <input type="text" name="shoe_size" value="<?php echo $row["shoe_size"]; ?>"><br>
  Shoe Price: <input type="text" name="shoe_price" value="<?php echo $row["shoe_price"]; ?>"><br>
  Stock: <input type="text" name="stock" value="<?php echo $row["stock"]; ?>"><br>
  <input type="submit" name="submit" value="Update">
</form>

<?php
    include 'footer.php';
?>