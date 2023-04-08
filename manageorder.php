<?php
    // include 'adminheader.php';
    include 'conn.php'; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Manage Order </title>

    
    <style>
    fieldset
    {
        background-color: #f2f2f2;
    }
    .middle
    {
        max-width: 1680px;
        margin: auto; 
        padding:50px;
    }
    *
    {
      font-size: 30px;
    }
    .left
    {
      float: right;
      margin-bottom: 50px;
    }
    td, th 
    {
      text-align: left;
      padding: 30px;
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
      <h1><i class="fa fa-address-book-o" style="font-size:50px"></i><b style="font-size: 50px;"> View Customer Comment </b></h1>
      <table border="0px">
        <tr>
          <td>Shoes Iamge</td>
          <td>Order ID</td>
          <td>Shoes Name </td>
          <td>Shoes Size</td>
          <td>Quantity</td>
          <td>Price</td>
          <td>Total Price</td>
          <td>Email</td>
          <td>Date</td>
          <td>Order Status</td>


        </tr>
        <?php

        while($row = mysqli_fetch_array($result))
        {
            ?>
      
        <tr>
          <td><img class='img' src="<?php echo "image/shoesimg/".$row['shoe_image'];?>" ></td>
          <td><?php echo $row["her_id"]; ?></td>         
          <td><?php echo $row["her_shoesname"];	?></td>
          <td><?php echo $row["her_size"];	?></td>
          <td><?php echo $row["her_quantity"];?></td>
          <td><?php echo $row["her_price"];?></td>
          <td><?php echo $row["her_price"];?></td>
          <td><?php echo $row["her_date"];?></td>
          <td><?php echo $row["her_date"];?></td>
          <td><?php echo $row["order_status"];?></td>
        </tr>
            <?php

        }

		?>
			
      </table>
<p>
        
    
      <span class="left" ><a href="reportorder.php" alt="insert"> <i class='fas fa-print' style='font-size:24px'></i> <input type="button" value="View n Print Report"></span></p>
                                                     <!-- ?name=<?php echo $name?> -->

      <!-- <span class="left"><br><button onclick="window.print()" header="">Generate User List</button></span> -->

    </fieldset>
  </div>

	<div>

	</div>
	
</div>

</body>
</html>