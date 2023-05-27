<?php
    include 'adminheader.php'; 
    include 'conn.php'; 
    $msg=''; 
    $id =$_GET['admin_id']; 

?>
<?php

    if(isset($_POST['saveas']))
    {	
        $sid = $_REQUEST["shoe_id"];
        $sql = "SELECT * FROM shoes where shoe_id = '$sid'";
        $msg = '';
        $total= 0; 
        $subtotal=0;
        $result = mysqli_query($conn, $sql);

        $st = $_POST['type'];
        $sb = $_POST['brand'];
        $cat = $_POST['state'];
        $img = $_POST['shoe_image'];
        $price = $_POST['shoe_price'];
        //$mstatus = $_POST['status'];
        
        while($row = mysqli_fetch_array($result))
        {   
            
            // $shoesname = $row["shoe_name"];

            if(!$img) 
            {
                $msg = "<div style='text-align:center; background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Insert Shoe Image</div>";
              } 

              else
              {
                mysqli_query($conn,"UPDATE shoes set shoe_type='" . $_POST['type'] . "', shoe_brand='" . $_POST['brand'] . "', category='" . $_POST['state'] . "' , shoe_image='" . $_POST['shoe_image'] . "', shoe_price='" . $_POST['shoe_price'] . "'  where shoe_id = '$sid'");            
    
                mysqli_query($conn,"UPDATE orders set  shoe_brand='" . $_POST['brand'] . "',  shoe_image='" . $_POST['shoe_image'] . "', price='" . $_POST['shoe_price'] . "'  where pro_id = '$sid'");            
    
                mysqli_query($conn,"UPDATE wishlist set  shoe_brand='" . $_POST['brand'] . "', shoe_image='" . $_POST['shoe_image'] . "', price='" . $_POST['shoe_price'] . "'  where pro_id = '$sid'");            
    
 
 
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
              }
           
            
  
        }


     }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Admin Manage Shoes</title>

    <style>

     .imgcenter
     {
      text-align: center;
     }

    b
    {
      font-size: 20px;
    }

    form input
    {
        font-size: 16px;
    }

    select
    {
        font-size: 16px;
        width: 230px;
    }

    th
    {
      padding: 20px;
    }

    fieldset
    {
      background-color: lightgrey;
      margin-left: 180px;
      margin-right: 50%;
    }


</style>


</head>
<body>
<?php
                                // $id = $_GET['admin_id'];
                                $sid = $_REQUEST["shoe_id"];
                                $sql = "SELECT * FROM shoes where shoe_id = '$sid' ";
                                $result = mysqli_query($conn,$sql);
                                // $result = mysqli_query($conn, "select * from shoes where shoe_id = '$sid'"); 

                                $row = mysqli_fetch_assoc($result);
                                ?>
<fieldset>
<?php echo "<div>".$msg."</div>"?>

        <div class="imgcenter">
        <br><b><?php echo $row["shoe_name"]; ?></b><br>
        <img src="image/shoesimg/<?php echo $row["shoe_image"]; ?>" alt="<?php echo $row["shoe_name"];  ?>" height="200px" width="200px" ><br><br>
        </div>

        <form name="from1"  method="post" action=""  >
                            <label for="state"  >Shoe Type&nbsp;&nbsp; :</label>
                                        <select id="state" name="type">
                                            <option value="Running Shoes">Running Shoes</option>
                                            <option value="Casual Shoes">Casual Shoes</option>
                                            <option value="Sneakers">Sneakers</option>
                                            <option value="Lifestyle">Lifestyle</option>
                                        </select>
                            <br>
                            <label for="state">Shoe Brand : </label>
                                        <select id="state" name="brand">
                                            <option value="Nike">Nike</option>
                                            <option value="Puma">Puma</option>
                                            <option value="Adidas">Adidas</option>
                                            <option value="Converse">Converse</option>
                                        </select>
                            <br>
                            <label for="state"  >Category&nbsp;&nbsp;&nbsp;&nbsp; : </label>
                                        <select id="state" name="state">
                                            <option value="man">Man</option>
                                            <option value="women">Women</option>
                                        </select>

                            <br>
                            <label for="category">Shoe Price&nbsp;&nbsp;: RM</label>
                            <input type="text" name="shoe_price" value="<?php echo $row["shoe_price"]; ?>" required><br>
                            <br>
                            <label for="file"  class="Choose"><i class="fa fa-camera"></i> Shoe Image</label>
                            <br><input type="file" id="file" value="<?php echo $row["shoe_image"]; ?>" name="shoe_image" class="form-control" >
                            <br>
                            <input type="submit" name="saveas" value="Update" class="botton" style="float:right;"></from>

                            <a href="admin_stock.php?shoe_id=<?php echo $row["shoe_id"]?>&&admin_id=<?php echo $id ?>">Edit Stock </a>

</fieldset>
</body>
</html>
