<?php
      include 'conn.php'; 
      include 'adminheader.php'; 
      $msg='';
      $id =$_GET['admin_id']; 
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

mysqli_query($conn, "UPDATE wishlist SET stock='" . $_POST['stockk'] . "' WHERE pro_id = '$sid' AND size IN ('7', '7.5', '8', '8.5', '9', '9.5', '10', '10.5', '11', '11.5', '12', '12.5')");
mysqli_query($conn, "UPDATE orders SET stock='" . $_POST['stockk'] . "' WHERE pro_id = '$sid' AND shoessize IN ('7', '7.5', '8', '8.5', '9', '9.5', '10', '10.5', '11', '11.5', '12', '12.5')");


// mysqli_query($conn,"UPDATE orders set  stock='" . $_POST['stockk'] . "' where pro_id = '$sid' && size='7'");     
// mysqli_query($conn,"UPDATE orders set  stock='" . $_POST['stockk'] . "' where pro_id = '$sid' && size='7.5'");  
// mysqli_query($conn,"UPDATE orders set  stock='" . $_POST['stockk'] . "' where pro_id = '$sid' && size='8'");  
// mysqli_query($conn,"UPDATE orders set  stock='" . $_POST['stockk'] . "' where pro_id = '$sid' && size='8.5'");  
// mysqli_query($conn,"UPDATE orders set  stock='" . $_POST['stockk'] . "' where pro_id = '$sid' && size='9'");  
// mysqli_query($conn,"UPDATE orders set  stock='" . $_POST['stockk'] . "' where pro_id = '$sid' && size='9.5'");  
// mysqli_query($conn,"UPDATE orders set  stock='" . $_POST['stockk'] . "' where pro_id = '$sid' && size='10'");  
// mysqli_query($conn,"UPDATE orders set  stock='" . $_POST['stockk'] . "' where pro_id = '$sid' && size='10.5'");  
// mysqli_query($conn,"UPDATE orders set  stock='" . $_POST['stockk'] . "' where pro_id = '$sid' && size='11'");  
// mysqli_query($conn,"UPDATE orders set  stock='" . $_POST['stockk'] . "' where pro_id = '$sid' && size='11.5'");  
// mysqli_query($conn,"UPDATE orders set  stock='" . $_POST['stockk'] . "' where pro_id = '$sid' && size='12'");  
// mysqli_query($conn,"UPDATE orders set  stock='" . $_POST['stockk'] . "' where pro_id = '$sid' && size='12.5'");         
    
