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
    <title>Admin | Manage Comment </title>

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
        $sql = "select * from comment";
        $result = mysqli_query($conn,$sql);

        // $host = "SELECT * FROM `admin`";
        // $query = mysqli_query($conn,$host);
        // $host_image = mysqli_fetch_assoc($query);
        ?>
      <h1><i class="fa fa-address-book-o" style="font-size:50px"></i><b style="font-size: 50px;"> View Customer Comment </b></h1>
      <table border="0px">
        <tr>
          <td>Comment ID </td>
          <td>Email </td>
          <td>User Interface Rating</td>
          <td>Shipping Rating</td>
          <td>Customer Service Rating</td>
          <td>Product Quality Rating</td>
          <td>Message</td>
          <td>Date</td>

        </tr>
        <?php

        while($row = mysqli_fetch_array($result))
        {
            ?>
      
        <tr>
          <td><?php echo $row["comment_id"]; ?></td>         
          <td><?php echo $row["email"];	?></td>
          <td><?php echo $row["user_interface_rating"];	?></td>
          <td><?php echo $row["shipping_rating"];?></td>
          <td><?php echo $row["customer_service_rating"];?></td>
          <td><?php echo $row["product_quality_rating"];?></td>
          <td><?php echo $row["message"];?></td>
          <td><?php echo $row["created_at"];?></td>
        </tr>
            <?php

        }

		?>
			
      </table>
<p>
        
    
      <span class="left" ><a href="reportcomment.php" alt="insert"> <i class='fas fa-print' style='font-size:24px'></i> <input type="button" value="View n Print Report"></span></p>
                                                     <!-- ?name=<?php echo $name?> -->

      <!-- <span class="left"><br><button onclick="window.print()" header="">Generate User List</button></span> -->

    </fieldset>
  </div>

	<div>

	</div>
	
</div>
</body>
</html>