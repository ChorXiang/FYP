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
</div>
</div>

<?php
if (isset($_POST['submit'])) {
//名字要改
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    if ($nameErr == "" && $emailErr == "" && $subjectErr == "" && $messageErr == "") {
        $sql = "INSERT INTO messages (name, email, subject, message)VALUES ('$name', '$email', '$subject', '$message')";

        if (mysqli_query($conn, $sql)) {
            echo "Add to cart successfully";
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