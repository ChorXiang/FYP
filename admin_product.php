<?php
    include 'conn.php'; 
    include 'adminheader.php'; 
    $msg='';
?>
<?php

//   if(isset($_POST["submit"])){
    
//       if (empty($_POST["shoe_name"])) {
//         $shoe_name = "* Shoe Name is required";
//       } else {
//         $shoe_name = test_input($_POST["shoe_name"]);
//     }

//         if (empty($_POST["quantity"])) {
//           $quantityErr = "* Quantity is required";
//         } else {
//           $quantity = test_input($_POST["quantity"]);
//       }

//       if (empty($_POST["quantity"])) {
//           $quantityErr = "* Quantity is required";
//         } else {
//           $quantity = test_input($_POST["quantity"]);
//       }

//       if (empty($_POST["quantity"])) {
//           $quantityErr = "* Quantity is required";
//         } else {
//           $quantity = test_input($_POST["quantity"]);
//       }
//   }




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

    .main {
      flex: 0 0 70%;
      background-color: white;
      padding-left: 160px;
      height: 100%;
      float: right;
      position: absolute;
      font-size: 25px;
    }

    form input
    {
        font-size: 16px;
    }

    select
    {
        font-size: 16px;
    }

    th
    {
      padding: 20px;
    }

    fieldset
    {
      background-color: lightgrey;
      width: auto;
      height: auto;
    }

    .right{
      float:right;
      padding-right:160px ;
      margin-left: auto;
      margin-right: auto;
      width: 20%;
    }

    .butttonright{
      float:right;
    }

    .container
    {
      display: flex;
      justify-content: space-between;
      width: 100%;
      margin: 0 auto;
      border: 1px solid #ccc;
      padding: 20px;
      padding-right:0px ;
    }

    .imgcenter {
      display: block;
      margin-left: auto;
      margin-right: auto;
      width: 40%;
      padding-left: 20px;
      text-align:"center";  
    }

    .wordcenter
    {
      text-align: center;
    }

</style>

</head>
<body>

<div class="main">

<fieldset>
    <?php
    
            // Add validation rules for the other input fields
    
            if(isset($_POST["submit"])){
                $shoe_id = $_POST["shoe_id"];
                $shoe_name = $_POST["shoe_name"];
                $shoe_type = $_POST["shoe_type"];
                $shoe_brand = $_POST["shoe_brand"];
                $category = $_POST["category"];
                $shoe_image = $_POST["shoe_image"];
                //$shoe_size = $_POST["shoe_size"];
                $shoe_price = $_POST["shoe_price"];
    
//$sql = "UPDATE shoes SET shoe_name='$shoe_name', shoe_type='$shoe_type', shoe_brand='$shoe_brand', category='$category', shoe_image='$shoe_image', shoe_size='$shoe_size', shoe_price='$shoe_price' WHERE shoe_id=$shoe_id";
                $sql = "UPDATE shoes SET shoe_name='$shoe_name', shoe_type='$shoe_type', shoe_brand='$shoe_brand', category='$category', shoe_image='$shoe_image', shoe_price='$shoe_price' WHERE shoe_id=$shoe_id";

                if ($conn->query($sql) === TRUE) {

                    $msg = "<div style='text-align:center; background-color:green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Update Successfully!</div>";
                    echo '<script>alert("Update Successfully !");</script>';
     
                    echo '<script>
                        function confirmRedirect() {
                            if (confirm("Do you want to go to admin_shoes.php?")) {
                                window.location.href = "admin_shoes.php";
                            }
                        }
                        confirmRedirect();
                    </script>';
                  } else {
                    $msg = "<div style='text-align:center; background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Error</div>";
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



<div class="container">
  <div class="left">
         
        <div class="imgcenter">
        <br><b>PRODUCT IMAGE</b><br>
        <img src="image/shoesimg/<?php echo $row["shoe_image"]; ?>" alt="<?php echo $row["shoe_name"]; ?>" height="150px" width="150px" >
  </div>
</div>

<div>
  <fieldset>
  <div class="wordcenter">
  <b><?php echo $row["shoe_name"]; ?></b>
  </div>
  <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <input type="hidden" name="shoe_id" value="<?php echo $row["shoe_id"]; ?>">
    <input type="hidden" name="shoe_name" value="<?php echo $row["shoe_name"]; ?>"><br>
    <label for="shoe_type"  >Shoe Type&nbsp;&nbsp; :</label>
                <select id="shoe_type" name="shoe_type">
                    <option value="Running Shoes">Running Shoes</option>
                    <option value="Casual Shoes">Casual Shoes</option>
                    <option value="Sneakers">Sneakers</option>
                    <option value="Lifestyle">Lifestyle</option>
                </select><br>
    <label for="shoe_brand"  >Shoe Brand :</label>
                <select id="shoe_brand" name="shoe_brand">
                    <option value="Nike">Nike</option>
                    <option value="Puma">Puma </option>
                    <option value="Adidas">Adidas</option>
                    <option value="Converse">Converse</option>
                </select><br>    
    Category &nbsp;&nbsp;&nbsp;&nbsp;:
    <input type="radio" name="category" value="male" <?php if($row["category"]=="male"){echo "checked";} ?>> Male
    <input type="radio" name="category" value="female" <?php if($row["category"]=="female"){echo "checked";} ?>> Female<br>
    Shoe Image: <input type="text" name="shoe_image" value="<?php echo $row["shoe_image"]; ?>"><br>
    <!-- `<label for="shoe_size"  >Shoe Size:</label>
                <select id="shoe_size" name="shoe_size">
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
                </select><br>  ` -->
    Shoe Price&nbsp;  : RM<input type="text" name="shoe_price" value="<?php echo $row["shoe_price"]; ?>"><br>
    <input type="submit" name="submit" value="Update">
    <div class="butttonright">
        <a href="admin_stock.php?shoe_id=<?php echo $row["shoe_id"];?>">Edit Stock </a>
    </div>
  </form>

  <?php echo "<div>".$msg."</div>"?>

</fieldset>
</div>

</div>
</div>
</body>
</html>