// mysqli_query($conn,"UPDATE wishlist set  stock='" . $_POST['stockk'] . "'  where pro_id = '$sid'  && size='7' ");    
// mysqli_query($conn,"UPDATE wishlist set  stock='" . $_POST['stockk'] . "'  where pro_id = '$sid'  && size='7.5' ");  
// mysqli_query($conn,"UPDATE wishlist set  stock='" . $_POST['stockk'] . "'  where pro_id = '$sid'  && size='8' ");  
// mysqli_query($conn,"UPDATE wishlist set  stock='" . $_POST['stockk'] . "'  where pro_id = '$sid'  && size='8.5' ");  
// mysqli_query($conn,"UPDATE wishlist set  stock='" . $_POST['stockk'] . "'  where pro_id = '$sid'  && size='9' ");  
// mysqli_query($conn,"UPDATE wishlist set  stock='" . $_POST['stockk'] . "'  where pro_id = '$sid'  && size='9.5' ");  
// mysqli_query($conn,"UPDATE wishlist set  stock='" . $_POST['stockk'] . "'  where pro_id = '$sid'  && size='10' ");  
// mysqli_query($conn,"UPDATE wishlist set  stock='" . $_POST['stockk'] . "'  where pro_id = '$sid'  && size='10.5' ");  
// mysqli_query($conn,"UPDATE wishlist set  stock='" . $_POST['stockk'] . "'  where pro_id = '$sid'  && size='11' ");  
// mysqli_query($conn,"UPDATE wishlist set  stock='" . $_POST['stockk'] . "'  where pro_id = '$sid'  && size='11.5' ");  
// mysqli_query($conn,"UPDATE wishlist set  stock='" . $_POST['stockk'] . "'  where pro_id = '$sid'  && size='12' ");  
// mysqli_query($conn,"UPDATE wishlist set  stock='" . $_POST['stockk'] . "'  where pro_id = '$sid'  && size='12.5' ");          
    
            
    if (mysqli_query($conn, $sql)) {
        
        // mysqli_query($conn,"UPDATE orders set   stock='" . $_POST['shoe_price'] . "'  where pro_id = '$sid'");            
    
        // mysqli_query($conn,"UPDATE wishlist set  shoe_brand='" . $_POST['brand'] . "', shoe_image='" . $_POST['shoe_image'] . "', price='" . $_POST['shoe_price'] . "'  where pro_id = '$sid'");            

        $msg = "<div style='text-align:center; background-color:green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Update Successfully!</div>";
        echo '<script>alert("Update Successfully !");</script>';
     
        echo '<script>
            function confirmRedirect() {
                if (confirm("Do you want to go to manage product page?")) {
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
        background-color: lightgray;
        margin: auto;
        margin-left: 25%;
        margin-right: 25%;
        padding-left: 20px;
        width: 50%;
        height: 50%;
    }

    .butttonright{
      float:right;
      font-size: 20px;
    }

    input[type='submit']
    {
        font-size: 20px;
    }

</style>
</head>
<body>  

<fieldset>
<h1>Shoe ID:<?php echo $row["shoe_id"]; ?></h1>
<form method="POST">
    <label>Size 7&nbsp;&nbsp;&nbsp;&nbsp; :</label>
    <input type="number" name="size_7" value="<?php echo $row['size_7']; ?>" min="0" max="100" required><br>
    <input type="hidden" name="stockk" value="<?php echo $row['size_7']; ?>" min="0" max="100" ><br>

    <label>Size 7.5&nbsp;&nbsp;:</label>
    <input type="number" name="size_7_5" value="<?php echo $row['size_7_5']; ?>" min="0" max="100" required><br>
    <input type="hidden" name="stockk" value="<?php echo $row['size_7_5']; ?>" min="0" max="100" ><br>

    <label>Size 8&nbsp;&nbsp;&nbsp;&nbsp;    :</label>
    <input type="number" name="size_8" value="<?php echo $row['size_8']; ?>" min="0" max="100" required><br>
    <input type="hidden" name="stockk" value="<?php echo $row['size_8']; ?>" min="0" max="100" ><br>

    <label>Size 8.5&nbsp;&nbsp;:</label>
    <input type="number" name="size_8_5" value="<?php echo $row['size_8_5']; ?>" min="0" max="100" required><br>
    <input type="hidden" name="stockk" value="<?php echo $row['size_8_5']; ?>" min="0" max="100" ><br>

    <label>Size 9&nbsp;&nbsp;&nbsp;&nbsp; :</label>
    <input type="number" name="size_9" value="<?php echo $row['size_9']; ?>" min="0" max="100" required><br>
    <input type="hidden" name="stockk" value="<?php echo $row['size_9']; ?>" min="0" max="100" ><br>

    <label>Size 9.5&nbsp;&nbsp;:</label>
    <input type="number" name="size_9_5" value="<?php echo $row['size_9_5']; ?>" min="0" max="100" required><br>
    <input type="hidden" name="stockk" value="<?php echo $row['size_9_5']; ?>" min="0" max="100" ><br>

    <label>Size 10&nbsp;&nbsp; :</label> 
    <input type="number" name="size_10" value="<?php echo $row['size_10']; ?>" min="0" max="100" required><br>
    <input type="hidden" name="stockk" value="<?php echo $row['size_10']; ?>" min="0" max="100" ><br>

    <label>Size 10.5:</label>
    <input type="number" name="size_10_5" value="<?php echo $row['size_10_5']; ?>" min="0" max="100" required><br>
    <input type="hidden" name="stockk" value="<?php echo $row['size_10_5']; ?>" min="0" max="100" ><br>

    <label>Size 11&nbsp;&nbsp;&nbsp;:</label>
    <input type="number" name="size_11" value="<?php echo $row['size_11']; ?>" min="0" max="100" required><br>
    <input type="hidden" name="stockk" value="<?php echo $row['size_11']; ?>" min="0" max="100" ><br>

    <label>Size 11.5:</label>
    <input type="number" name="size_11_5" value="<?php echo $row['size_11_5']; ?>" min="0" max="100" required><br>
    <input type="hidden" name="stockk" value="<?php echo $row['size_11_5']; ?>" min="0" max="100" ><br>

    <label>Size 12&nbsp;&nbsp; :</label>
    <input type="number" name="size_12" value="<?php echo $row['size_12']; ?>" min="0" max="100" required><br>
    <input type="hidden" name="stockk" value="<?php echo $row['size_12']; ?>" min="0" max="100" ><br>

    <label>Size 12.5:</label>
    <input type="number" name="size_12_5" value="<?php echo $row['size_12_5']; ?>" min="0" max="100" required><br>
    <input type="hidden" name="stockk" value="<?php echo $row['size_12_5']; ?>" min="0" max="100" ><br>

    <br>
    <input type="submit" name="submit" value="Update Stock">

    <div class="butttonright">
        <a href="admin_productnew.php?shoe_id=<?php echo $row["shoe_id"]?>&&admin_id=<?php echo $id ?>">Back to Previous Page </a>
    </div>
</form>

    <?php echo "<div>".$msg."</div>"?>
</fieldset>

</body>
</html>