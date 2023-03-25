<!DOCTYPE HTML>  
<html>
<head>
<style>
.error {
  color: #FF0000;
  }
</style>
</head>
<body>  
  
  <?php

    include 'header.php'; 
  
?>

<?php

    $sizeErr = "";

    if(isset($_POST["submit"])){
        $sizeErr = "* Size is required";
    } 
?>

<?php
    $db_host = 'localhost';
    $db_user = 'root';
    $db_pass = '';
    $db_name = 'fyp';
    $conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);
?>

<?php
    $sql = "SELECT * FROM shoes WHERE shoe_id = 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
?>
<fieldset>
<h1><?php echo $row["shoe_name"]; ?></h1>
<p>Type: <?php echo $row["shoe_type"]; ?></p>
<p>Brand: <?php echo $row["shoe_brand"]; ?></p>
<p>Category: <?php echo $row["category"]; ?></p>
<img src="image/shoesimg/<?php echo $row["shoe_image"]; ?>" alt="<?php echo $row["shoe_name"]; ?>">
<p>Price: $<?php echo $row["shoe_price"]; ?></p>

<form action="" method="post">
    <label for="size">Size:</label>
    <input type="radio" name="size" value="6">6
    <input type="radio" name="size" value="7">7
    <input type="radio" name="size" value="8">8
    <input type="radio" name="size" value="9">9
    <input type="radio" name="size" value="10">10
    <span class="error"><?php echo $sizeErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Add to Cart">
</form>
</fieldset>


<?php mysqli_close($conn); ?>

</body>
</html>

<?php
    include 'footer.php';
   
?>