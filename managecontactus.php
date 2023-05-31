<?php
    // include 'adminheader.php';
    include 'conn.php'; 
    include 'adminheader.php';
    $id =$_GET['admin_id']; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Admin | Manage Rating </title>

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
      <h1><i class="fa fa-address-book-o" style="font-size:50px"></i><b style="font-size: 50px;"> View Customer Rating </b></h1>
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
        
    
      <span class="left" ><a href="reportcontactus.php?admin_id=<?php echo $id ?>" alt="insert"><i class='fa fa-print' style='font-size:24px'></i><input type="button" value="View and Print Report" style="margin-left: 10px;"></span></p>

      <!-- <span class="left"><br><button onclick="window.print()" header="">Generate User List</button></span> -->

    </fieldset>
  </div>

	<div>

	</div>
	
</div>
</body>
</html>