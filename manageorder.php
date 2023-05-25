<?php
    include 'adminheader.php';
    include 'conn.php'; 
    $id =$_GET['admin_id']; 
?>
<?php
    
    // Add validation rules for the other input fields

    if(isset($_POST["submit"])){
      $sid = $_POST["shoe_id"]; 
      $shoe_name = $_POST["shoe_name"];
      $shoe_type = $_POST["shoe_type"];
      $shoe_brand = $_POST["shoe_brand"];
      $category = $_POST["category"];
      $shoe_image = $_POST["shoe_image"];
      $shoe_price = $_POST["shoe_price"];
  
      if(!$shoe_image) {
        $msg = "<div style='text-align:center; background-color: red; color: white; font-weight: bold;border-radius: 30px; margin: 20px; margin-bottom: 0; padding: 10px; text_align: center; margin-bottom: 20px;'>Please Insert Shoe Image</div>";
      } else {
          mysqli_query($conn,"UPDATE shoes set shoe_type='" . $_POST['shoe_type'] . "', shoe_brand='" . $_POST['shoe_brand'] . "', category='" . $_POST['category'] . "' , shoe_image='" . $_POST['shoe_image'] . "', shoe_price='" . $_POST['shoe_price'] . "'  where shoe_id = '$sid'");            

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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Admin | Manage Order </title>

    <style>
    fieldset
    {
        background-color: #f2f2f2;
        font-weight: bold;
    }
    .middle
    {
        margin: auto;  
        padding-left: 160px;
    }
    .wrapper
    {
      font-size: 25px;
    }
    .left
    {
      margin-bottom: 50px;
    }
    .right
    {
      float: right;
    }
    td, th 
    {
      padding: 15px ;
    }
    
    a:hover
    {
      color: red;
    }
    .img
    {
      width: 80px;
    }
  </style>


</head>
<body>
    

<div id="wrapper">

<div class="middle">
    <fieldset>
    <?php
    //   $name = $_GET['name'];
        $sql = "select * from history";
        $result = mysqli_query($conn,$sql);

        // $host = "SELECT * FROM `admin`";
        // $query = mysqli_query($conn,$host);
        // $host_image = mysqli_fetch_assoc($query);
        ?>
        <h1><i class="fa fa-address-book-o" style="font-size:45px"><b style="font-size: 50px;"> View Customer Order </b></i></h1>
      <table border="0px">
        <tr>
          <th>Order Number</th>
          <!-- <th>Shoes Name </th>
          <th>Shoes Size</th>
          <th>Quantity</th>
          <th>Price</th> -->
          <th>Total Price(RM)</th>
          <th>Customer Email</th>
          <th>Date</th>
          <th>Order Status</th>
          <th>More Detail</th>
          <!-- <th>Delete</th> -->
        </tr>
        <?php

        while($row = mysqli_fetch_array($result))
        {

            ?>
      
        <tr>
          <th><?php echo $row["order_num"]; ?></th>         
          <th><?php echo $row["total"];?></th>
          <th><?php echo $row["her_email"];?></th>
          <th><?php echo $row["her_date"];?></th>
          <th><?php echo $row["order_status"];?></th>
          <th><a href="admin_morehistory.php?order_num=<?php echo $row["order_num"]; ?>&&user_id=<?php echo $row["user_id"]; ?>&&admin_id=<?php echo $id ?>" alt="update"><i class="fa fa-cog" style="font-size:36px"></i></a></th>
          <!-- <th><a href="admin_history.php?her_id=<?php //echo $row["her_id"]; ?>&&admin_id='$id'" alt="update"><i class="fa fa-cog" style="font-size:36px"></i></a></th> -->
          <!-- <th><a href="admindeleteorder.php?her_id=<?php //echo $row['her_id'];?>" alt="edit" style="color:red;"><i class="fa fa-close" style="font-size:36px"></i></a></th>         -->

        </tr>
            <?php

        }

		?>

			
      </table>
<p>
        
    
      <span class="right" ><a href="reportorder.php?admin_id=<?php echo $id ?>" alt="insert"> <i class='fas fa-print' style='font-size:24px'></i> <input type="button" value="View and Print Report"></span></p>
      <!-- <span class="left"><br><button onclick="window.print()" header="">Generate User List</button></span> -->

    </fieldset>
  </div>

	<div>

	</div>
	
</div>

</body>
</html>