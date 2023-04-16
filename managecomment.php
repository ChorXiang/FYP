<?php
    // include 'adminheader.php';
    include 'conn.php'; 
    include 'adminheader.php';
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
        margin: auto; 
        padding-left: 160px;
    }
    .wrapper
    {
      font-size: 20px;
    }
    .left
    {
      float: right;
      margin-bottom: 50px;
    }
    
    th 
    {
      padding: 20px;
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
          <th>Comment ID </th>
          <th>Email </th>
          <th>User Interface Rating</th>
          <th>Shipping Rating</th>
          <th>Customer Service Rating</th>
          <th>Product Quality Rating</th>
          <th>Message</th>
          <th>Date</th>

        </tr>
        <?php

        while($row = mysqli_fetch_array($result))
        {
            ?>
      
        <tr>
          <th><?php echo $row["comment_id"]; ?></th>         
          <th><?php echo $row["email"];	?></th>
          <th><?php echo $row["user_interface_rating"];	?></th>
          <th><?php echo $row["shipping_rating"];?></th>
          <th><?php echo $row["customer_service_rating"];?></th>
          <th><?php echo $row["product_quality_rating"];?></th>
          <th style="max-width: 300px, text-overflow: ellipsis;"><?php echo $row["message"];?></th>
          <th><?php echo $row["created_at"];?></th>
        </tr>
            <?php

        }

		?>
			
      </table>
<p>
        
    
      <span class="left" ><a href="reportcomment.php" alt="insert"><input type="button" value="View and Print Report"></span></p>
                                                     <!-- ?name=<?php echo $name?> -->

      <!-- <span class="left"><br><button onclick="window.print()" header="">Generate User List</button></span> -->

    </fieldset>
  </div>

	<div>

	</div>
	
</div>
</body>
</html>