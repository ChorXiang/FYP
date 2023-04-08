<?php
    include 'conn.php'; 
    $msg='';
?>
<?php

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




function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <title>Admin Manage Shoes</title>

    <style>


    .sidenav {
      height: 100%;
      flex: 30%;
      position: fixed;
      z-index: 1;
      top: 0;
      left: 0;
      background-color: #111;
      overflow-x: hidden;
      padding-top: 20px;
    }

    .main {
      flex: 0 0 70%;
      background-color: white;
      padding: 20px;
      height: 100%;
      float: right;
      text-align: center;
      position: absolute;
      top: 0;
      right: 0;
      font-size: 2em;
    }

    form input
    {
        font-size: 20px;
    }


    .sidenav a {
      padding: 6px 8px 6px 16px;
      text-decoration: none;
      font-size: 25px;
      color: #818181;
      display: block;
    }

    .sidenav a:hover {
      color: #f1f1f1;
    }

    .sidenav img
    {
      height: 50px;
      width: 90px;
    }


    @media screen and (max-height: 450px) {
      .sidenav {padding-top: 15px;}
      .sidenav a {font-size: 18px;}
    }

    

    th
    {
      padding: 5px;
    }

    fieldset
    {
      background-color: lightgrey;
    }
    
</style>

</head>
<body>

<div class="side">
<div class="sidenav">
        <a href="admindashboard.php"><img src="image/foot.png" alt="Shop Logo" width="10px" height="10px"></a><br><br> 
        <a href="#">Manage Category</a>
        <a href="#">Manage Product</a>
        <a href="admin_history.php">Manage Order</a>
        <a href="manageuser.php">Manage Customer</a>
        <a href="#">Manage Staff </a>
        <a href="managecomment.php">Manage comment </a>
</div>
</div>

<div class="main">

<div class="middle">
<fieldset>
    <?php
        $errors = [];

        // If the form is submitted, update the record
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["shoe_name"])) {
                $errors[] = "Shoe name is required";
            } else {
                $shoe_name = $_POST["shoe_name"];
            }
    
            if (empty($_POST["shoe_type"])) {
                $errors[] = "Shoe type is required";
            } else {
                $shoe_type = $_POST["shoe_type"];
            }
    
            // Add validation rules for the other input fields
    
            if (empty($errors)) {
                $shoe_id = $_POST["shoe_id"];
                $shoe_brand = $_POST["shoe_brand"];
                $category = $_POST["category"];
                $shoe_image = $_POST["shoe_image"];
                $shoe_size = $_POST["shoe_size"];
                $shoe_price = $_POST["shoe_price"];
                $stock = $_POST["stock"];
    
                $sql = "UPDATE shoes SET shoe_name='$shoe_name', shoe_type='$shoe_type', shoe_brand='$shoe_brand', category='$category', shoe_image='$shoe_image', shoe_size='$shoe_size', shoe_price='$shoe_price', stock='$stock' WHERE shoe_id=$shoe_id";
    
                if ($conn->query($sql) === TRUE) {

                    $msg = "<div style='text-align:center; background-color:green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Add Successfully!</div>";
                  } else {
                    $msg = "<div style='text-align:center; background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Error</div>";
                  }
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
  <?php echo "<div>".$msg."</div>"?>

</fieldset>
</div>

</div>
</div>
</body>
</html>