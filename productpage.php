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
    $msg='';

    
    
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
            $quantityErr = "* Quantity is required";
          } else {
            $quantity = test_input($_POST["quantity"]);
        }
    }
  
    
  if(isset($_POST["wishlist"])){
    if (empty($_POST["size"])) {
      $sizeErr = "* Size is required";
    } else {
      $size = test_input($_POST["size"]);
      $id = $_POST["id"]; // retrieve the value of $id from the form
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
    $id =$_GET['user_id']; 
    $sid = $_GET['shoe_id'];
    $sql = "SELECT * FROM shoes WHERE shoe_id = $sid ";
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
<p>Price: RM<?php echo $row["shoe_price"]; ?></p>

<form action="" method="post">
  <input type="hidden" name="shoe_name" value="<?php echo $row['shoe_name']; ?>"><input type="hidden" name="shoe_img" value="<?php echo $row['shoe_image']; ?>">
  <input type="hidden" name="shoe_price" value="<?php echo $row['shoe_price']; ?>">  <input type="hidden" name="shoe_id" value="<?php echo $row['shoe_id']; ?>">
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  <br>
  <label for="size"  >Shoe Size:</label>
                <select id="size" name="size">
                    <option value="7.5">7.5 </option>
                    <option value="8">8</option>
                    <option value="8.5">8.5</option>
                    <option value="9">9</option>
                    <option value="9.5">9.5</option>
                    <option value="10">10</option>
                    <option value="10.5">10.5</option>
                    <option value="11">11</option>
                    <option value="11.5">11.5</option>
                    <option value="12">12</option>
                    <option value="12.5">12.5</option>
                </select>
  <br>
  <label for="quantity"><b>Quantity (Max 5):</b></label>
  <input type="number" name="quantity" id="quantity" min="1" max="5" required>
  <span class="error"><?php echo $quantityErr;?></span>
  <br><br>
  <input type="submit" name="submit" value="Add to Cart">
</form>

<form action="" method="post">
  <input type="hidden" name="shoe_name" value="<?php echo $row['shoe_name']; ?>"><input type="hidden" name="shoe_img" value="<?php echo $row['shoe_image']; ?>">
  <input type="hidden" name="shoe_price" value="<?php echo $row['shoe_price']; ?>"> <input type="hidden" name="shoe_id" value="<?php echo $row['shoe_id']; ?>">
  <input type="hidden" name="id" value="<?php echo $id; ?>"><br>
  <label for="size"  >Shoe Size:</label>
                <select id="size" name="size">
                    <option value="7">7</option>
                    <option value="7.5">7.5 </option>
                    <option value="8">8</option>
                    <option value="8.5">8.5</option>
                    <option value="9">9</option>
                    <option value="9.5">9.5</option>
                    <option value="10">10</option>
                    <option value="10.5">10.5</option>
                    <option value="11">11</option>
                    <option value="11.5">11.5</option>
                    <option value="12">12</option>
                    <option value="12.5">12.5</option>
                </select>
  <br><br>
  <input type="submit" name="wishlist" value="Add to Wishlist">
</form>




</fieldset>

</div>

<option value="7">7 </option>
</div>

  <?php
$sizeErr = "";
$size = "";
$shoe_name = "";
$shoe_price = "";
$quantity = "";
$quantityErr = "";
$proid= "";
$stockk= "";
$image = "";

if (isset($_POST['submit'])) {

  $shoe_name = $_POST['shoe_name'];
  $shoe_price = $_POST['shoe_price'];
  $quantity = $_POST['quantity'];
  $size = $_POST['size'];
  $id = $_POST['id'];
  $proid = $_POST['shoe_id'];

  $image = $_POST['shoe_img'];
  $msg='';

  if (empty($size)) {
    $sizeErr = "* Size is required";
} else {
    $size = test_input($size);
    $sql = "SELECT * FROM stock";
    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_assoc($result);

    if ($size % 2 == 0 || $size == 9 || $size == 11 ) {
        echo '<input type="hidden" name="shoe_stock" value="' . $row['size_' . $size] . '">';
        $stockk = $row['size_' . $size];
    }else if ($size == 8.5 || $size == 10.5 || $size == 12.5 ) {
      echo '<input type="hidden" name="shoe_stock" value="' . $row['size_' . ($size-0.5) . '_5'] . '">';
      $stockk = $row['size_' . ($size-0.5) . '_5'];
  } 
    else {
        echo '<input type="hidden" name="shoe_stock" value="' . $row['size_' . ($size-0.5) . '_5'] . '">';
        $stockk = $row['size_' . ($size-0.5) . '_5'];
    }

}

if (empty($_POST["quantity"])) {
    $quantityErr = "* Quantity is required";
} else {
    $quantity = test_input($quantity);
}


$id = $_GET['user_id'];
if ($sizeErr == "" && $quantityErr == "") {
    mysqli_query($conn,"INSERT INTO `orders`(shoesname, price, quantity, shoessize , user_id,stock,shoe_image, pro_id ) VALUES ('$shoe_name', '$shoe_price', '$quantity', '$size', '$id', '$stockk',' $image' ,'$proid')");  

    if (mysqli_query($conn, $sql)) {
        $msg = "<div style='text-align:center; background-color:green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Add Successfully!</div>";
    } else {
        $msg = "<div style='text-align:center; background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Error</div>";
    }

    mysqli_close($conn);
}

}  

  ?>
<?php

$sizeErr ="";
$size ="";

if (isset($_POST['wishlist'])) {

  if (empty($_POST['size'])) {
    $sizeErr = '* Size is required';
  } else {
      $size = test_input($_POST['size']);
      // process wishlist form data
  }

  // perform database insertion
  if ($sizeErr == "" ) {
  // $sql = "INSERT INTO wishlist (shoesname, price, size) VALUES ('$shoe_name', '$shoe_price', '$size')";
  mysqli_query($conn," INSERT INTO wishlist set shoesname='" . $_POST['shoe_name'] . "', price='" . $_POST['shoe_price'] . "' , size='" . $_POST['size'] . "' , user_id='" . $_POST['id'] . "' , pro_id='" . $_POST['shoe_id'] . "' , stock='" . $_POST['shoe_stock'] . "' , shoe_image='" . $_POST['shoe_img'] . "' ");

  if (mysqli_query($conn, $sql)) {

    $msg = "<div style='text-align:center; background-color:green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Add Successfully!</div>";
  } else {
    $msg = "<div style='text-align:center; background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Error</div>";
  }

  mysqli_close($conn);
  }  
}
?>
<?php echo "<div>".$msg."</div>"?>
</body>
</html>

<?php
    include 'footer.php';
?>