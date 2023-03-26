<!DOCTYPE HTML>  
<html>
<head>
<style>
  .error {
  color: #FF0000;
  }

  .left{
    float:left;
    padding-left:80px ;
  }

  .right{
    float:right;
    padding-right:80px ;
  }
  .container
  {
  display: flex;
  justify-content: space-between;
  width: 100%;
  margin: 0 auto;
  border: 1px solid #ccc;
  padding: 20px;
  }

  .imgcenter {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
  }

  .wordcenter {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
  }
</style>
</head>
<body>  
  
  <?php

    include 'header.php'; 
    include 'conn.php'; 
?>

<?php

  $sizeErr = "";
  $size = "";
  $shoe_name = "";
  $shoe_price = "";
  $quantity = "";
  $quantityErr = "";
  

    if(isset($_POST["submit"])){
        if (empty($_POST["size"])) {
          $sizeErr = "* Size is required";
        } else {
          $size = test_input($_POST["size"]);
      }

        if (empty($_POST["quantity"])) {
          if (empty($_POST["quantity"])) {
            $quantityErr = "* Quantity is required";
          } else {
            $quantity = test_input($_POST["quantity"]);
        }
    }
  }
    
    if(isset($_POST["wishlist"])){
      if (empty($_POST["size"])) {
        $sizeErr = "* Size is required";
      } else {
        $size = test_input($_POST["size"]);
    }

  } 

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>

<?php
    $sql = "SELECT * FROM shoes WHERE shoe_id = 1";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
?>

<div class="container">
<div class="left">
<fieldset>
<div class="wordcenter">
<h2><b>PRODUCT IMAGE</b></h2><br>
</div>
<img src="image/shoesimg/<?php echo $row["shoe_image"]; ?>" alt="<?php echo $row["shoe_name"]; ?>" class="imgcenter">

</fieldset>
</div>

<div class='right'>
<fieldset>
<div class="wordcenter">
<h1><?php echo $row["shoe_name"]; ?></h1>
</div>
<p>Type: <?php echo $row["shoe_type"]; ?></p>
<p>Brand: <?php echo $row["shoe_brand"]; ?></p>
<p>Category: <?php echo $row["category"]; ?></p>
<p>Price: $<?php echo $row["shoe_price"]; ?></p>

<form action="" method="post">
  <input type="hidden" name="shoe_name" value="<?php echo $row['shoe_name']; ?>">
  <input type="hidden" name="shoe_price" value="<?php echo $row['shoe_price']; ?>">
  <br>
  <label for="quantity"><b>Quantity (Max 5):</b></label>
  <input type="number" name="quantity" id="quantity" min="1" max="5" required>
  <span class="error"><?php echo $quantityErr;?></span>
  <br>
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
<br>
<form action="" method="post">
  <input type="hidden" name="shoe_name" value="<?php echo $row['shoe_name']; ?>">
  <input type="hidden" name="shoe_price" value="<?php echo $row['shoe_price']; ?>">
  <button type="submit" name="size" value="6">Size 6</button>
  <button type="submit" name="size" value="7">Size 7</button>
  <button type="submit" name="size" value="8">Size 8</button>
  <button type="submit" name="size" value="9">Size 9</button>
  <button type="submit" name="size" value="10">Size 10</button>
  <span class="error"><?php echo $sizeErr;?></span>
  <br><br>
  <input type="submit" name="wishlist" value="Add to Wishlist">
</form>




</fieldset>
</div>
</div>

<?php
if (isset($_POST['submit'])) {
//名字要改
  $shoe_name = $_POST['shoe_name'];
  $shoe_price = $_POST['shoe_price'];
  $quantity = $_POST['quantity'];
  $size = $_POST['size'];

  // perform database insertion
  $sql = "INSERT INTO orders (shoesname, price, quantity, shoessize) VALUES ('$shoe_name', '$shoe_price', '$quantity', '$size')";
  if (mysqli_query($conn, $sql)) {
    echo "Add Successfully!";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
}  
?>
<?php

if (isset($_POST['wishlist'])) {
  $shoe_name = $_POST['shoe_name'];
  $shoe_price = $_POST['shoe_price'];
  $size = $_POST['size'];

  // perform database insertion
  if ($sizeErr == "" ) {
  $sql = "INSERT INTO wishlist (shoesname, price, size) VALUES ('$shoe_name', '$shoe_price', '$size')";
  if (mysqli_query($conn, $sql)) {
    echo "Add Successfully!";
  } else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }

  mysqli_close($conn);
  }  
}
?>
</body>
</html>

<?php
    include 'footer.php';
?>