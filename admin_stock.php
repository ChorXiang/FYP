<?php
      include 'conn.php'; 
      include 'adminheader.php'; 
      $msg='';
  ?>


<?php
$sid = $_GET['shoe_id'];
$sql = "SELECT * FROM stock WHERE shoe_id = $sid";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Get the new stock quantity from the form
    $size_7 = $_POST['size_7'];
    $size_7_5 = $_POST['size_7_5'];
    $size_8 = $_POST['size_8'];
    $size_8_5 = $_POST['size_8_5'];
    $size_9 = $_POST['size_9'];
    $size_9_5 = $_POST['size_9_5'];
    $size_10 = $_POST['size_10'];
    $size_10_5 = $_POST['size_10_5'];
    $size_11 = $_POST['size_11'];
    $size_11_5 = $_POST['size_11_5'];
    $size_12 = $_POST['size_12'];
    $size_12_5 = $_POST['size_12_5'];

    // Update the stock quantity in the database
    $sql = "UPDATE stock SET
                size_7 = $size_7,
                size_7_5 = $size_7_5,
                size_8 = $size_8,
                size_8_5 = $size_8_5,
                size_9 = $size_9,
                size_9_5 = $size_9_5,
                size_10 = $size_10,
                size_10_5 = $size_10_5,
                size_11 = $size_11,
                size_11_5 = $size_11_5,
                size_12 = $size_12,
                size_12_5 = $size_12_5
            WHERE shoe_id = $sid";
    if (mysqli_query($conn, $sql)) {

        $msg = "<div style='text-align:center; background-color:green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Update Successfully!</div>";
        echo '<script>alert("Update Successfully !");</script>';
     
        echo '<script>
            function confirmRedirect() {
                if (confirm("Do you want to go to admin_shoes.php?")) {
                    window.location.href = "admin_shoes.php?admin_id=' . $id . '";
                }
            }
            confirmRedirect();
         </script>';
      } else {
        $msg = "<div style='text-align:center; background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Error</div>";
      }
}

// Display the form with the current stock quantity
?>
<!DOCTYPE HTML>  
<html>
<head>
<style>
    fieldset
    {
        padding-left: 200px;
        width: 50%;
        height: 50%;
    }
    .butttonright{
      float:right;
    }
</style>
</head>
<body>  

<fieldset>
<h1>Shoe ID:<?php echo $row["shoe_id"]; ?></h1>
<form method="POST">
    <label>Size 7&nbsp;&nbsp;&nbsp;&nbsp; :</label>
    <input type="number" name="size_7" value="<?php echo $row['size_7']; ?>" min="0" max="10" required><br>

    <label>Size 7.5&nbsp;&nbsp;:</label>
    <input type="number" name="size_7_5" value="<?php echo $row['size_7_5']; ?>" min="0" max="10" required><br>

    <label>Size 8&nbsp;&nbsp;&nbsp;&nbsp;    :</label>
    <input type="number" name="size_8" value="<?php echo $row['size_8']; ?>" min="0" max="10" required><br>

    <label>Size 8.5&nbsp;&nbsp;:</label>
    <input type="number" name="size_8_5" value="<?php echo $row['size_8_5']; ?>" min="0" max="10" required><br>

    <label>Size 9&nbsp;&nbsp;&nbsp;&nbsp; :</label>
    <input type="number" name="size_9" value="<?php echo $row['size_9']; ?>" min="0" max="10" required><br>

    <label>Size 9.5&nbsp;&nbsp;:</label>
    <input type="number" name="size_9_5" value="<?php echo $row['size_9_5']; ?>" min="0" max="10" required><br>

    <label>Size 10&nbsp;&nbsp; :</label> 
    <input type="number" name="size_10" value="<?php echo $row['size_10']; ?>" min="0" max="10" required><br>

    <label>Size 10.5:</label>
    <input type="number" name="size_10_5" value="<?php echo $row['size_10_5']; ?>" min="0" max="10" required><br>

    <label>Size 11&nbsp;&nbsp;&nbsp;:</label>
    <input type="number" name="size_11" value="<?php echo $row['size_11']; ?>" min="0" max="10" required><br>

    <label>Size 11.5:</label>
    <input type="number" name="size_11_5" value="<?php echo $row['size_11_5']; ?>" min="0" max="10" required><br>

    <label>Size 12&nbsp;&nbsp; :</label>
    <input type="number" name="size_12" value="<?php echo $row['size_12']; ?>" min="0" max="10" required><br>

    <label>Size 12.5:</label>
    <input type="number" name="size_12_5" value="<?php echo $row['size_12_5']; ?>" min="0" max="10" required><br>

    <br>
    <input type="submit" name="submit" value="Update Stock">

    <div class="butttonright">
        <a href="admin_product.php?shoe_id=<?php echo $row["shoe_id"];?>">Back to Previous Page </a>
    </div>
</form>

    <?php echo "<div>".$msg."</div>"?>
</fieldset>

</body>
</html>