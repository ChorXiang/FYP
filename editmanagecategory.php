<?php
    include 'adminheader.php';
    include 'conn.php'; 
    $msg = '';
    $shoe_brand = $_GET["shoe_brand"];
    $id =$_GET['admin_id']; 
?>


<?php

if (isset($_POST["savebtn"])) 	
{
 
    $mstatus = $_POST['status'];

    if(!$mstatus)
    {
        $msg = "<div style='background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Select Again</div>";
 
    }
    else
    {
        mysqli_query($conn,"UPDATE shoes set shoe_brand='" . $_POST['shoe_brand'] . "',status='" . $_POST['status'] . "' where shoe_brand = '$shoe_brand'");    
        //testing
        mysqli_query($conn,"delete from wishlist where shoe_brand = '$shoe_brand'");
        mysqli_query($conn,"delete from orders where shoe_brand = '$shoe_brand'");

        //mysqli_query($conn, "UPDATE wishlist SET status='" . $_POST['status'] . "' where shoe_brand = '$shoe_brand'");
        //mysqli_query($conn, "UPDATE orders SET status='" . $_POST['status'] . "' where shoe_brand = '$shoe_brand' ");        
        $msg = "<div style='background-color: green; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Update Successfully !</div>";
        echo '<script>alert("Update Successfully !");</script>';
     
        echo '<script>
            function confirmRedirect() {
                if (confirm("Do you want to go to manage brand page?")) {
                    
                    window.location.href = "admin_category.php?admin_id=' . $id . '";
      
                }
            }
            confirmRedirect();
         </script>';
    }

	
	
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Status</title>

    
<style>
    
    *
    {
        font-size: 30px;
    }
    fieldset
    {
        margin-left: 160px;
        background-color: #f2f2f2;
    }
    a:hover
    {
      color: red;
    }
    sup
    {
      color: red;
    }
    .right
    {
        float: right;
    }
</style>

</head>
<body>
    

<div class="middle">

<fieldset>
    <?php
        $result = mysqli_query($conn, "select * from shoes where shoe_brand = '$shoe_brand'"); 
        $row = mysqli_fetch_assoc($result);
        if (!$row) {
            echo "No shoe record found for $shoe_brand";
            exit;
          }
          

    ?>
    
    <h1><b style="font-size: 50px;"><i class="fa fa-pencil" style="font-size:50px"></i>Edit Shoes Brand Status</b></h1>

    <form name="addfrm" method="post" action="">
        <label>Brand&nbsp;&nbsp; :</label>
        <input type="text" name="shoe_brand" value="<?php echo $row["shoe_brand"]; ?>" required>
        <br>
        <label for="status"  >Status &nbsp;: </label>
                <select id="status" name="status">
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>

       
        <br><br><input type="submit" name="savebtn" value="UPDATE">
        <div class="right">
        <a href="admin_category.php?admin_id=<?php echo $id ?>">Back</a>
        </div>
    </form>
    <div style=text-align:center;>
    <?php echo "<div>".$msg."</div>"?>
</div>
</fieldset>
</div>

</body>
</html>


